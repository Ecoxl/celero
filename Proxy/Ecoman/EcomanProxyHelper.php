<?php
/**
 * ECOMAN Rest Api Proxy Library
 *
 * @link      https://github.com/Leadera/ecoman_slim/tree/ecoman_proxy for the canonical source repository
 * @copyright Copyright (c) 2014 - 2015 
 * @license   https://github.com/Leadera/ecoman_slim/blob/slim2/LICENSE
 * @author Zeynel Dağlı
 * @version 0.0.1
 */

namespace Proxy\Ecoman;

/**
 * Wrapper for Ecoman rest Api to make 
 * proxy calls
 */
class EcomanProxyHelper extends \Proxy\Proxy\AbstractProxyHelper {
    
    /**
     * a mapping array for related functions and proxy calls
     * to be executed
     * @var array()
     */
    protected $redirectMap = array('flows'=>'getFlows', 
                                    'columnflows_json_test'=>'getColumnFlows',
                                    'companies_json_test2'=>'getCompanies',
                                    'flowsAndCompanies_json_test'=>'getFlowsAndCompanies',
                                    'flowCompanies_json_test'=>'getFlowCompanies',
                                    'companyFlows_json_test'=>'getCompanyFlows',
                                    'ISScenarios'=>'getISScenarios',
                                    'ISPotentialsNew_json_test'=>'getISPotentialsNew',
                                    'ISPotentialsNew_json_test_by_project'=>'getISPotentialsNewByProject',
                                    'ISPotentialsNew_json_test_by_project_prj' => 'getRestApiDefaultCall',
                                    'companies_json_test2_prj' =>  'getRestApiDefaultCall',
                                    'companies_json_test2_manual' =>  'getRestApiDefaultCall',
                                    'companyFlows_json_test_manual' => 'getRestApiDefaultCall',
                                    'flowCompanies_json_test_manual' => 'getRestApiDefaultCall',
                                    'flowsAndCompanies_json_test_manual' => 'getRestApiDefaultCall',
                                    'flowsAndCompanies_json_test_MDF_manual'=>'getRestApiDefaultCall',
                                    'getFlowDetails_prj'=>'getRestApiDefaultCall',
                                    'getFlowDetailsMan_prj'=>'getRestApiDefaultCall',
                                    'deleteScenario_scn'=>'getRestApiDefaultCall',
                                    'updateScenario_scn'=>'getRestApiDefaultCall',
                                    'getScenarioDetails_scn'=>'getRestApiDefaultCall',
                                    'getUnitsAll_scn' => 'getRestApiDefaultCall',
                                    'getScanarioStatus_scn' => 'getRestApiDefaultCall',
                                    'ISScenariosCns_scn' => 'getRestApiDefaultCall',
                                    'getScenarioDetailsCns_scn' => 'getRestApiDefaultCall',
                                    'getEquipment_map' => 'getRestApiDefaultCall',
                                    'getProcess_map' => 'getRestApiDefaultCall',
                                    'getFlowDetailsCns_prj' => 'getRestApiDefaultCall');

    /**
     * constructor       
     * @param \Proxy\Proxy\AbstractProxy $proxyClass
     */
    public function __construct(\Proxy\Proxy\AbstractProxy $proxyClass) {
        $this->setProxyClass($proxyClass);
    }
    
    /**
     * set end point function for rest api
     * framework
     * @param string $endpointFunction
     * @author Zeynel Dağlı
     * @version 0.0.1
     */
    protected function setEndPointFunction($endpointFunction = '') {
        $requestParams = $this->getProxyClass()->getRequestParams();
        //print_r($requestParams);
        $this->endpointFunction = $requestParams['url'];
    }
    
    /**
     * get end point function for rest api framework
     * @return string
     * @author Zeynel Dağlı
     * @version 0.0.1
     */
    protected function getEndPointFunction(){ 
        $this->endpointFunction == null ? $this->setEndPointFunction() : true ;
        return $this->endpointFunction;
    }
    
    
    /**
     * setting redirection process for rest api
     * @author Zeynel Dağlı
     * @version 0.0.1
     */
    public function redirect() {
        $execFunction = $this->resolveRedirectMap();
        $this->setEndPointByClosure();
        echo $this->$execFunction();
    }
    
