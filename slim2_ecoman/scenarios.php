<?php
// test commit for branch slim2
require 'vendor/autoload.php';
require "NotORM.php";

$app = new \Slim\Slim();

$app->get('/hello/:name', function ($name) {
    echo "Hello, $name";
});


$pdo = new PDO('pgsql:dbname=ecoman_01_10;host=88.249.18.205;user=postgres;password=1q2w3e4r');
$db = new NotORM($pdo);


/**
 * zeynel dağlı
 * @since 27-01-2015
 */
$app->get("/getScenarioDetailsCns_scn", function () use ($app, $pdo) {
    
    $sorguStr = null;
    if(isset($_GET['id']) && $_GET['id']!="" ) {
        $id = $_GET['id'];
       
        $sorguStr = "WHERE pd.is_prj_id=".$_GET['id']."  ";
        //WHERE (cmpny_id=15 OR cmpny_id=13) AND flow_id=10
    } else {
        $sorguStr = "WHERE pd.is_prj_id IN (SELECT id FROM t_is_prj WHERE consultant_id=".$_GET['consultant_id']." ) ";
    }
    
        /*print_r('
                SELECT pd.id, 
                                    pd.cmpny_from_id as id, 
                                    pd.cmpny_to_id as tocompanyid, 
                                    pd.flow_id as flowid,  
                                    pd.from_quantity as miktar, 
                                    pd.to_quantity as miktar2, 
                                    pd.unit_id,
                                    pd.is_prj_id,
                                    (SELECT name from t_cmpny WHERE id=pd.cmpny_from_id) as company_from,
                                    (SELECT name from t_cmpny WHERE id=pd.cmpny_to_id) as company_to,
                                    (SELECT name from t_flow WHERE id=pd.flow_id) as flow,
                                    (SELECT name from t_cmpny_flow cf
                                         INNER JOIN t_flow_type ft ON cf.flow_type_id=ft.id
                                    WHERE flow_id=pd.flow_id AND cmpny_id=pd.cmpny_from_id LIMIT 1) as from_flow_type,
                                    (SELECT name from t_cmpny_flow cf
                                         INNER JOIN t_flow_type ft ON cf.flow_type_id=ft.id
                                    WHERE flow_id=pd.flow_id AND cmpny_id=pd.cmpny_to_id LIMIT 1) as to_flow_type ,
                                     (SELECT ft.name from t_cmpny_flow cf
                                            INNER JOIN t_unit ft ON cf.qntty_unit_id=ft.id
                                       WHERE flow_id=pd.flow_id AND cmpny_id=pd.cmpny_to_id LIMIT 1) as to_unit,
                                       (SELECT ft.name from t_cmpny_flow cf
                                            INNER JOIN t_unit ft ON cf.qntty_unit_id=ft.id
                                       WHERE flow_id=pd.flow_id AND cmpny_id=pd.cmpny_from_id LIMIT 1) as from_unit  
                                    FROM t_is_prj_details pd
                                 
                                '.$sorguStr.'');*/
        $res = $pdo->query('
                            SELECT pd.id, 
                                    pd.cmpny_from_id as id, 
                                    pd.cmpny_to_id as tocompanyid, 
                                    pd.flow_id as flowid,  
                                    pd.from_quantity as miktar, 
                                    pd.to_quantity as miktar2, 
                                    pd.unit_id,
                                    pd.is_prj_id,
                                    (SELECT name from t_cmpny WHERE id=pd.cmpny_from_id) as company_from,
                                    (SELECT name from t_cmpny WHERE id=pd.cmpny_to_id) as company_to,
                                    (SELECT name from t_flow WHERE id=pd.flow_id) as flow,
                                    (SELECT name from t_cmpny_flow cf
                                         INNER JOIN t_flow_type ft ON cf.flow_type_id=ft.id
                                    WHERE flow_id=pd.flow_id AND cmpny_id=pd.cmpny_from_id LIMIT 1) as from_flow_type,
                                    (SELECT name from t_cmpny_flow cf
                                         INNER JOIN t_flow_type ft ON cf.flow_type_id=ft.id
                                    WHERE flow_id=pd.flow_to_id AND cmpny_id=pd.cmpny_to_id LIMIT 1) as to_flow_type ,
                                     (SELECT ft.name from t_cmpny_flow cf
                                            INNER JOIN t_unit ft ON cf.qntty_unit_id=ft.id
                                       WHERE flow_id=pd.flow_id AND cmpny_id=pd.cmpny_to_id LIMIT 1) as to_unit,
                                       (SELECT ft.name from t_cmpny_flow cf
                                            INNER JOIN t_unit ft ON cf.qntty_unit_id=ft.id
                                       WHERE flow_id=pd.flow_to_id AND cmpny_id=pd.cmpny_from_id LIMIT 1) as from_unit  
                                    FROM t_is_prj_details pd
                                 
                                '.$sorguStr.';
                                ')->fetchAll(PDO::FETCH_ASSOC);
    
    
   $companies = array();
    foreach ($res as $company){
        
        $companies[]  = array(
            "id" => $company["id"].",".$company["tocompanyid"].",".$company["flowid"],
            "company" => $company["company_from"],
            "tocompany" => $company["company_to"],
            "fromflowtype" => $company["from_flow_type"],
            "toflowtype" => $company["to_flow_type"],
            "flow" => $company["flow"],
            //"qntty" => $company["qntty"],
            "qntty" => $company["miktar"],
            //"qntty2" => $company["qntty2"],
            "qntty2" => $company["miktar2"],
            "qntty2unit" => $company["to_unit"],
            "qnttyunit" => $company["from_unit"]
        );
    }
    
    //{field:'opportunity',title:'Opportunity',width:80},
    
    
    $app->response()->header("Content-Type", "application/json");
    
    $resultArray = array();
    //$resultArray['total'] = count($res);
    $resultArray['rows'] = $companies;
    echo json_encode($resultArray);
   

    
});


/**
 * zeynel dağlı
 * @since 04-12-2014
 */
$app->get("/ISScenariosCns_scn", function () use ($app, $db, $pdo) {

    if(isset($_GET['page']) && $_GET['page']!="" && isset($_GET['rows']) && $_GET['rows']!="") {
        $offset = ((intval($_GET['page'])-1)* intval($_GET['rows']));
        $limit = intval($_GET['rows']);
    } else {
        $limit = 10;
        $offset = 0;
    }
    
    if(isset($_GET['sort']) && $_GET['sort']!="") {
        $sort = trim($_GET['sort']);
    } else {
        $sort = "prj.id";
    }
    
    if(isset($_GET['order']) && $_GET['order']!="") {
        $order = trim($_GET['order']);
    } else {
        $order = "desc";
    }
    /*print_r("SELECT 
                prj.id AS prj_id, 
                prj.synergy_id, 
                prj.consultant_id, 
                prj.active, 
                prj.prj_date AS date, 
                prj.name AS prj_name,
                syn.name AS syn_name
            FROM t_is_prj as prj
            INNER JOIN t_synergy AS syn ON prj.synergy_id = syn.id
            ORDER BY  ".$sort." ".$order." LIMIT ".$limit." OFFSET ".$offset."  ");*/
    
    $res = $pdo->query("SELECT 
                            prj.id AS prj_id, 
                            prj.synergy_id, 
                            prj.consultant_id, 
                            prj.active, 
                            prj.prj_date AS date, 
                            prj.name AS prj_name,
                            s.name AS status,
                            syn.name AS syn_name
                        FROM t_is_prj as prj
                        INNER JOIN t_synergy AS syn ON prj.synergy_id = syn.id
                        LEFT JOIN t_prj_status s ON prj.status=s.id
                        /*WHERE prj.consultant_id=".$_GET['consultant_id']."*/
                        WHERE prj.prj_id=".$_GET['prj_id']."
                        ORDER BY  ".$sort." ".$order." LIMIT ".$limit." OFFSET ".$offset."  ")->fetchAll(PDO::FETCH_ASSOC);
    $res2 = $pdo->query(  "SELECT 
                            count(prj.id) as toplam
                            FROM t_is_prj as prj
                            INNER JOIN t_synergy AS syn ON prj.synergy_id = syn.id 
                            WHERE prj.prj_id=".$_GET['prj_id']." "  )->fetchAll(PDO::FETCH_ASSOC);
    $flows = array();
    foreach ($res as $flow){
        $flows[]  = array(
            "id" => $flow["prj_id"],
            "status" => $flow["status"],
            "prj_name" => $flow["prj_name"],
            "syn_name" => $flow["syn_name"],
            "date" => $flow["date"],
			"detail" => " <a href='#' id='".$flow["prj_id"]."_1_".$flow['synergy_id']."' class='easyui-tooltip'  >Scenario Details</a>
                        <script>$('#".$flow["prj_id"]."_1_".$flow['synergy_id']."').tooltip({
                        position: 'right',
                        content: $('<div></div>'),
                        //content: '<span style=\"color:#fff\">This is the tooltip message.</span>',
                        onShow: function(){

                            $(this).tooltip('arrow').css('top', 20);
                            $(this).tooltip('tip').css('top', $(this).offset().top);
                        },
                        onUpdate: function(cc){
                            cc.panel({
                                width: 500,
                                height: 'auto',
                                border: false,
                                href: 'isscopingtooltipscenarios?id=".$flow["prj_id"]."'
                            });
                        }

                    });</script>  "
        );
    }

    $resultArray = array();
    $resultArray['total'] = $res2[0]['toplam'];
    $resultArray['rows'] = $flows;
    echo json_encode($resultArray);
    
});



/**
 * zeynel dağlı
 * @since 27-01-2015
 */
$app->get("/getScanarioStatus_scn", function () use ($app, $pdo) {
    

    $res = $pdo->query('
                        SELECT id, name
                            FROM t_is_prj_status
                        WHERE active=1 ;
                    ')->fetchAll(PDO::FETCH_ASSOC);
    
    $statuses = array();
    foreach ($res as $status){
        
        $statuses[]  = array(
            "id" => $status["id"],
            "text" => $status["name"],
            "desc" => $status["name"]
        );
    }
    $pdo = null;
    $app->response()->header("Content-Type", "application/json");
    //print_r($res);
    echo json_encode($statuses);
});

/**
 * zeynel dağlı
 * @since 27-01-2015
 */
$app->get("/updateCompanyFlows_scn", function () use ($app, $pdo) {

        if(  $_GET['id']!="" && $_GET['id']!=null) {
                try {
                    $pdo->beginTransaction();
                    
                    $pdo->query('
                        UPDATE t_cmpny_flow
                            SET  
                                potential_energy=?, 
                                potential_energy_unit=?, 
                                supply_cost=?, 
                                supply_cost_unit=?, 
                                transport_id=?, 
                                substitute_potential=?,  
                                concentration=?, 
                                pression=?,  
                                state_id=?, 
                                min_flow_rate=?, 
                                min_flow_rate_unit=?,
                                max_flow_rate=?,
                                max_flow_rate_unit=?, 
                                cost_unit_id=?, 
                                ep_unit_id=?
                          WHERE id=;
                    ')->fetchAll(PDO::FETCH_ASSOC);
                    
                    
                    /*$stmt_log=$pdo->prepare("
                        

                            UPDATE t_cmpny_flow
                            SET id=?, 
                                cmpny_id=?, 
                                flow_id=?, 
                                qntty=?, 
                                cost=?, 
                                ep=?, 
                                flow_type_id=?, 
                                potential_energy=?, 
                                potential_energy_unit=?, 
                                supply_cost=?, 
                                supply_cost_unit=?, 
                                transport_id=?, 
                                substitute_potential=?,  
                                 
                                
                                concentration=?, 
                                pression=?,  
                                state_id=?, 
                                min_flow_rate=?, 
                                min_flow_rate_unit=?,
                                max_flow_rate=?,
                                max_flow_rate_unit=?, 
                                cost_unit_id=?, 
                                ep_unit_id=?
                          WHERE id=;






                            UPDATE t_is_prj
                            SET name=:name
                          WHERE id=:id;
                    ");*/
                    //print_r(array(':name'=>$_GET["scenario"],':id'=>$_GET["id"]));  
                    //$result =$stmt_log->execute(array(':name'=>$_GET["scenario"],':id'=>$_GET["id"]));
                    //print_r($stmt_log->debugDumpParams());
                    //$affectedRows = $stmt_log->rowCount();
                    //$errorInfo = $stmt_log->errorInfo();
                    if($errorInfo[0]!="00000" && $errorInfo[1]!=NULL && $errorInfo[2]!=NULL ) throw new PDOException($errorInfo[2]);
                    $pdo->commit();
                    $app->response()->header("Content-Type", "application/json");
                    //echo json_encode(array("found"=>true,"errorInfo"=>$errorInfo,"id"=>$affectedRows));


                } catch(PDOException $e /*Exception $e*/) {   
                    //$pdo->rollback(); 
                    $app->response()->header("Content-Type", "application/json");
                    //echo json_encode(array("found"=>false,"errorInfo"=>$e->getMessage(),'test11'=>'bulundu'));
                } 
            } else {
            $app->response()->header("Content-Type", "application/json");
            //echo json_encode(array("found"=>false,"errorInfo"=>'Data Not Found'));
        }
    
});



/**
 * zeynel dağlı
 * @since 27-01-2015
 */
$app->get("/getStateTypes_scn", function () use ($app, $pdo) {
    

    $res = $pdo->query('
                        SELECT id, name
                            FROM t_state;
                        WHERE active=1 ;
                    ')->fetchAll(PDO::FETCH_ASSOC);
    
    
   $companies = array();
    foreach ($res as $company){
        
        $companies[]  = array(
            "id" => (string)$company["id"],
            "name" => $company["name"]
        );
    }
    
    //{field:'opportunity',title:'Opportunity',width:80},
    
    
    $app->response()->header("Content-Type", "application/json");
    
    //$resultArray = array();
    //$resultArray['total'] = count($res);
    //$resultArray['rows'] = $companies;
    //print_r($companies);
    echo json_encode($companies);
});



/**
 * zeynel dağlı
 * @since 27-01-2015
 */
$app->get("/getTransportationTypes_scn", function () use ($app, $pdo) {
    

    $res = $pdo->query('
                        SELECT id, name
                        FROM t_transport;
                        WHERE active=1 ;
                    ')->fetchAll(PDO::FETCH_ASSOC);
    
    
   $companies = array();
    foreach ($res as $company){
        
        $companies[]  = array(
            "id" => (string)$company["id"],
            "name" => $company["name"]
        );
    }
    
    //{field:'opportunity',title:'Opportunity',width:80},
    
    
    $app->response()->header("Content-Type", "application/json");
    
    //$resultArray = array();
    //$resultArray['total'] = count($res);
    //$resultArray['rows'] = $companies;
    //print_r($companies);
    echo json_encode($companies);
});


/**
 * zeynel dağlı
 * @since 27-01-2015
 */
$app->get("/getUnitsAllFetchClass_scn", function () use ($app, $pdo) {
    
    $res = $pdo->query('SELECT id, 
                            name 
                            /*name_tr, 
                            active, 
                            unit_type_id*/
                            FROM t_unit
                            WHERE active=1 ;
                        ;')->fetchAll(PDO::FETCH_CLASS);
        //print_r($res);
        $pdo = null;
        $app->response()->header("Content-Type", "application/json");
        //print_r($res);
        echo json_encode($res);
});

/**
 * zeynel dağlı
 * @since 27-01-2015
 */
$app->get("/getUnitsAll_scn", function () use ($app, $pdo) {
    

    $res = $pdo->query('
                        SELECT id, 
                        name 
                        /*name_tr, 
                        active, 
                        unit_type_id*/
                        FROM t_unit
                        WHERE active=1 ;
                    ')->fetchAll(PDO::FETCH_ASSOC);
    
    
   $companies = array();
    foreach ($res as $company){
        
        $companies[]  = array(
            "id" => (string)$company["id"],
            "name" => $company["name"]
        );
    }
    
    //{field:'opportunity',title:'Opportunity',width:80},
    
    
    $app->response()->header("Content-Type", "application/json");
    
    //$resultArray = array();
    //$resultArray['total'] = count($res);
    //$resultArray['rows'] = $companies;
    //print_r($companies);
    echo json_encode($companies);
});





/**
 * zeynel dağlı
 * @since 27-01-2015
 */
$app->get("/getScenarioDetails_scn", function () use ($app, $pdo) {
    
    $sorguStr = null;
    if(isset($_GET['id']) && $_GET['id']!="" ) {
        $id = $_GET['id'];
       
        $sorguStr = "WHERE pd.is_prj_id=".$_GET['id']."  ";
        //WHERE (cmpny_id=15 OR cmpny_id=13) AND flow_id=10
    } else {
        
    }
    
        /*print_r('
                SELECT pd.id, 
                                    pd.cmpny_from_id as id, 
                                    pd.cmpny_to_id as tocompanyid, 
                                    pd.flow_id as flowid,  
                                    pd.from_quantity as miktar, 
                                    pd.to_quantity as miktar2, 
                                    pd.unit_id,
                                    pd.is_prj_id,
                                    (SELECT name from t_cmpny WHERE id=pd.cmpny_from_id) as company_from,
                                    (SELECT name from t_cmpny WHERE id=pd.cmpny_to_id) as company_to,
                                    (SELECT name from t_flow WHERE id=pd.flow_id) as flow,
                                    (SELECT name from t_flow WHERE id=pd.flow_id_to) as flowto,
                                    (SELECT name from t_cmpny_flow cf
                                         INNER JOIN t_flow_type ft ON cf.flow_type_id=ft.id
                                    WHERE flow_id=pd.flow_id AND cmpny_id=pd.cmpny_from_id LIMIT 1) as from_flow_type,
                                    (SELECT name from t_cmpny_flow cf
                                         INNER JOIN t_flow_type ft ON cf.flow_type_id=ft.id
                                    WHERE flow_id=pd.flow_id_to AND cmpny_id=pd.cmpny_to_id LIMIT 1) as to_flow_type ,
                                     (SELECT ft.name from t_cmpny_flow cf
                                            INNER JOIN t_unit ft ON cf.qntty_unit_id=ft.id
                                       WHERE flow_id=pd.flow_id_to AND cmpny_id=pd.cmpny_to_id LIMIT 1) as to_unit,
                                       (SELECT u.name 
                                       from t_unit u
                                       WHERE u.id=pd.to_unit_id LIMIT 1) as to_unit2,
                                       (SELECT ft2.name 
                                       from t_flow_type ft2
                                       WHERE ft2.id=pd.to_flow_type_id LIMIT 1) as to_flow_type2,
                                       (SELECT ft.name from t_cmpny_flow cf
                                            INNER JOIN t_unit ft ON cf.qntty_unit_id=ft.id
                                       WHERE flow_id=pd.flow_id AND cmpny_id=pd.cmpny_from_id LIMIT 1) as from_unit  
                                    FROM t_is_prj_details pd
                                 
                                '.$sorguStr.' ');*/
        $res = $pdo->query('
                            SELECT pd.id, 
                                    pd.cmpny_from_id as id, 
                                    pd.cmpny_to_id as tocompanyid, 
                                    pd.flow_id as flowid,  
                                    pd.from_quantity as miktar, 
                                    pd.to_quantity as miktar2, 
                                    pd.unit_id,
                                    pd.is_prj_id,
                                    (SELECT name from t_cmpny WHERE id=pd.cmpny_from_id) as company_from,
                                    (SELECT name from t_cmpny WHERE id=pd.cmpny_to_id) as company_to,
                                    (SELECT name from t_flow WHERE id=pd.flow_id) as flow,
                                    (SELECT name from t_flow WHERE id=pd.flow_id_to) as flowto,
                                    (SELECT name from t_cmpny_flow cf
                                         INNER JOIN t_flow_type ft ON cf.flow_type_id=ft.id
                                    WHERE flow_id=pd.flow_id AND cmpny_id=pd.cmpny_from_id LIMIT 1) as from_flow_type,
                                    (SELECT name from t_cmpny_flow cf
                                         INNER JOIN t_flow_type ft ON cf.flow_type_id=ft.id
                                    WHERE flow_id=pd.flow_id_to AND cmpny_id=pd.cmpny_to_id LIMIT 1) as to_flow_type ,
                                     (SELECT ft.name from t_cmpny_flow cf
                                            INNER JOIN t_unit ft ON cf.qntty_unit_id=ft.id
                                       WHERE flow_id=pd.flow_id_to AND cmpny_id=pd.cmpny_to_id LIMIT 1) as to_unit,
                                       (SELECT u.name 
                                       from t_unit u
                                       WHERE u.id=pd.to_unit_id LIMIT 1) as to_unit2,
                                       (SELECT ft2.name 
                                       from t_flow_type ft2
                                       WHERE ft2.id=pd.to_flow_type_id LIMIT 1) as to_flow_type2,
                                       (SELECT ft.name from t_cmpny_flow cf
                                            INNER JOIN t_unit ft ON cf.qntty_unit_id=ft.id
                                       WHERE flow_id=pd.flow_id AND cmpny_id=pd.cmpny_from_id LIMIT 1) as from_unit  
                                    FROM t_is_prj_details pd
                                 
                                '.$sorguStr.';
                                ')->fetchAll(PDO::FETCH_ASSOC);
    
    
   $companies = array();
    foreach ($res as $company){
        $qntty2unit;
        if ($company['to_unit2'] == '') {
            $qntty2unit = $company['to_unit'];   
        } else {
            $qntty2unit = $company['to_unit2'];
        }
        $toflowtype;
        if ($company['to_flow_type2'] == '') {
            $toflowtype = $company['to_flow_type'];   
        } else {
            $toflowtype = $company['to_flow_type2'];
        }
        
        
        $companies[]  = array(
            "id" => $company["id"].",".$company["tocompanyid"].",".$company["flowid"],
            "company" => $company["company_from"],
            "tocompany" => $company["company_to"],
            "fromflowtype" => $company["from_flow_type"],
            "toflowtype" => $toflowtype,
            "flow" => $company["flow"],
            "flowto" => $company["flowto"],
            //"qntty" => $company["qntty"],
            "qntty" => $company["miktar"],
            //"qntty2" => $company["qntty2"],
            "qntty2" => $company["miktar2"],
            "qntty2unit" => $qntty2unit,
            "qnttyunit" => $company["from_unit"]
        );
    }
    
    //{field:'opportunity',title:'Opportunity',width:80},
    
    
    $app->response()->header("Content-Type", "application/json");
    
    $resultArray = array();
    //$resultArray['total'] = count($res);
    $resultArray['rows'] = $companies;
    echo json_encode($resultArray);
   

    
});


/**
 * zeynel dağlı
 * @since 27-01-2015
 */
$app->get("/updateScenario_scn", function () use ($app, $pdo) {

        if($_GET['scenario']!="" && $_GET['scenario']!=null &&  $_GET['id']!="" && $_GET['id']!=null) {
                try {
                    $pdo->beginTransaction(); 
                    $stmt_log=$pdo->prepare("
                            UPDATE t_is_prj
                            SET name=:name
                          WHERE id=:id;
                    ");
                    //print_r(array(':name'=>$_GET["scenario"],':id'=>$_GET["id"]));  
                    $result =$stmt_log->execute(array(':name'=>$_GET["scenario"],':id'=>$_GET["id"]));
                    //print_r($stmt_log->debugDumpParams());
                    $affectedRows = $stmt_log->rowCount();
                    $errorInfo = $stmt_log->errorInfo();
                    if($errorInfo[0]!="00000" && $errorInfo[1]!=NULL && $errorInfo[2]!=NULL ) throw new PDOException($errorInfo[2]);
                    $pdo->commit();
                    $app->response()->header("Content-Type", "application/json");
                    echo json_encode(array("found"=>true,"errorInfo"=>$errorInfo,"id"=>$affectedRows));


                } catch(PDOException $e /*Exception $e*/) {   
                    //$pdo->rollback(); 
                    $app->response()->header("Content-Type", "application/json");
                    echo json_encode(array("found"=>false,"errorInfo"=>$e->getMessage(),'test11'=>'bulundu'));
                } 
            } else {
            $app->response()->header("Content-Type", "application/json");
            echo json_encode(array("found"=>false,"errorInfo"=>'Data Not Found'));
        }
    
});


/**
 * zeynel dağlı
 * @since 27-01-2015
 */
$app->get("/deleteScenario_scn", function () use ($app, $pdo) {
    

    if(isset($_GET['items']) && $_GET['items']!="" && isset($_GET['items']) && $_GET['items']!="") {
        $items = $_GET['items'];
        $itemsArr = json_decode(stripslashes($items), true);
        //print_r($itemsArr);
        $sorguStr = "WHERE sm.cmpny_id=".$itemsArr['company']."  AND sm.flow_id=".$itemsArr['flow']." ";
        //WHERE (cmpny_id=15 OR cmpny_id=13) AND flow_id=10
    } else {
        
    }
    
        try {
                    //$pdo->beginTransaction(); 
                    
                    //$res = $pdo->query('SELECT * FROM __is_scenario_delete('.$_GET["id"].'::INTEGER); ')->fetchAll(PDO::FETCH_ASSOC);;
                    //print_r($res);
                    $stmt_log=$pdo->prepare("
                        
                         SELECT * FROM __is_scenario_delete(:id::INTEGER);

                        /*INSERT INTO t_eqpmnt_type (name, mother_id, active)
                    SELECT :name1, :mother_id, 1
                    WHERE NOT EXISTS (
                        SELECT name
                        FROM t_eqpmnt_type
                        WHERE name = :name AND mother_id=:mother_id
                        )
                        returning id;*/
                    ");

                    $result =$stmt_log->execute(array(':id'=>$_GET["id"]));
                    //$insertID = $pdo->lastInsertId('t_eqpmnt_type_id_seq');
                    print_r($result);
                   // $errorInfo = $stmt_log->errorInfo();
                    //if($errorInfo[0]!="00000" && $errorInfo[1]!=NULL && $errorInfo[2]!=NULL ) throw new PDOException($errorInfo[2]);
                    //$pdo->commit();
                    $app->response()->header("Content-Type", "application/json");
                    //echo json_encode(array("found"=>true,"errorInfo"=>$errorInfo,"id"=>$insertID));


            } catch(PDOException $e /*Exception $e*/) {   
                //$pdo->rollback(); 
                $app->response()->header("Content-Type", "application/json");
                echo json_encode(array("found"=>false,"errorInfo"=>$e->getMessage(),'test11'=>'bulundu'));
            }
    
});







$app->run();