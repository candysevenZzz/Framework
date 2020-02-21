<?php
namespace core;
use core\lib\Config;
use core\lib\Log;
use Exception;
use core\lib\Route;

/**
 * Class start
 * 框架启动类
 * @package core
 */
class Start{
    /**
     * 加载类名数组
     * @var static array
     *
     */
    static $classMap =array();
    /**
     * @var Config
     */
    private $config;

    protected function __construct()
    {
        $this->config = new Config(CONFIG_DIR);
    }

    /**
     * 启动核心方法
     * @throws Exception
     */
    static public function run()
    {

        //是否开启调试模式
        if (DEBUG){
            //使用错误调试模板
            $whoops = new \Whoops\Run;
            $title = '框架出错啦';
            $option = new \Whoops\Handler\PrettyPageHandler();
            $option->setPageTitle($title);
            $whoops->pushHandler($option);
            $whoops->register();

            ini_set('display_errors','On');
            ini_set('error_log','E:\\php_runtime\\'.date('Y-m-d').'_php_error.txt');
        }else{
            ini_set('display_errors','Off');
        }

        //获取路由对象
        $route =new Route();
        $controller = $route->controller;
        $controller = ucfirst(strtolower($controller)).'Controller';
        $action = $route->action;
        unset($route);

        $conFile =APP.'/controller/'.$controller.'.php';
        //拼接对应的控制器类名
        $className = APP_MODULE.'\\controller\\'.$controller;
        if (is_file($conFile))
        {
            include $conFile;
            unset($conFile);
            $controllerObj = new $className;
            unset($className);
            $controllerObj->$action();
            //Todo

        }else{
            throw new Exception('Can\'t fond this controller:'.$controller);
        }

        //启动日志类
        Log::init();
    }

    /**
     * 自动加载类-实现机制
     * @param $class string 类名
     * @return bool
     */
    static public function load($class)
    {
        if (isset(self::$classMap[$class]))
        {
            return true;
        }else{
            $class = str_replace('\\','/',$class);
            $file = BASE.'/'.$class.'.php';
            if (is_file($file))
            {
                include $file;
                self::$classMap[$class]=$class;
            }else{
                return false;
            }
        }
    }

}
