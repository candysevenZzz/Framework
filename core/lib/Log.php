<?php
namespace core\lib;
use core\lib\drive\log\Error;
use core\lib\drive\log\File;

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

    static public function __callStatic($name, $arguments)
    {
        $name = strtolower($name);

        //日志这块做得有点low 本来是想弄成可以选择存储介质和不同的日志(错误)状态的  没弄出来.... 想弄成TP那种 我还有点够呛...
        if($name === 'log')
        {
            File::log($arguments[0]);
        }elseif ($name === 'error')
        {
            Error::log($arguments[0]);
        }else{
            throw new \Exception('Not have this driver: '.ucfirst($name).'.php');
        }
    }
}
