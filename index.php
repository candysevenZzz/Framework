<?php
/**
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 */
define('BASE',__DIR__);
//核心文件目录
define('CORE',BASE.'/core');
//应用根目录
define('APP',BASE.'/app');
//模块名称
define('APP_MODULE','\app');
//debug调试模式
define('DEBUG',true);
if (DEBUG){
    ini_set('display_errors','On');
    ini_set('error_log','E:\\php_runtime\\'.date('Y-m-d').'_php_error.txt');
}else{
    ini_set('display_errors','Off');
}

//加载基础函数库
include CORE.'/common/function.php';
//启动框架
include CORE.'/start.php';
spl_autoload_register('\core\start::load');
\core\start::run();
