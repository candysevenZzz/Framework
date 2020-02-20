<?php
namespace core\lib;
class Log
{
    private static $class;

    static public function init()
    {
        //获取配置中的日志驱动
        $drive = Config::get('drive','log');
        $class = 'core\\lib\\drive\\log\\'.ucfirst(strtolower($drive));
        self::$class = new $class();
    }

    static public function log($name)
    {
        $class = self::$class;
        $class::log($name);
    }
}
