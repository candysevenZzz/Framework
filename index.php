<?php
/**
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 */
//设置时区
ini_set('date.timezone','Asia/Shanghai');
//根目录
define('BASE',__DIR__);
//核心文件目录
define('CORE',BASE.'/core');
//应用根目录
define('APP',BASE.'/app');
//模块名称
define('APP_MODULE','\app');
//配置文件目录
define('CONFIG_DIR',BASE.'/configs');
//debug调试模式
define('DEBUG',true);

//引入composer自动加载
include BASE.'/vendor/autoload.php';
//引入基础函数库
include CORE.'/common/function.php';

//引入启动文件
require CORE . '/Start.php';

spl_autoload_register('\core\Start::load');

//启动框架
\core\Start::run();
