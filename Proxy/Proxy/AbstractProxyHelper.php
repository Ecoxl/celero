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

namespace Proxy\Proxy;

/**
 * base abstract class for proxy helpers
 */
abstract class AbstractProxyHelper {
    protected $proxyClass;
    protected $endPointUrl;
    protected $endpointFunction ;
    protected $redirectMap;


    /**
     * set proxy class
     * @param \OAuth2\SlimProxyClass $proxyClass
     * @author Zeynel Dağlı 
     * @since 0.0.1
     */
    public function setProxyClass(\Proxy\Proxy\AbstractProxy $proxyClass) {
        $this->proxyClass = $proxyClass;
    }
    
    /**
     * return proxy class
     * @return \Proxy\Prox\AbstractProxy
     * @author Zeynel Dağlı 
     * @since 0.0.1
     */
    public function getProxyClass() {
        return $this->proxyClass;
    }
    
    /**
     * set Uri for request call
     * @param String $endPointUrl
     * @author Zeynel Dağlı 
     * @since 0.0.1
     */
    public function setEndPointUrl($endPointUrl) {
        $this->endPointUrl = $endPointUrl;
    }

    /**
     * get uri for request call
     * @return String | null
     * @author Zeynel Dağlı 
     * @since 0.0.1
     */
    public function getEndPointUrl() {
        return $this->endPointUrl;
    }
    
    /**
     * get map array for request calls and proxy helper function
     * @return array
     * @author Zeynel Dağlı 
     * @since 0.0.1
     */
    public function getRedirectMap() {
        return $this->redirectMap;
    }

    /**
     * set mapper for request call and proxy helper function
     * @param array $redirectMap
     * @author Zeynel Dağlı 
     * @since 0.0.1
     */
    public function setRedirectMap(Array $redirectMap=null) {
        $this->redirectMap = $redirectMap;
    }
    
    /**
     * get proxy helper function name form redirect map array
     * @return string proxy helper function
     * @author Zeynel Dağlı 
     * @since 0.0.1
     */
    protected function resolveRedirectMap() {
        $this->getEndPointFunction();
        return $this->redirectMap[$this->endpointFunction];
        
    }
    
    /**
     * set end point function for rest api
     * will be implemented in sub class
     * @author Zeynel Dağlı 
     * @since 0.0.1
     */
    abstract protected function setEndPointFunction($endpointFunction = '');
    
    /**
     * get end point function for rest api
     * will be implemented in sub class
     * @author Zeynel Dağlı 
     * @since 0.0.1
     */
    abstract protected function getEndPointFunction();
    
    /**
     * redirect method for proxy helper
     * will be implemented in sub class
     * @author Zeynel Dağlı 
     * @since 0.0.1
     */
    abstract public function redirect();
    
    /**
     * request params are getting ready for rest api call
     * will be implemented in sub class
     * @author Zeynel Dağlı 
     * @since 0.0.1
     */
    abstract protected function prepareGetParams(Array $paramsArray=null, Array $ignoreParamList=null);
    
    /**
     * add mapping object for rest api and proxy helper function rrelatin
     * will be implemented in sub class
     * @author Zeynel Dağlı 
     * @since 0.0.1
     */
    abstract public function addRedirectMapFunction(Array $redirectFunctionMapping=null);
    
    /**
     * to set endpoint function by any closure
     * @author Zeynel Dağlı 
     * @since 0.0.1
     */
    abstract public function setEndPointByClosure(Array $EndPointClosure=null);
}