    public function setEndPointByClosure(Array $EndPointClosure=null) {
        $endPointFunction = $this->getEndPointFunction();
        if (stripos($endPointFunction, "prj")>0) {
            $this->setEndPointUrl("http://localhost:80/slim2_ecoman/prj.php/");
        }
        
        if (stripos($endPointFunction, "manual")>0) {  
            $this->setEndPointUrl("http://localhost:80/slim2_ecoman/manual.php/");
        }
        
        if (stripos($endPointFunction, "scn")>0) {  
            $this->setEndPointUrl("http://localhost:80/slim2_ecoman/scenarios.php/");
        }
        if (stripos($endPointFunction, "_map")>0) {  
            $this->setEndPointUrl("http://localhost:80/slim2_ecoman/map.php/");
        }
    }
    
    /**
     * get IS potentials by rest api call
     * @return string JSON
     * @author Zeynel Dağlı 02-02-2015
     * @version 0.0.1
     */
    private function getRestApiDefaultCall() {
        $params = null;
        $params = $this->proxyClass->getRequestParams();
        $preparedParams = $this->prepareGetParams();
        if (($ch = @curl_init()) == false) {
            header("HTTP/1.1 500", true, 500);
            die("Cannot initialize CURL session. Is CURL enabled for your PHP installation?");
        }
        //print_r($this->endPointUrl.$this->getEndPointFunction().'?'.$preparedParams);
        curl_setopt($ch, CURLOPT_URL, $this->endPointUrl.$this->getEndPointFunction().'?'.$preparedParams ); //Url together with parameters
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Return data instead printing directly in Browser
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT , 60); //Timeout after 7 seconds
        curl_setopt($ch, CURLOPT_HEADER, 0); // we don’t want also to get the header information that we receive.
 
        $response = curl_exec($ch);
        if ($response == false) {
            die("curl_exec() failed. Error: " . curl_error($ch). curl_errno($ch));
        }
 
