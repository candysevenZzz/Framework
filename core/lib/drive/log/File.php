<?php
namespace core\lib\drive\log;
use core\lib\Application;
use core\lib\Config;

class File extends Check
{
    /**
     * @var string 日志存储目录
     */
    static public $path;

    public function __construct()
    {
        self::$path = Config::get('option','log')['path'];
    }

    public static function log($meesage, $filename = 'log')
    {
        $instance = new self();

        $log_dir = $instance::$path;
        $runtime_dir = substr($log_dir,0,strpos($log_dir, 'runtime/')+8);

        //检查文件路径是否存在
        parent::checkDir($runtime_dir);
        parent::checkDir($log_dir);

        $data = $meesage.date('YmdHis');
        p($log_dir);

        $filename = date('Y-m-d');
        p($filename);
        file_put_contents($log_dir.$filename,json_encode($data));





    }

}
