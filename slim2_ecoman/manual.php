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
 * @since 02-12-2014
 */
$app->get("/ISPotentialsNew_json_test_by_project_prj", function () use ($app, $db, $pdo) {
    //$pdo->exec('SET NAMES "utf8"');
    //$res = $pdo->query(  "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'ecoman_18_08' AND TABLE_NAME = 't_flow';"  )->fetchAll(PDO::FETCH_ASSOC);
    
    if(isset($_GET['page']) && $_GET['page']!="" && isset($_GET['rows']) && $_GET['rows']!="") {
        if($_GET['page']>0) {
             $offset = ((intval($_GET['page'])-1)* intval($_GET['rows']));
             $limit = intval($_GET['rows']);
        } else {
            $limit = 10;
            $offset = 0;
        }
    } else {
        $limit = 10;
        $offset = 0;
    }
    
    if(isset($_GET['sort']) && $_GET['sort']!="") {
        $sort = trim($_GET['sort']);
    } else {
        $sort = "id";
    }
    
    if(isset($_GET['order']) && $_GET['order']!="") {
        $order = trim($_GET['order']);
    } else {
        $order = "desc";
    }
    $inputOutputSearch=null;
    if(isset($_GET['IS']) && $_GET['IS']!="") {
        $inputOutputMut = trim($_GET['IS']);
        switch ($inputOutputMut) {
            case 1:
                $inputOutputSearch = "and a.flow_type_id=1
                                      and b.flow_type_id=1";
                break;
            case 2:
                $inputOutputSearch = "and a.flow_type_id=2
                                      and b.flow_type_id=2";
                break;
            case 3:
                $inputOutputSearch = "and a.flow_type_id=1
                                      and b.flow_type_id=2";
                break;
            case 0:
                $inputOutputSearch = null;
                break;
            default:
                $inputOutputSearch = "and a.flow_type_id=1
                                      and b.flow_type_id=1";
                break;
        }
    } else {
        $inputOutputSearch = null;
    }
    
    if(isset($_GET['prj_id']) && $_GET['prj_id']!="" && $_GET['prj_id']!=-1) {
        $projectID = $_GET['prj_id'];
        $projectStr = 'and a.cmpny_id IN (SELECT cmpny_id FROM t_prj_cmpny WHERE prj_id = '.$projectID.' )   
                       and b.cmpny_id IN (SELECT cmpny_id FROM t_prj_cmpny WHERE prj_id = '.$projectID.' )';
    } else {
        $projectID = '';
        $projectStr = '';
    }
    
    if(isset($_GET["selectedFlows"]) && $_GET["selectedFlows"]!=null && isset($_GET["companies"]) && $_GET["companies"]!=null) {
        $flowStr = rtrim($_GET["selectedFlows"], ",");
        $companyStr = rtrim($_GET["companies"], ",");
        
        
        /*print_r('SELECT 
                            a.cmpny_id,
                            a.flow_id,

                            b.cmpny_id,
                             b.flow_id ,
                             f.name as flow,
                             a.cmpny_id as id, 
                            cc.name as company,
                            a.qntty as a_miktar,
                            ua.name as qnttyunit,
                            fta.name as fromflowtype,
                            dd.id as tocompanyid,
                            dd.name as gittigifirma,
                            b.qntty as b_miktar,
                            ub.name as qntty2unit,
                            ftb.name as toflowtype,

                            f.id as flowid
                            FROM t_cmpny_flow AS a
                            INNER JOIN t_cmpny_flow AS b on b.flow_id = a.flow_id
                            inner join  t_cmpny cc on cc.id = a.cmpny_id
                            inner join  t_cmpny dd on dd.id = b.cmpny_id
                            --inner join t_prj_cmpny prjcmp1 ON cc.id = prjcmp1.prj_id
                            inner join  t_unit ua on a.qntty_unit_id = ua.id
                            inner join  t_unit ub on b.qntty_unit_id = ub.id
                            inner join  t_flow_type fta on a.flow_type_id = fta.id
                            inner join  t_flow_type ftb on b.flow_type_id = ftb.id
                            inner join  t_flow f on b.flow_id = f.id
                            --RIGHT JOIN t_cmpny_flow AS b on b.flow_id = a.flow_id
                            where a.cmpny_id in ('.$companyStr.') 
                            and b.flow_id  in ('.$flowStr.') 
                            and a.cmpny_id<>b.cmpny_id
                            --and prjcmp1.prj_id = '.$projectID.'
                            '.$inputOutputSearch.'
                            '.$projectStr.'
                            order by a.cmpny_id, b.flow_id;');*/
     
    $res = $pdo->query('SELECT 
                            a.cmpny_id,
                            a.flow_id,

                            b.cmpny_id,
                             b.flow_id ,
                             f.name as flow,
                             a.cmpny_id as id, 
                            cc.name as company,
                            a.qntty as a_miktar,
                            ua.name as qnttyunit,
                            fta.name as fromflowtype,
                            dd.id as tocompanyid,
                            dd.name as gittigifirma,
                            b.qntty as b_miktar,
                            ub.name as qntty2unit,
                            ftb.name as toflowtype,

                            f.id as flowid
                            FROM t_cmpny_flow AS a
                            INNER JOIN t_cmpny_flow AS b on b.flow_id = a.flow_id
                            inner join  t_cmpny cc on cc.id = a.cmpny_id
                            inner join  t_cmpny dd on dd.id = b.cmpny_id
                            --inner join t_prj_cmpny prjcmp1 ON cc.id = prjcmp1.prj_id
                            inner join  t_unit ua on a.qntty_unit_id = ua.id
                            inner join  t_unit ub on b.qntty_unit_id = ub.id
                            inner join  t_flow_type fta on a.flow_type_id = fta.id
                            inner join  t_flow_type ftb on b.flow_type_id = ftb.id
                            inner join  t_flow f on b.flow_id = f.id
                            --RIGHT JOIN t_cmpny_flow AS b on b.flow_id = a.flow_id
                            where a.cmpny_id in ('.$companyStr.') 
                            and b.flow_id  in ('.$flowStr.') 
                            and a.cmpny_id<>b.cmpny_id
                            --and prjcmp1.prj_id = '.$projectID.'
                            '.$inputOutputSearch.'
                            '.$projectStr.'
                            order by a.cmpny_id, b.flow_id;')->fetchAll(PDO::FETCH_ASSOC);
         
         
         
    $companies = array();
    foreach ($res as $company){
        
        $companies[]  = array(
            "id" => $company["id"].",".$company["tocompanyid"].",".$company["flowid"],
            "company" => $company["company"],
            "tocompany" => $company["gittigifirma"],
            "fromflowtype" => $company["fromflowtype"],
            "toflowtype" => $company["toflowtype"],
            "flow" => $company["flow"],
            //"qntty" => $company["qntty"],
            "qntty" => $company["a_miktar"],
            //"qntty2" => $company["qntty2"],
            "qntty2" => $company["b_miktar"],
            "qntty2unit" => $company["qntty2unit"],
            "qnttyunit" => $company["qnttyunit"]
        );
    }
    
    //{field:'opportunity',title:'Opportunity',width:80},
    
    
    $app->response()->header("Content-Type", "application/json");
    
    $resultArray = array();
    $resultArray['total'] = count($res);
    $resultArray['rows'] = $companies;
    echo json_encode($resultArray);
    } else {
        $arraySonuc = array("notFound"=>true);
        echo json_encode($arraySonuc);
    }

});





/**
 * zeynel dağlı
 * @since 11-09-2014    
 */
$app->get("/flows", function () use ($app, $db) {
    $flows = array();
    if(isset($_GET['id']) && $_GET['id']!="" ) {
        //$offset = ((intval($_GET['page'])-1)* intval($_GET['rows']));
        $flowFamilyID = intval($_GET['id']);
        
        foreach ($db->t_flow()->where("flow_family_id=? AND active=? ", $flowFamilyID, 1) as $flow) {
            $flows[]  = array(
                "id" => $flow["id"],
                "text" => $flow["name"],
                "checked" => false,
                "attributes" => array ("notroot"=>true)
            );
        }
        
        $app->response()->header("Content-Type", "application/json");
        //echo json_encode($companies);
        //$resultArray = array();
        //$resultArray['total'] = $count;
        //$resultArray['rows'] = $companies;
        echo json_encode($flows);
    
    } else {
        foreach ($db->t_flow_family() as $flow) {
            $flows[]  = array(
                "id" => $flow["id"],
                "text" => $flow["name"],
                "state" => 'closed',
                "checked" => false,
                "attributes" => array ("notroot"=>false)
            );
        }
        
        $app->response()->header("Content-Type", "application/json");
        //echo json_encode($companies);
        //$resultArray = array();
        //$resultArray['total'] = $count;
        //$resultArray['rows'] = $companies;
        echo json_encode($flows);
    }
     
});


/**
 * zeynel dağlı
 * @since 27-01-2015
 */
$app->get("/get_user_projects", function () use ($app, $pdo) {
    
    
    if(isset($_GET['usrId']) && $_GET['usrId']!="") {
        $userId = trim($_GET['usrId']);
        /*print_r('SELECT * FROM t_flow_total_per_cmpny
                            INNER JOIN t_cmpny as cmp ON cmp.id = t_flow_total_per_cmpny.cmpny_id
                            '.$sorguStr.'
                            ORDER BY  '.$sort.' '.$order.' LIMIT '.$limit.' OFFSET '.$offset.'
                        ;');*/
        $res = $pdo->query('SELECT pr.id as id, 
                                cnsltnt_id, 
                                name
                                  FROM t_prj_cnsltnt pr_c
                                  INNER JOIN t_prj pr ON pr.id = pr_c.prj_id
                                  WHERE cnsltnt_id = '.$userId.';
                        ;')->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $userId = "";
    }
    
    $companies = array();
    $company_details = array();
    $company_details['id']= -1;
    $company_details['text']= 'All projects';
    $company_details['selected']= true;
    $companies[] = $company_details;
    $company_details = [];
   foreach ($res as $company){
        $company_details['id']= $company['id'];
        $company_details['text']= $company['name'];
	//"text":"Output Mutualisation",
     //print_r($company);
     //print_r($company['cmpny_name']);    
     //$test = json_encode($company);
     //print_r($test);
      $companies[] = $company_details;
    }

    $app->response()->header("Content-Type", "application/json");
    
    $resultArray = array();
    //$resultArray['total'] = $res2[0]['toplam'];
    $resultArray= $companies;
    echo json_encode($resultArray);
    
});




/**
 * zeynel dağlı
 * @since 24-11-2014
 */
$app->get("/companies_json_test2_manual", function () use ($app, $pdo) {
    //$pdo->exec('SET NAMES "utf8"');
    //$res = $pdo->query(  "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'ecoman_18_08' AND TABLE_NAME = 't_flow';"  )->fetchAll(PDO::FETCH_ASSOC);
    
    if(isset($_GET['page']) && $_GET['page']!="" && isset($_GET['rows']) && $_GET['rows']!="") {
        if($_GET['page']==0){ $pageNum = 1; } else { $pageNum=intval($_GET['page']); };
        $offset = ((intval($pageNum)-1)* intval($_GET['rows']));
        
        //$offset = ((intval($_GET['page'])-1)* intval($_GET['rows']));
        //$offset = ($pageNum * intval($_GET['rows']));
        
        $limit = intval($_GET['rows']);
    } else {
        $limit = 10;
        $offset = 0;
    }
    
    if(isset($_GET['sort']) && $_GET['sort']!="") {
        //$sort = ucfirst(trim($_GET['sort']));
        if(trim($_GET['sort']=='cmpny_name')) {
            $sort = "cmpny_name";
        } else {
             $sort = trim($_GET['sort']);
             $sort = ' CAST("'.trim($_GET['sort']).'"->\'flow_properties\'->>\'quantity\' AS numeric)  ';
        }
       
    } else {
        $sort = "cmpny_name";
    }
    
    if(isset($_GET['order']) && $_GET['order']!="") {
        $order = trim($_GET['order']);
    } else {
        $order = "desc";
    }
    
    $sorguStr=null;
    if(isset($_GET['filterRules']) && $_GET['filterRules']!="" && $_GET['filterRules']!= null) {
        $filterRules = trim($_GET['filterRules']);
        //print_r(json_decode($filterRules));
        $jsonFilter = json_decode($filterRules, true);
        //print_r($jsonFilter[0]->field);
        $sorguExpression = null;
        foreach ($jsonFilter as $std) {
            if($std['value']!=null) {
                switch (trim($std['op'])) {
                case 'greater':
                    $sorguExpression = '>';
                    $sorguStr.=' CAST("'.$std['field'].'"->\'flow_properties\'->>\'quantity\' AS numeric)  '.$sorguExpression.''.$std['value'].' AND ';
                    break;
                case 'equal':
                    $sorguExpression = '=';
                    $sorguStr.=' CAST("'.$std['field'].'"->\'flow_properties\'->>\'quantity\' AS numeric)  '.$sorguExpression.''.$std['value'].' AND ';
                    break;
                case 'notequal':
                    $sorguExpression = '<>';
                    $sorguStr.=' CAST("'.$std['field'].'"->\'flow_properties\'->>\'quantity\' AS numeric)  '.$sorguExpression.''.$std['value'].' AND ';
                    break;
                case 'less':
                    $sorguExpression = '<';
                    $sorguStr.=' CAST("'.$std['field'].'"->\'flow_properties\'->>\'quantity\' AS numeric)  '.$sorguExpression.''.$std['value'].' AND ';
                    break;
                case 'contains':
                    $sorguExpression = 'LIKE';
                    //$sorguStr.=' cmp.name ILIKE \'%'.$std['value'].'%\' AND ';
                    $sorguStr.=' cmpny_name ILIKE \'%'.$std['value'].'%\' AND ';
                    continue;
                    break;
                default:
                    $sorguExpression = '=';
                    $sorguStr.=' CAST("'.$std['field'].'"->\'flow_properties\'->>\'quantity\' AS numeric)  '.$sorguExpression.''.$std['value'].' AND ';
                    break;
                }
                //print_r($std->field);
                //print_r($std); 
            }  
        }

        /*$sorguStr = rtrim($sorguStr,"AND ");
        if($sorguStr!="") $sorguStr = "WHERE ".$sorguStr;*/
        
        
    } else {
        $sorguStr=null;   
        $filterRules = "";
    }
    
    if(isset($_GET['prj_id']) && $_GET['prj_id']!="") {
        $sorguStr.= 'cmpny_id IN (SELECT cmpny_id FROM t_prj_cmpny WHERE prj_id= '.trim($_GET['prj_id']).') AND ';
    } else {
        
    }
    
    $sorguStr = rtrim($sorguStr,"AND ");
    if($sorguStr!="") $sorguStr = "WHERE ".$sorguStr;

    /*print_r('SELECT * FROM t_flow_total_per_cmpny
                            --INNER JOIN t_cmpny as cmp ON cmp.id = t_flow_total_per_cmpny.cmpny_id
                            '.$sorguStr.'
                            -- cmpny_id IN (SELECT cmpny_id FROM t_prj_cmpny WHERE prj_id= 13)
                            ORDER BY  '.$sort.' '.$order.' LIMIT '.$limit.' OFFSET '.$offset.'
                        ;');*/
    $res = $pdo->query('SELECT * FROM t_flow_total_per_cmpny
                            --INNER JOIN t_cmpny as cmp ON cmp.id = t_flow_total_per_cmpny.cmpny_id
                            '.$sorguStr.'
                            -- cmpny_id IN (SELECT cmpny_id FROM t_prj_cmpny WHERE prj_id= 13)
                            ORDER BY  '.$sort.' '.$order.' LIMIT '.$limit.' OFFSET '.$offset.'
                        ;')->fetchAll(PDO::FETCH_ASSOC);
    //$res = $pdo->query('SELECT * FROM t_flow_total_per_cmpny;');
                            
    $res2 = $pdo->query(  'select count(*) as toplam FROM t_flow_total_per_cmpny
                            --INNER JOIN t_cmpny as cmp ON cmp.id = t_flow_total_per_cmpny.cmpny_id
                            '.$sorguStr.'
                           /* WHERE 
                            CAST("Brass"->\'flow_properties\'->>\'quantity\' AS integer) >20*/
                            /*AND CAST("Brass"->\'flow_properties\'->>\'quantity\' AS integer) <25*/
                            ;'  )->fetchAll(PDO::FETCH_ASSOC);
    $companies = array();
    $company_details = array();
   foreach ($res as $company){
        //$companies[];
        $company_details = array();
        foreach ($company AS $key=> $value) {
            //$company_details = array();
            //print_r($company);
            //echo ($company[$key]).'/n/l';
            if($key=='cmpny_id' ) {
                //print_r('company key---->'.$company[$key]);
                $company_details['id']= $company[$key];
                continue;
            } else if($key=='cmpny_name') {
                $company_details['company']= $value;
                continue;
            } else {
                $value = json_decode($value, true);
                //print_r($value);
                //print_r($value['column_name']);
                //print_r($key); 
                //print_r($value->column_name);
                
                if($value['flow_properties']['quantity']!=null && $value['flow_properties']['quantity']!='') {
                    $company_details[trim($key)]= "<a href='#' id='".$company["cmpny_id"]."_1_".$value['column_name']."' class='easyui-tooltip'  >".$value['flow_properties']['quantity']." ".$value['flow_properties']['unit']." -".$value['flow_properties']['quality']."- ".$value['flow_properties']['flow_type']." </a>
                        <script>$('#".$company["cmpny_id"]."_1_".$value['column_name']."').tooltip({
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
                                href: 'isscopingtooltip?id=".$company["cmpny_id"]."&col=".$value['column_name']."'
                            });
                        }

                    });</script> 

                    ";
                } 
                
            }
            
        }
     //print_r($company);
     //print_r($company['cmpny_name']);    
     //$test = json_encode($company);
     //print_r($test);
      $companies[] = $company_details;
    }

    $app->response()->header("Content-Type", "application/json");
    
    $resultArray = array();
    $resultArray['total'] = $res2[0]['toplam'];
    $resultArray['rows'] = $companies;
    echo json_encode($resultArray);
    
});


/**
 * zeynel dağlı
 * @since 02-12-2014
 */
$app->get("/companyFlows_json_test_manual", function () use ($app, $db, $pdo) {
    //$pdo->exec('SET NAMES "utf8"');
    //$res = $pdo->query(  "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'ecoman_18_08' AND TABLE_NAME = 't_flow';"  )->fetchAll(PDO::FETCH_ASSOC);
    $companyID=null;
    if(isset($_GET['companyid']) && $_GET['companyid']!="" ) {
        //$companyID = intval($_GET['companyid']);
        $companyID ="cmpny_id=".intval($_GET['companyid']);
    } else {
        $companyID=null;
    }
    
    if(isset($_GET['page']) && $_GET['page']!="" && isset($_GET['rows']) && $_GET['rows']!="") {
        if($_GET['page']>0) {
             $offset = ((intval($_GET['page'])-1)* intval($_GET['rows']));
             $limit = intval($_GET['rows']);
        } else {
            $limit = 10;
            $offset = 0;
        }
    } else {
        $limit = 10;
        $offset = 0;
    }
    
    if(isset($_GET['sort']) && $_GET['sort']!="") {
        $sort = trim($_GET['sort']);
    } else {
        $sort = "id";
    }
    
    if(isset($_GET['order']) && $_GET['order']!="") {
        $order = trim($_GET['order']);
    } else {
        $order = "desc";
    }
    
    if(isset($_GET['IS2']) && $_GET['IS2']!="") {
        $inputOutputMut = trim($_GET['IS2']);
        switch ($inputOutputMut) {
            case 2:
                $inputOutputSearch = "and sm.flow_type_id=1 ";
                break;
            case 3:
                $inputOutputSearch = "and sm.flow_type_id=2";
                break;
            case 4:
                $inputOutputSearch = "and sm.flow_type_id=1";
                break;
            case 1:
                $inputOutputSearch = null;
                break;
            default:
                $inputOutputSearch = "and sm.flow_type_id=1";
                break;
        }
    } else {
        $inputOutputSearch = null;
    }
    
    $whereStr = null;
    if($inputOutputSearch!=null || $companyID!=null) $whereStr=' WHERE ';
    
    /*print_r("SELECT 
                            sm.cmpny_id as cmpny_id,
                            sm.flow_id as id,
                            f.name as flow,
                            sm.qntty as qntty,
                            u.name as unit,
                            sm.quality as quality,
                            ft.name as flowtype
                            FROM t_cmpny_flow AS sm
                            LEFT JOIN t_flow f on sm.flow_id = f.id
                            LEFT JOIN t_unit u on sm.qntty_unit_id = u.id
                            LEFT JOIN t_flow_type ft  on sm.flow_type_id = ft.id
                            ".$whereStr." ".$companyID."
                            ".$inputOutputSearch."
                            ORDER BY  ".$sort." ".$order." LIMIT ".$limit." OFFSET ".$offset."  ");*/
    
    $res = $pdo->query("SELECT 
                            sm.cmpny_id as cmpny_id,
                            sm.flow_id as id,
                            f.name as flow,
                            sm.qntty as qntty,
                            u.name as unit,
                            sm.quality as quality,
                            ft.name as flowtype
                            FROM t_cmpny_flow AS sm
                            LEFT JOIN t_flow f on sm.flow_id = f.id
                            LEFT JOIN t_unit u on sm.qntty_unit_id = u.id
                            LEFT JOIN t_flow_type ft  on sm.flow_type_id = ft.id
                            ".$whereStr." ".$companyID."
                            ".$inputOutputSearch."
                            ORDER BY flow ASC /*".$sort." ".$order."*/ LIMIT ".$limit." OFFSET ".$offset."  ")->fetchAll(PDO::FETCH_ASSOC);
                            //ORDER BY  ".$order." ".$sort." LIMIT ".$offset.",".$limit."
    $res2 = $pdo->query(  "SELECT 
                            count(*) as toplam
                            FROM t_cmpny_flow AS sm

                            ".$whereStr." ".$companyID."
                            ".$inputOutputSearch." ;"  )->fetchAll(PDO::FETCH_ASSOC);
    $flows = array();
    foreach ($res as $flow){
        $flows[]  = array(
            "company_id"=>$flow["cmpny_id"],
            "id" => $flow["id"],
            "flow" => $flow["flow"],
            "qntty" => $flow["qntty"],
            "unit" => $flow["unit"],
            "quality" => $flow["quality"],
            "flowtype" => $flow["flowtype"],
        );
    }
    
    //{field:'opportunity',title:'Opportunity',width:80},
    
    
    $app->response()->header("Content-Type", "application/json");
    
    /*if($inputOutputSearch!=null || $companyID!=null) {
        $resultArray = array();
        $resultArray['total'] = $res2[0]['toplam'];
        $resultArray['rows'] = $flows;
        //json_decode($_GET["selectedFlows"]);

        echo json_encode($resultArray);
    } else {
        $resultArray['data'] = $flows;
        echo json_encode($resultArray);
    }*/
    
    $resultArray = array();
    $resultArray['total'] = $res2[0]['toplam'];
    $resultArray['rows'] = $flows;
    //json_decode($_GET["selectedFlows"]);

    echo json_encode($resultArray);
    
    
});


/**
 * zeynel dağlı
 * @since 02-12-2014
 */
$app->get("/flowCompanies_json_test_manual", function () use ($app, $db, $pdo) {
    //$pdo->exec('SET NAMES "utf8"');
    //$res = $pdo->query(  "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'ecoman_18_08' AND TABLE_NAME = 't_flow';"  )->fetchAll(PDO::FETCH_ASSOC);
    if(isset($_GET['flowid']) && $_GET['flowid']!="" ) {
        $flowID = intval($_GET['flowid']);
    } 
    
     if(isset($_GET['cmpny_id']) && $_GET['cmpny_id']!="" ) {
        //$companyID = " AND sm.cmpny_id!=".intval($_GET['cmpny_id']);
         $companyID = "  sm.cmpny_id!=".intval($_GET['cmpny_id']);
    }
    
    if(isset($_GET['page']) && $_GET['page']!="" && isset($_GET['rows']) && $_GET['rows']!="") {
        if($_GET['page']>0) {
            $offset = ((intval($_GET['page'])-1)* intval($_GET['rows']));
             $limit = intval($_GET['rows']);
        } else {
            $limit = 10;
            $offset = 0;
        }
        
    } else {
        $limit = 10;
        $offset = 0;
    }
    
    if(isset($_GET['sort']) && $_GET['sort']!="") {
        $sort = trim($_GET['sort']);
    } else {
        $sort = "id";
    }
    
    if(isset($_GET['order']) && $_GET['order']!="") {
        $order = trim($_GET['order']);
    } else {
        $order = "desc";
    }
    
    if(isset($_GET['IS3']) && $_GET['IS3']!="") {
        $inputOutputMut = trim($_GET['IS3']);
        switch ($inputOutputMut) {
            case 2:
                $inputOutputSearch = "and sm.flow_type_id=1 ";
                break;
            case 3:
                $inputOutputSearch = "and sm.flow_type_id=2";
                break;
            case 4:
                $inputOutputSearch = "and sm.flow_type_id=2";
                break;
            case 1:
                $inputOutputSearch = null;
                break;
            default:
                $inputOutputSearch = "and sm.flow_type_id=1";
                break;
        }
    } else {
        $inputOutputSearch = null;
    }
    
    if(isset($_GET['prj_id']) && $_GET['prj_id']!="" && $_GET['prj_id']!=-1) {
        $projectID = $_GET['prj_id'];
        $projectStr = ' AND  cm.id IN ( SELECT cmpny_id FROM t_prj_cmpny WHERE prj_id = '.$projectID.'  )';
    } else {
        $projectID = '';
        $projectStr = '';
    }
    
    /*print_r("SELECT 
                            sm.cmpny_id as id,
                            cm.name as company,
                            sm.qntty as qntty,
                            u.name as unit,
                            sm.quality as quality,
                            ft.name as flowtype
                            FROM t_cmpny_flow AS  sm
                            LEFT JOIN t_flow f on sm.flow_id = f.id
                            LEFT JOIN t_unit u on sm.qntty_unit_id = u.id
                            LEFT JOIN t_flow_type ft  on sm.flow_type_id = ft.id
                            LEFT JOIN t_cmpny cm  on sm.cmpny_id= cm.id
                            WHERE /*flow_id=".$flowID."*/ 
                           /* ".$companyID."
                            ".$inputOutputSearch."
                            ".$projectStr."
                            ORDER BY  ".$sort." ".$order." LIMIT ".$limit." OFFSET ".$offset."   ");*/
    $res = $pdo->query("SELECT 
                            sm.cmpny_id as id,
                            cm.name as company,
                            sm.qntty as qntty,
                            u.name as unit,
                            sm.quality as quality,
                            ft.name as flowtype,
                            f.name as flow,
                            f.id as flowid,
                            u.id as unit_id,
                            ft.id as flow_type_id
                            FROM t_cmpny_flow AS  sm
                            LEFT JOIN t_flow f on sm.flow_id = f.id
                            LEFT JOIN t_unit u on sm.qntty_unit_id = u.id
                            LEFT JOIN t_flow_type ft  on sm.flow_type_id = ft.id
                            LEFT JOIN t_cmpny cm  on sm.cmpny_id= cm.id
                            WHERE /*flow_id=".$flowID."*/ 
                            ".$companyID."
                            ".$inputOutputSearch."
                            ".$projectStr."
                            ORDER BY  ".$sort." ".$order." LIMIT ".$limit." OFFSET ".$offset."  ")->fetchAll(PDO::FETCH_ASSOC);
                            //ORDER BY  ".$order." ".$sort." LIMIT ".$offset.",".$limit."
    $res2 = $pdo->query(  "SELECT 
                            count(*) as toplam
                            FROM t_cmpny_flow AS sm
                            LEFT JOIN t_cmpny cm  on sm.cmpny_id= cm.id
                            WHERE /*flow_id=".$flowID."*/
                            ".$companyID."
                            ".$inputOutputSearch.""
            . "             ".$projectStr." ;"  )->fetchAll(PDO::FETCH_ASSOC);
    $flows = array();
    foreach ($res as $flow){
        $flows[]  = array(
            "id" => $flow["id"],
            "company" => $flow["company"],
            "flow" => $flow["flow"],
            "qntty" => $flow["qntty"],
            "unit" => $flow["unit"],
            "quality" => $flow["quality"],
            "flowtype" => $flow["flowtype"],
            "unit_id" => $flow["unit_id"],
            "flow_type_id" => $flow["flow_type_id"],
            "flowID" => $flow["flowid"],
        );
    }
    
    //{field:'opportunity',title:'Opportunity',width:80},
    
    
    $app->response()->header("Content-Type", "application/json");
    
    $resultArray = array();
    $resultArray['total'] = $res2[0]['toplam'];
    $resultArray['rows'] = $flows;
    echo json_encode($resultArray);
    
});

/**
 * zeynel dağlı
 * @since 11-09-2014
 */
$app->post("/insertIS", function () use ($app, $db, $pdo) {
    ////$pdo->exec('SET NAMES "utf8"');
    $stmt_log=$pdo->prepare("
        INSERT INTO t_is_prj(synergy_id, consultant_id,  name) VALUES (1,2,:name)");
    $test = $_POST["row"];
    
    /*
    INSERT INTO t_is_prj_details(
            cmpny_from_id, cmpny_to_id, flow_id, from_quantity, to_quantity, 
            is_prj_id)
    VALUES (?, ?, ?, ?, ?, 
            ?);
    */
    try { 
                $pdo->beginTransaction(); 
                
                $id =$stmt_log->execute(array(':name'=>$_POST["text"]));
                //echo json_encode(array("query1"=>$pdo->errorCode()));
                //echo json_encode(array("query1 info"=>$pdo->errorInfo()));
                $insertID = $pdo->lastInsertId("t_is_prj_id_seq");
                $arrayRows = json_decode(stripslashes($test), true);
                $insertValueStr="";
                foreach ($arrayRows as $row){
                        $arrExplode = explode(",", $row["id"]);
                        $insertValueStr.= "(".$arrExplode[0].",".$arrExplode[1].",".$arrExplode[2].",".$row["qntty1"].",".$row["qntty2"].",".$insertID."),";

                }
                $insertValueStr = rtrim($insertValueStr,",");
                //print_r($insertValueStr);
                /*print_r("INSERT INTO t_is_prj_details(
                                    cmpny_from_id, cmpny_to_id, flow_id, from_quantity, to_quantity, 
                                    is_prj_id)
                            VALUES ".$insertValueStr." ");*/
                $stmt_IS_detail=$pdo->prepare("INSERT INTO t_is_prj_details(
                                    cmpny_from_id, cmpny_to_id, flow_id, from_quantity, to_quantity, 
                                    is_prj_id)
                            VALUES ".$insertValueStr." ");
                $res = $stmt_IS_detail->execute();
                $pdo->commit();
                //$pdo->
                /*if($pdo->commit()){
                    echo json_encode(array("found"=>$pdo->errorCode()));
                } else {
                    echo json_encode(array("found"=>false));
                }*/
                echo json_encode(array("found"=>true));

            } catch(PDOException $e) { 
                $pdo->rollback(); 
                echo json_encode(array("notFound"=>true));
            } 
    
});


/**
 * zeynel dağlı
 * @since 04-12-2014
 */
$app->get("/ISScenarios", function () use ($app, $db, $pdo) {

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
                            syn.name AS syn_name
                        FROM t_is_prj as prj
                        INNER JOIN t_synergy AS syn ON prj.synergy_id = syn.id
                        ORDER BY  ".$sort." ".$order." LIMIT ".$limit." OFFSET ".$offset."  ")->fetchAll(PDO::FETCH_ASSOC);
    $res2 = $pdo->query(  "SELECT 
                            count(prj.id) as toplam
                            FROM t_is_prj as prj
                            INNER JOIN t_synergy AS syn ON prj.synergy_id = syn.id "  )->fetchAll(PDO::FETCH_ASSOC);
    $flows = array();
    foreach ($res as $flow){
        $flows[]  = array(
            "id" => $flow["prj_id"],
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
 * @since 11-09-2014
 */
$json_str=null;
$app->get("/columnflows_json_test", function () use ($app, $db, $pdo, $json_str) {
    //$pdo->exec('SET NAMES "utf8"');
    //$res = $pdo->query(  "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'ecoman_18_08' AND TABLE_NAME = 't_flow';"  )->fetchAll(PDO::FETCH_ASSOC);
    $res = $pdo->query(  "SELECT * FROM t_flow;"  )->fetchAll(PDO::FETCH_ASSOC);
    //$res2 = $pdo->query(  "SELECT * FROM t_flow_family;"  )->fetchAll(PDO::FETCH_ASSOC);
    $columnArray = array();
    $dataArray = array();
    $testArray = array();
    $dataArray[] =array('field'=>'company', 'title'=>'Company', 'width'=> 150, 'sortable'=>true);
    /*foreach ($res2 as $r){
        $columnArray['field'] = strtolower($r['name']);
        $columnArray['title'] = $r['name'];
        //$columnArray['field'] = 'test';
        //$columnArray['title'] = 'test';
        $columnArray['width'] = 80;
        $columnArray['sortable'] = true;
        $dataArray[] = $columnArray;
    }*/
    //$json_str.='[';
    foreach ($res as $r){
        //$columnArray['field'] = strtolower($r['name']);
        $columnArray['field'] = trim($r['name']);
        $columnArray['title'] = $r['name'];
        //$columnArray['field'] = 'test';
        //$columnArray['title'] = 'test';
        $columnArray['width'] = 80;
        $columnArray['sortable'] = true;
        /*$columnArray['styler'] = "function(value,row,index){
				if (value < 20){
					return 'background-color:#ffee00;color:red;';
					// the function can return predefined css class and inline style
					// return {class:'c1',style:'color:red'}
				}
			}";*/
        //$columnArray['colspan'] = 1;
        
        
        /*
        $testArray['field'] = 'test';
        $testArray['title'] = 'test title';
        $testArray['width'] = 80;
        $testArray['sortable'] = true;

         */

        $dataArray[] = $columnArray;

        /*
        $json_str.= '['.json_encode($columnArray).'],';
        $json_str.= '['.json_encode($testArray).'],';

         */
    }
    
    //{field:'opportunity',title:'Opportunity',width:80},
    
    //$pdo=null;
    $app->response()->header("Content-Type", "application/json");
    echo json_encode($dataArray);
    /*
    $json_str = rtrim($json_str, ',');
    $json_str.=']';
    echo $json_str;
     */
});


/**
 *  * zeynel dağlı
 * @since 11-09-2014
 */
$app->get("/flowsAndCompanies_json_test_MDF_manual", function () use ($app, $db, $pdo) {
    //$pdo->exec('SET NAMES "utf8"');
    //$res = $pdo->query(  "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'ecoman_18_08' AND TABLE_NAME = 't_flow';"  )->fetchAll(PDO::FETCH_ASSOC);
    /*if(isset($_GET['flows']) && $_GET['flows']!="" ) {
        $flows = json_decode($_GET['flows'], true);
        //print_r($flows);
        $flowsStr="";
        foreach ($flows as $key=>$value){
            $flowsStr.= $value.',';
        }
        $flowsStr = rtrim($flowsStr, ',');
    } */
    //echo $flowsStr;
    //echo "ggggg";
    if(isset($_GET['page']) && $_GET['page']!="" && isset($_GET['rows']) && $_GET['rows']!="") {
        $offset = ((intval($_GET['page'])-1)* intval($_GET['rows']));
        $limit = intval($_GET['rows']);
    } else {
        $limit = 10;
        $offset = 0;
    }
    
    $sortArr = array();
    $orderArr = array();
    if(isset($_GET['sort']) && $_GET['sort']!="") {
        $sort = trim($_GET['sort']);
        $sortArr = explode(",", $sort);
        //print_r($sortArr);
        if(count($sortArr)===1)$sort = trim($_GET['sort']);
    } else {
        //$sort = "id";
        $sort = "flow";
    }
    
    if(isset($_GET['order']) && $_GET['order']!="") {
        $order = trim($_GET['order']);
        $orderArr = explode(",", $order);
        //print_r($orderArr);
        if(count($orderArr)===1)$order = trim($_GET['order']);
    } else {
        //$order = "desc";
        $order = "ASC";
    }
    
    if(count($sortArr)===2 AND count($orderArr)===2) {
        $sort = $sortArr[0]. " ".$orderArr[0].", ";
        $order = $sortArr[1]. " ".$orderArr[1];
    } 
    
    if(isset($_GET['prj_id']) && $_GET['prj_id']!="" && $_GET['prj_id']!=-1) {
        $projectID = $_GET['prj_id'];
        $projectStr = '   cm.id IN ( SELECT cmpny_id FROM t_prj_cmpny WHERE prj_id = '.$projectID.'  )';
    } else {
        $projectID = '';
        $projectStr = '';
    }
    /*print_r("SELECT 
                            sm.cmpny_id as id,
                            cm.name as company,
                            f.name as flow,
                            sm.qntty as qntty,
                            u.name as unit,
                            sm.quality as quality,
                            ft.name as flowtype,
                            sm.cost as cost,
                            sm.cost_unit_id as cost_unit_id,
     *                      ffm.name as flow_family_name,
                            sm.availability as availability,
                            sm.quality as quality,
                            sm.output_location as output_location,
                            sm.substitute_potential as substitute_potential,
                            sm.description as description
                            FROM t_cmpny_flow sm
                            LEFT JOIN t_flow f on sm.flow_id = f.id
                            LEFT JOIN t_flow_family ffm on f.flow_family_id=ffm.id
                            LEFT JOIN t_unit u on sm.qntty_unit_id = u.id
                            LEFT JOIN t_flow_type ft  on sm.flow_type_id = ft.id
                            LEFT JOIN t_cmpny cm  on sm.cmpny_id= cm.id
                            WHERE 
                            ".$projectStr."
                            ORDER BY  ".$sort." ".$order." LIMIT ".$limit." OFFSET ".$offset."  ");*/
    //echo "----ggggg";
    $res = $pdo->query("SELECT 
                            sm.flow_type_id as flowtypeid,
                            sm.flow_id as flowid,
                            sm.cmpny_id as id,
                            cm.name as company,
                            f.name as flow,
                            sm.qntty as qntty,
                            u.name as unit,
                            sm.quality as quality,
                            ft.name as flowtype,
                            sm.cost as cost,
                            sm.cost_unit_id as cost_unit_id,
                            ffm.name as flow_family_name,
                            sm.availability as availability,
                            sm.quality as quality,
                            sm.output_location as output_location,
                            sm.substitute_potential as substitute_potential,
                            sm.description as description
                            FROM t_cmpny_flow sm
                            LEFT JOIN t_flow f on sm.flow_id = f.id
                            LEFT JOIN t_flow_family ffm on f.flow_family_id=ffm.id
                            LEFT JOIN t_unit u on sm.qntty_unit_id = u.id
                            LEFT JOIN t_flow_type ft  on sm.flow_type_id = ft.id
                            LEFT JOIN t_cmpny cm  on sm.cmpny_id= cm.id
                            WHERE  
                            ".$projectStr."
                            ORDER BY  ".$sort." ".$order." LIMIT ".$limit." OFFSET ".$offset."  ")->fetchAll(PDO::FETCH_ASSOC);
                            //ORDER BY  ".$order." ".$sort." LIMIT ".$offset.",".$limit."
    $res2 = $pdo->query(  "SELECT 
                            count(*) as toplam
                            FROM t_cmpny_flow sm
                            LEFT JOIN t_cmpny cm  on sm.cmpny_id= cm.id
                            WHERE 
                            ".$projectStr.";"  )->fetchAll(PDO::FETCH_ASSOC);
    $flows = array();
    foreach ($res as $flow){
        $flows[]  = array(
            "flowTypeID" => $flow["flowtypeid"],
            "flowID" => $flow["flowid"],
            "id" => $flow["id"],
            "company" => $flow["company"],
            "qntty" => $flow["qntty"],
            "unit" => $flow["unit"],
            "cost" => $flow["cost"],
            "cost_unit_id" => $flow["cost_unit_id"],
            "flow_family_name" => $flow["flow_family_name"],
            "quality" => $flow["quality"],
            "flowtype" => $flow["flowtype"],
            "flow" => strtolower($flow["flow"]),
        );
    }
    
    //{field:'opportunity',title:'Opportunity',width:80},
    
    //echo "----ggggg";
    //$app->response()->header("Content-Type", "application/json");
    
    $resultArray = array();
    $resultArray['total'] = $res2[0]['toplam'];
    $resultArray['rows'] = $flows;
    //print_r($resultArray);
    //print_r(json_encode($resultArray));
    echo json_encode($resultArray);
    
});
 


/**
 * zeynel dağlı
 * @since 11-09-2014
 */
$app->get("/flowsAndCompanies_json_test_manual", function () use ($app, $db, $pdo) {
    //$pdo->exec('SET NAMES "utf8"');
    //$res = $pdo->query(  "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'ecoman_18_08' AND TABLE_NAME = 't_flow';"  )->fetchAll(PDO::FETCH_ASSOC);
    if(isset($_GET['flows']) && $_GET['flows']!="" ) {
        $flows = json_decode($_GET['flows'], true);
        //print_r($flows);
        $flowsStr="";
        foreach ($flows as $key=>$value){
            $flowsStr.= $value.',';
        }
        $flowsStr = rtrim($flowsStr, ',');
    } 
    //echo $flowsStr;
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
        $sort = "id";
    }
    
    if(isset($_GET['order']) && $_GET['order']!="") {
        $order = trim($_GET['order']);
    } else {
        $order = "desc";
    }
    
    if(isset($_GET['prj_id']) && $_GET['prj_id']!="" && $_GET['prj_id']!=-1) {
        $projectID = $_GET['prj_id'];
        $projectStr = ' AND  cm.id IN ( SELECT cmpny_id FROM t_prj_cmpny WHERE prj_id = '.$projectID.'  )';
    } else {
        $projectID = '';
        $projectStr = '';
    }
    /*print_r("SELECT 
                            sm.cmpny_id as id,
                            cm.name as company,
                            f.name as flow,
                            sm.qntty as qntty,
                            u.name as unit,
                            sm.quality as quality,
                            ft.name as flowtype
                            FROM t_cmpny_flow sm
                            LEFT JOIN t_flow f on sm.flow_id = f.id
                            LEFT JOIN t_unit u on sm.qntty_unit_id = u.id
                            LEFT JOIN t_flow_type ft  on sm.flow_type_id = ft.id
                            LEFT JOIN t_cmpny cm  on sm.cmpny_id= cm.id
                            WHERE flow_id IN (".$flowsStr.")
                            ".$projectStr."
                            ORDER BY  ".$sort." ".$order." LIMIT ".$limit." OFFSET ".$offset."  ");*/
    $res = $pdo->query("SELECT 
                            sm.cmpny_id as id,
                            cm.name as company,
                            f.name as flow,
                            sm.qntty as qntty,
                            u.name as unit,
                            sm.quality as quality,
                            ft.name as flowtype
                            FROM t_cmpny_flow sm
                            LEFT JOIN t_flow f on sm.flow_id = f.id
                            LEFT JOIN t_unit u on sm.qntty_unit_id = u.id
                            LEFT JOIN t_flow_type ft  on sm.flow_type_id = ft.id
                            LEFT JOIN t_cmpny cm  on sm.cmpny_id= cm.id
                            WHERE flow_id IN (".$flowsStr.")
                            ".$projectStr."
                            ORDER BY  ".$sort." ".$order." LIMIT ".$limit." OFFSET ".$offset."  ")->fetchAll(PDO::FETCH_ASSOC);
                            //ORDER BY  ".$order." ".$sort." LIMIT ".$offset.",".$limit."
    $res2 = $pdo->query(  "SELECT 
                            count(*) as toplam
                            FROM t_cmpny_flow sm
                            LEFT JOIN t_cmpny cm  on sm.cmpny_id= cm.id
                            WHERE flow_id IN (".$flowsStr.")
                            ".$projectStr.";"  )->fetchAll(PDO::FETCH_ASSOC);
    $flows = array();
    foreach ($res as $flow){
        $flows[]  = array(
            "id" => $flow["id"],
            "company" => $flow["company"],
            "qntty" => $flow["qntty"],
            "unit" => $flow["unit"],
            "quality" => $flow["quality"],
            "flowtype" => $flow["flowtype"],
            "flow" => $flow["flow"],
        );
    }
    
    //{field:'opportunity',title:'Opportunity',width:80},
    
    
    //$app->response()->header("Content-Type", "application/json");
    
    $resultArray = array();
    $resultArray['total'] = $res2[0]['toplam'];
    $resultArray['rows'] = $flows;
    echo json_encode($resultArray);
    
});


/**
 * zeynel dağlı
 * @since 02-12-2014
 */
$app->get("/ISPotentialsNew_json_test", function () use ($app, $db, $pdo) {
    //$pdo->exec('SET NAMES "utf8"');
    //$res = $pdo->query(  "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'ecoman_18_08' AND TABLE_NAME = 't_flow';"  )->fetchAll(PDO::FETCH_ASSOC);
    
    if(isset($_GET['page']) && $_GET['page']!="" && isset($_GET['rows']) && $_GET['rows']!="") {
        if($_GET['page']>0) {
             $offset = ((intval($_GET['page'])-1)* intval($_GET['rows']));
             $limit = intval($_GET['rows']);
        } else {
            $limit = 10;
            $offset = 0;
        }
    } else {
        $limit = 10;
        $offset = 0;
    }
    
    if(isset($_GET['sort']) && $_GET['sort']!="") {
        $sort = trim($_GET['sort']);
    } else {
        $sort = "id";
    }
    
    if(isset($_GET['order']) && $_GET['order']!="") {
        $order = trim($_GET['order']);
    } else {
        $order = "desc";
    }
    $inputOutputSearch=null;
    if(isset($_GET['IS']) && $_GET['IS']!="") {
        $inputOutputMut = trim($_GET['IS']);
        switch ($inputOutputMut) {
            case 1:
                $inputOutputSearch = "and a.flow_type_id=1
                                      and b.flow_type_id=1";
                break;
            case 2:
                $inputOutputSearch = "and a.flow_type_id=2
                                      and b.flow_type_id=2";
                break;
            case 3:
                $inputOutputSearch = "and a.flow_type_id=1
                                      and b.flow_type_id=2";
                break;
            case 0:
                $inputOutputSearch = null;
                break;
            default:
                $inputOutputSearch = "and a.flow_type_id=1
                                      and b.flow_type_id=1";
                break;
        }
    } else {
        $inputOutputSearch = null;
    }
    
    if(isset($_GET["selectedFlows"]) && $_GET["selectedFlows"]!=null && isset($_GET["companies"]) && $_GET["companies"]!=null) {
        $flowStr = rtrim($_GET["selectedFlows"], ",");
        $companyStr = rtrim($_GET["companies"], ",");
     
    $res = $pdo->query('SELECT 
                            a.cmpny_id,
                            a.flow_id,

                            b.cmpny_id,
                             b.flow_id ,
                             f.name as flow,
                             a.cmpny_id as id, 
                            cc.name as company,
                            a.qntty as a_miktar,
                            ua.name as qnttyunit,
                            fta.name as fromflowtype,
                            dd.id as tocompanyid,
                            dd.name as gittigifirma,
                            b.qntty as b_miktar,
                            ub.name as qntty2unit,
                            ftb.name as toflowtype,

                            f.id as flowid
                            FROM t_cmpny_flow AS a
                            INNER JOIN t_cmpny_flow AS b on b.flow_id = a.flow_id
                            inner join  t_cmpny cc on cc.id = a.cmpny_id
                            inner join  t_cmpny dd on dd.id = b.cmpny_id
                            inner join  t_unit ua on a.qntty_unit_id = ua.id
                            inner join  t_unit ub on b.qntty_unit_id = ub.id
                            inner join  t_flow_type fta on a.flow_type_id = fta.id
                            inner join  t_flow_type ftb on b.flow_type_id = ftb.id
                            inner join  t_flow f on b.flow_id = f.id
                            --RIGHT JOIN t_cmpny_flow AS b on b.flow_id = a.flow_id
                            where a.cmpny_id in ('.$companyStr.') 
                            and b.flow_id  in ('.$flowStr.') 
                            and a.cmpny_id<>b.cmpny_id
                            '.$inputOutputSearch.'
                            order by a.cmpny_id, b.flow_id;')->fetchAll(PDO::FETCH_ASSOC);
         
         
         
    $companies = array();
    foreach ($res as $company){
        
        $companies[]  = array(
            "id" => $company["id"].",".$company["tocompanyid"].",".$company["flowid"],
            "company" => $company["company"],
            "tocompany" => $company["gittigifirma"],
            "fromflowtype" => $company["fromflowtype"],
            "toflowtype" => $company["toflowtype"],
            "flow" => $company["flow"],
            //"qntty" => $company["qntty"],
            "qntty" => $company["a_miktar"],
            //"qntty2" => $company["qntty2"],
            "qntty2" => $company["b_miktar"],
            "qntty2unit" => $company["qntty2unit"],
            "qnttyunit" => $company["qnttyunit"]
        );
    }
    
    //{field:'opportunity',title:'Opportunity',width:80},
    
    
    $app->response()->header("Content-Type", "application/json");
    
    $resultArray = array();
    $resultArray['total'] = count($res);
    $resultArray['rows'] = $companies;
    echo json_encode($resultArray);
    } else {
        $arraySonuc = array("notFound"=>true);
        echo json_encode($arraySonuc);
    }

});


/**
 * zeynel dağlı
 * @since 07-12-2014
 */
$app->get("/companyEquipmentTooltip_json_test", function () use ($app, $db, $pdo) {
    //$pdo->exec('SET NAMES "utf8"');
    //$res = $pdo->query(  "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'ecoman_18_08' AND TABLE_NAME = 't_flow';"  )->fetchAll(PDO::FETCH_ASSOC);
    if(isset($_GET['id']) && $_GET['id']!="" ) {
        $companyID = intval($_GET['id']);
    } 
        
    $res = $pdo->query("SELECT 
                            sm.id as id,
                            f.name as company,
                            eq.name as equipment_name,
                            u.name as equipment_type,
                            ft.attribute_name AS equipment_attr
                            FROM t_cmpny_eqpmnt AS sm
                            LEFT JOIN t_cmpny f on sm.cmpny_id = f.id
                            LEFT JOIN t_eqpmnt eq on sm.eqpmnt_id = eq.id
                            LEFT JOIN t_eqpmnt_type u on sm.eqpmnt_type_id = u.id
                            LEFT JOIN t_eqpmnt_type_attrbt ft  on sm.eqpmnt_type_attrbt_id = ft.id
                            WHERE sm.cmpny_id=".$companyID.";
 ")->fetchAll(PDO::FETCH_ASSOC);
                            //ORDER BY  ".$order." ".$sort." LIMIT ".$offset.",".$limit."
    
    $flows = array();
    $eqpmntStr = null;
    if(!empty($res) ) {
        $eqpmntStr.="<p  style=\"font-size:14px\">".$res[0]["company"]." Equipment List</p>";
        foreach ($res as $flow){
            $eqpmntStr.="<ul>";
            $flows[]  = array(
                "id" => $flow["id"],
                "equipment_name" => $flow["equipment_name"],
                "equipment_type" => $flow["equipment_type"]
            );
            $eqpmntStr.="<li>equipment->".$flow["equipment_name"]."-- type-->".$flow["equipment_type"]."-- Attr->".$flow["equipment_attr"]."</li>";
            $eqpmntStr.="</ul>";
        }
    } else {
        $eqpmntStr.="<ul>";
            
            $eqpmntStr.="<li>No Equipment</li>";
            $eqpmntStr.="</ul>";
    }
    
    
    //{field:'opportunity',title:'Opportunity',width:80},
    
    
    $app->response()->header("Content-Type", "application/html");
    
    $resultArray = array();
    //$resultArray['total'] = $res2[0]['toplam'];
    $resultArray['rows'] = $flows;
    //json_decode($_GET["selectedFlows"]);
    echo $eqpmntStr;
    //echo json_encode($resultArray);
    
});




$app->run();