        return $response;
        
    }

    /**
     * get IS potentials by rest api call
     * @return string JSON
     * @author Zeynel Dağlı
     * @version 0.0.1
     */
    public function getISPotentialsNewByProject() {
        $params = null;
        $params = $this->proxyClass->getRequestParams();
        $preparedParams = $this->prepareGetParams();
        if (($ch = @curl_init()) == false) {
            header("HTTP/1.1 500", true, 500);
            die("Cannot initialize cUrl session. Is cUrl enabled for your PHP installation?");
        }
        //print_r($this->endPointUrl.$this->getEndPointFunction().'?'.$preparedParams);
        curl_setopt($ch, CURLOPT_URL, $this->endPointUrl.$this->getEndPointFunction().'?'.$preparedParams ); //Url together with parameters
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Return data instead printing directly in Browser
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT , 7); //Timeout after 7 seconds
        curl_setopt($ch, CURLOPT_HEADER, 0); // we don’t want also to get the header information that we receive.
 
        $response = curl_exec($ch);
        if ($response == false) {
            die("curl_exec() failed. Error: " . curl_error($ch));
        }
 
        return $response;
    }
    
    /**
     * get IS potentials by rest api call
     * @return string JSON
     * @author Zeynel Dağlı
     * @version 0.0.1
     */
    public function getISPotentialsNew() {
        $params = null;
        $params = $this->proxyClass->getRequestParams();
        $preparedParams = $this->prepareGetParams();
        if (($ch = @curl_init()) == false) {
            header("HTTP/1.1 500", true, 500);
            die("Cannot initialize cUrl session. Is cUrl enabled for your PHP installation?");
        }
        curl_setopt($ch, CURLOPT_URL, $this->endPointUrl.$this->getEndPointFunction().'?'.$preparedParams ); //Url together with parameters
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Return data instead printing directly in Browser
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT , 7); //Timeout after 7 seconds
        curl_setopt($ch, CURLOPT_HEADER, 0); // we don’t want also to get the header information that we receive.
 
        $response = curl_exec($ch);
        if ($response == false) {
            die("curl_exec() failed. Error: " . curl_error($ch));
        }
 
        return $response;
    }
    
    /**
     * get IS scenarios by rest api call
     * @return string JSON
     * @author Zeynel Dağlı
     * @version 0.0.1
     */
    public function getISScenarios() {
        $params = null;
        $params = $this->proxyClass->getRequestParams();
        $preparedParams = $this->prepareGetParams();
        if (($ch = @curl_init()) == false) {
            header("HTTP/1.1 500", true, 500);
            die("Cannot initialize cUrl session. Is cUrl enabled for your PHP installation?");
        }
        curl_setopt($ch, CURLOPT_URL, $this->endPointUrl.$this->getEndPointFunction().'?'.$preparedParams ); //Url together with parameters
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Return data instead printing directly in Browser
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT , 7); //Timeout after 7 seconds
        curl_setopt($ch, CURLOPT_HEADER, 0); // we don’t want also to get the header information that we receive.
 
        $response = curl_exec($ch);
        if ($response == false) {
            die("curl_exec() failed. Error: " . curl_error($ch));
        }
 
        return $response;
    }

    /**
     * get companies flows by rest api call
     * @return string JSON
     * @author Zeynel Dağlı
     * @version 0.0.1
     */
    public function getCompanyFlows() {
        $params = null;
        $params = $this->proxyClass->getRequestParams();
        $preparedParams = $this->prepareGetParams();
        if (($ch = @curl_init()) == false) {
            header("HTTP/1.1 500", true, 500);
            die("Cannot initialize cUrl session. Is cUrl enabled for your PHP installation?");
        }
        curl_setopt($ch, CURLOPT_URL, $this->endPointUrl.$this->getEndPointFunction().'?'.$preparedParams ); //Url together with parameters
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Return data instead printing directly in Browser
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT , 7); //Timeout after 7 seconds
        curl_setopt($ch, CURLOPT_HEADER, 0); // we don’t want also to get the header information that we receive.
 
        $response = curl_exec($ch);
        if ($response == false) {
            die("curl_exec() failed. Error: " . curl_error($ch));
        }
 
        return $response;
    }

    /**
     * get flows and companies using this flows 
     * by rest api call
     * @return string JSON
     * @author Zeynel Dağlı
     * @version 0.0.1
     */
    public function getFlowCompanies() {
        $params = null;
        $params = $this->proxyClass->getRequestParams();
        $preparedParams = $this->prepareGetParams();
        if (($ch = @curl_init()) == false) {
            header("HTTP/1.1 500", true, 500);
            die("Cannot initialize cUrl session. Is cUrl enabled for your PHP installation?");
        }
        curl_setopt($ch, CURLOPT_URL, $this->endPointUrl.$this->getEndPointFunction().'?'.$preparedParams ); //Url together with parameters
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Return data instead printing directly in Browser
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT , 7); //Timeout after 7 seconds
        curl_setopt($ch, CURLOPT_HEADER, 0); // we don’t want also to get the header information that we receive.
 
        $response = curl_exec($ch);
        if ($response == false) {
            die("curl_exec() failed. Error: " . curl_error($ch));
        }
 
        return $response;
    }

    /**
     * get flows and all flows related caompanies flows all together
     * by rest api call
     * @return string JSON
     * @author Zeynel Dağlı
     * @version 0.0.1
     */
    public function getFlowsAndCompanies() {
        $params = null;
        $params = $this->proxyClass->getRequestParams();
        $preparedParams = $this->prepareGetParams();
        if (($ch = @curl_init()) == false) {
            header("HTTP/1.1 500", true, 500);
            die("Cannot initialize cUrl session. Is cUrl enabled for your PHP installation?");
        }
        curl_setopt($ch, CURLOPT_URL, $this->endPointUrl.$this->getEndPointFunction().'?'.$preparedParams ); //Url together with parameters
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Return data instead printing directly in Browser
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT , 7); //Timeout after 7 seconds
        curl_setopt($ch, CURLOPT_HEADER, 0); // we don’t want also to get the header information that we receive.
 
        $response = curl_exec($ch);
        if ($response == false) {
            die("curl_exec() failed. Error: " . curl_error($ch));
        }
 
        return $response;
    }
    
    /**
     * get companies by rest api call
     * @return string JSON
     * @author Zeynel Dağlı
     * @version 0.0.1
     */
    public function getCompanies() {
        $params = null;
        $params = $this->proxyClass->getRequestParams();
        $preparedParams = $this->prepareGetParams();
        if (($ch = @curl_init()) == false) {
            header("HTTP/1.1 500", true, 500);
            die("Cannot initialize cUrl session. Is cUrl enabled for your PHP installation?");
        }
        curl_setopt($ch, CURLOPT_URL, $this->endPointUrl.$this->getEndPointFunction().'?'.$preparedParams ); //Url together with parameters
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Return data instead printing directly in Browser
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT , 7); //Timeout after 7 seconds
        curl_setopt($ch, CURLOPT_HEADER, 0); // we don’t want also to get the header information that we receive.
 
        $response = curl_exec($ch);
        if ($response == false) {
            die("curl_exec() failed. Error: " . curl_error($ch));
        }
 
        //Parse JSON return object.
        return $response;
    }

    /**
     * get flows to layout on 
     * data grid columns in interface 
     * by rest api call
     * @return string JSON
     * @author Zeynel Dağlı
     * @version 0.0.1
     */
    public function getColumnFlows() {
        $params = null;
        $params = $this->proxyClass->getRequestParams();
        $preparedParams = $this->prepareGetParams();
        if (($ch = @curl_init()) == false) {
            header("HTTP/1.1 500", true, 500);
            die("Cannot initialize cUrl session. Is cUrl enabled for your PHP installation?");
        }
        curl_setopt($ch, CURLOPT_URL, $this->endPointUrl.$this->getEndPointFunction().'?'.$preparedParams ); //Url together with parameters
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Return data instead printing directly in Browser
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT , 7); //Timeout after 7 seconds
        curl_setopt($ch, CURLOPT_HEADER, 0); // we don’t want also to get the header information that we receive.

 
        $response = curl_exec($ch);
        if ($response == false) {
            die("curl_exec() failed. Error: " . curl_error($ch));
        }
 
        return $response;
    }
    
    /**
     * get flows data by rest api call
     * @return string JSON
     * @author Zeynel Dağlı
     * @version 0.0.1
     */
    public function getFlows() {

        $params = null;
        $params = $this->proxyClass->getRequestParams();
        $preparedParams = $this->prepareGetParams();
        //$params = urlencode($params);
        //echo $params;
        //print_r($params);
        if (($ch = @curl_init()) == false) {
            header("HTTP/1.1 500", true, 500);
            die("Cannot initialize cUrl session. Is cUrl enabled for your PHP installation?");
        }
        curl_setopt($ch, CURLOPT_URL, $this->endPointUrl.$this->getEndPointFunction().'?'.$preparedParams ); //Url together with parameters
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Return data instead printing directly in Browser
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT , 7); //Timeout after 7 seconds
        //curl_setopt($ch, CURLOPT_USERAGENT , "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
        curl_setopt($ch, CURLOPT_HEADER, 0); // we don’t want also to get the header information that we receive.
        
        
        $client_id = 'rerwrrwre';
        $client_secret = 'ggggg';
        // Add client ID and client secret to the headers.
        curl_setopt($ch, CURLOPT_HTTPHEADER, array (
            "Authorization: Basic " . base64_encode($client_id . ":" . $client_secret),
        ));       
 
        // Assemble POST parameters for the request.
        //$post_fields = "code=" . urlencode($auth_code) . "&grant_type=authorization_code";
 
        // Obtain and return the access token from the response.
        //curl_setopt($r, CURLOPT_URI, true);
        //curl_setopt($r, CURLOPT_POSTFIELDS, $post_fields);
 
        $response = curl_exec($ch);
        if ($response == false) {
            die("curl_exec() failed. Error: " . curl_error($ch));
        }
 
        //Parse JSON return object.
        return $response;
    }
    
    /**
     * prepare CURL 'GET' request parameters
     * @param array $paramsArray 'GET' request içerisinde HTTP üzrinden gelen değişkenler
     * @param array $ignoreParamList Parameter olarak derlenmesini istemediğimiz değişken adları
     * @return string | null
     * @author Zeynel Dağlı
     * @version 0.0.1
     */
    protected function prepareGetParams(Array $paramsArray=null, Array $ignoreParamList=null ) {
        $params = null;
        $paramsArray = $this->proxyClass->getRequestParams();
        if(!empty($ignoreParamList)) {
            foreach($paramsArray as $key=>$value) {
               if(!in_array ($key, $ignoreParamList)) {
                    $params .= $key.'='.urlencode ($value).'&';
                }  
            }         
        } else {
             foreach($paramsArray as $key=>$value) {
                 $params .= $key.'='.urlencode ($value).'&';
            }
        }
        $params = trim($params, '&');
        return $params;
    }
    
    /**
     * this implementation will be implemented
     * in next versions
     * @param array $redirectFunctionMapping
     * @author Zeynel Dağlı
     * @version 0.0.1
     */
    public function addRedirectMapFunction(array $redirectFunctionMapping = null) {
        
    }
}
