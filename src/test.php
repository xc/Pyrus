<?php
// this shows how it works
function __autoload($class)
{
    if (substr($class, 0, 4) != 'PEAR') return false;
    $path = explode('_', substr($class, 11)); // strip PEAR2_Pyrus for CVS
    $path = dirname(__FILE__) . implode('/', $path) . '.php';
    include $path;
}
include '/home/cellog/workspace/PEAR2/Exception/trunk/src/Exception.php';
include '/home/cellog/workspace/PEAR2/MultiErrors/trunk/src/MultiErrors.php';
include '/home/cellog/workspace/PEAR2/MultiErrors/trunk/src/MultiErrors/Exception.php';
define('OS_WINDOWS', false);
define('OS_UNIX', true);
//$g = new PEAR2_Pyrus_Config('C:/development/pear-core/testpear');
$g = new PEAR2_Pyrus_Config('/home/cellog/testpear');
$g->saveConfig();
//$a = new PEAR2_Pyrus_Package('C:/development/pear-core/PEAR-1.5.0a1.tgz');
$a = new PEAR2_Pyrus_Package('/home/cellog/workspace/pear-core/PEAR-1.6.2.tgz');
$b = new PEAR2_Pyrus_Installer;
$b->install($a);