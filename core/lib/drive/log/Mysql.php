<?php
namespace core\lib\drive\log;
use core\lib\Config;

class Mysql extends Check
{

    /**
     * @var string 日志存储目录
     */
    public $path;
    public function __construct()
    {
        $this->path = Config::get('option','log')['path'];

    }

    static public function log($name)
    {
        // TODO: Implement write() method.
    }

}
