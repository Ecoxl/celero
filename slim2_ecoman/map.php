<?php
// test commit for branch slim2
require 'vendor/autoload.php';
require "NotORM.php";

$app = new \Slim\Slim();

$app->get('/hello/:name', function ($name) {
    echo "Hello, $name";
});


try{
    $pdo = new PDO('pgsql:dbname=ecoman_01_10;host=celerodb;port=5432;user=postgres;password=');
    if($pdo){
        //echo "Connected to the database successfully!";
    }
}catch(PDOException $e){
    echo $e->getMessage();
}
$db = new NotORM($pdo);

/**
 * zeynel dağlı
 * @since 02-12-2014
 */
$app->get("/getProcess_map", function () use ($app, $db, $pdo) {
    //$pdo->exec('SET NAMES "utf8"');
    //$res = $pdo->query(  "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'ecoman_18_08' AND TABLE_NAME = 't_flow';"  )->fetchAll(PDO::FETCH_ASSOC);
    $sorguStr = null;
    if(isset($_GET['id']) && $_GET['id']!="" && isset($_GET['id']) && $_GET['id']!="") {
        $id = $_GET['id'];

        $sorguStr = "WHERE cmpny_id=".$id." ";
    }
   
    $res = $pdo->query('SELECT 
                            prs.name as process_name,
                            u1.name as min_rate_util_unit ,
                            u2.name as typ_rate_util_unit ,
                            u3.name as max_rate_util_unit ,
                            --c.id, 
                            c.cmpny_id as cmpny_id, 
                            c.prcss_id as prcss_id, 
                            --c.prcss_family_id, 
                            c.min_rate_util as min_rate_util, 
                            --c.min_rate_util_unit, 
                            c.typ_rate_util as typ_rate_util, 
                            --c.typ_rate_util_unit, 
                            c.max_rate_util as max_rate_util
                            --c.max_rate_util_unit
                          FROM t_cmpny_prcss c
                          INNER JOIN t_prcss prs ON c.prcss_id=prs.id
                          INNER JOIN t_unit u1 ON c.min_rate_util_unit=u1.id
                          INNER JOIN t_unit u2 ON c.typ_rate_util_unit=u2.id
                          INNER JOIN t_unit u3 ON c.max_rate_util_unit=u3.id
                            '.$sorguStr.'  ')->fetchAll(PDO::FETCH_ASSOC);
         
         
         
    $companies = array();
    foreach ($res as $company){
        
        $companies[]  = array(
            "id" => $company["prcss_id"],
            "process_name" => $company["process_name"],
            "min_rate_util" => $company["min_rate_util"],
            "min_rate_util_unit" => $company["min_rate_util_unit"],
            "typ_rate_util" => $company["typ_rate_util"],
            "typ_rate_util_unit" => $company["typ_rate_util_unit"],
            "max_rate_util" => $company["max_rate_util"],
            "max_rate_util_unit" => $company["max_rate_util_unit"]
        );
    }
    
    //{field:'opportunity',title:'Opportunity',width:80},
    
    
    $app->response()->header("Content-Type", "application/json");
    
    $resultArray = array();
    $resultArray['total'] = count($res);
    $resultArray['rows'] = $companies;
    echo json_encode($resultArray);
    

});


/**
 * zeynel dağlı
 * @since 02-12-2014
 */
$app->get("/getEquipment_map", function () use ($app, $db, $pdo) {
    //$pdo->exec('SET NAMES "utf8"');
    //$res = $pdo->query(  "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'ecoman_18_08' AND TABLE_NAME = 't_flow';"  )->fetchAll(PDO::FETCH_ASSOC);
    $sorguStr = null;
    if(isset($_GET['id']) && $_GET['id']!="" && isset($_GET['id']) && $_GET['id']!="") {
        $id = $_GET['id'];

        $sorguStr = "WHERE cq.cmpny_id=".$id." ";
    }
   
    $res = $pdo->query('SELECT 
                    DISTINCT ON(cq.cmpny_id,cq.eqpmnt_id,eqpmnt_type_id)
                    cq.cmpny_id as cmpny_id,
                    cq.eqpmnt_id as eqpmnt_id,
                    eq.name as equipment_name,
                    eqt.name as equipment_type_name,
                    cq.id as cmpny_eqpmnt_id, 
                    cq.eqpmnt_type_id as eqpmnt_type_id, 
                    cq.eqpmnt_type_attrbt_id as eqpmnt_type_attrbt_id, 
                    cq.eqpmnt_attrbt_val as eqpmnt_attrbt_val,
                     cq.eqpmnt_attrbt_unit as eqpmnt_attrbt_unit
                      FROM t_cmpny_eqpmnt cq
                      INNER JOIN t_eqpmnt eq ON cq.eqpmnt_id=eq.id
                      INNER JOIN t_eqpmnt_type eqt ON cq.eqpmnt_type_id=eqt.id
                        '.$sorguStr.'  ')->fetchAll(PDO::FETCH_ASSOC);
         
         
         
    $companies = array();
    foreach ($res as $company){
        
        $companies[]  = array(
            "id" => $company["eqpmnt_id"],
            "equipment_name" => $company["equipment_name"],
            "equipment_type_name" => $company["equipment_type_name"],
            
        );
    }
    
    //{field:'opportunity',title:'Opportunity',width:80},
    
    
    $app->response()->header("Content-Type", "application/json");
    
    $resultArray = array();
    $resultArray['total'] = count($res);
    $resultArray['rows'] = $companies;
    echo json_encode($resultArray);
    

});


/**
 * zeynel dağlı
 * @since 01-09-2015
 */
$app->get("/getEcotracking_map", function () use ($app, $db, $pdo) {
    
    $sorguStr = null;
    if(isset($_GET['id']) && $_GET['id']!="" && isset($_GET['id']) && $_GET['id']!="") {
        $id = $_GET['id'];

        $sorguStr = "WHERE ect.company_id=".$id." ";
    }
   
    $res = $pdo->query('SELECT 
					  ect.id as id,
                      powera,
					  powerb,
					  powerc,
					  date,
					  cm.name as company_name
                      FROM t_ecotracking  ect
                      INNER JOIN t_cmpny cm ON ect.company_id=cm.id
                        '.$sorguStr.'  ')->fetchAll(PDO::FETCH_ASSOC);
         
         
         
    $companies = array();
    foreach ($res as $company){
        
        $companies[]  = array(
            "id" => $company["id"],
            "powera" => $company["powera"],
			"powerb" => $company["powerb"],
			"powerc" => $company["powerc"],
            "date" => $company["date"],
            "company_name" => $company["company_name"],
        );
    }
    
    //{field:'opportunity',title:'Opportunity',width:80},
    
    
    $app->response()->header("Content-Type", "application/json");
    
    $resultArray = array();
    $resultArray['total'] = count($res);
    $resultArray['rows'] = $companies;
    echo json_encode($resultArray);
    

});


$app->run();