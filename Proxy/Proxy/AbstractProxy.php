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
 * abstract base class for proxy wrappers
 */
abstract class AbstractProxy{
    private $requestType;
    private $requestParams;
    private $proxyHelperObj;
    
    /**
     * get request type
     * @return string request type
     * @author Zeynel Dağlı 
     * @version 0.0.1
     */
    protected function getRequestType() {
        isset($this->requestType) ? true : $this->setRequestType() ;
        return $this->requestType;
    }
    
    /**
     * set request type
     * @author Zeynel Dağlı
     * @version 0.0.1
     */
    protected function setRequestType() {
        $this->requestType = $_SERVER['REQUEST_METHOD'];
    }

    /**
     * set request parameters due to request type
     * @author Zeynel Dağlı
     * @since 0.0.1
     */
    public function setRequestParams () {
        switch (strtolower(trim($this->getRequestType()))) {
            case 'get':
                $this->requestParams = $_GET;
                break;
            case 'post':
                $this->requestParams = $_POST;
                break;
            default:
                break;
        }
    }
    
    /**
     * get request parameters set due to request type
     * @return array | null
     * @author Zeynel Dağlı 
     * @version 0.0.1
     */
    public function getRequestParams() {
        $this->requestParams==null ? $this->setRequestParams() : true ;
        return $this->requestParams;
    }
    
    /**
     * set proxy helper class
     * @param \Proxy\Proxy\AbstractProxyHelper $proxyHelper
     * @author Zeynel Dağlı 
     * @version 0.0.1
     */
    protected function setProxyHelper(\Proxy\Proxy\AbstractProxyHelper $proxyHelper) {
        $this->proxyHelperObj = $proxyHelper;
    }
    
    /**
     * get proxy helper class
     * @return \Proxy\Proxy\AbstractProxyHelper
     * @author Zeynel Dağlı 
     * @version 0.0.1
     */
    protected function getProxyHelper() {
        return $this->proxyHelperObj;
    }
}
