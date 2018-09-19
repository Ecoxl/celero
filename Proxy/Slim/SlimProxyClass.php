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

namespace Proxy\Slim;

/**
 * proxy class implements abstract proxy
 */
class SlimProxyClass extends \Proxy\Proxy\AbstractProxy {

    private $requestType;
    private $curlObj;
    
    /**
     * constructor
     */
    public function __construct() {

    }

}
