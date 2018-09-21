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
require_once 'Proxy\AbstractProxy.php';
require_once 'Proxy\AbstractProxyHelper.php';
require_once 'Slim\SlimProxyClass.php';
require_once 'Ecoman\EcomanProxyHelper.php';

$proxyClass = new \Proxy\Slim\SlimProxyClass();
$ecoman = new \Proxy\Ecoman\EcomanProxyHelper($proxyClass);
$ecoman->setEndPointUrl('http://88.249.18.205:8090/slim2_ecoman/index.php/');
echo $ecoman->redirect();