<?php
namespace core\lib\drive\log;

use core\lib\Config;

class File extends Check
{
    /**
     * @var string 日志存储目录
     */
    static public $path;

    public function __construct($type = 'log')
    {
        self::$path = Config::get('path','log')[$type];
    }

    /**
     * @param $message string 日志信息
     * @return false|int
     */
    public static function log($message)
    {
        $instance = new self();

        $log_dir = $instance::$path;
        $runtime_dir = substr($log_dir,0,strpos($log_dir, 'runtime/')+8);

        //检查文件路径是否存在
        parent::checkDir($runtime_dir);
        parent::checkDir($log_dir);

        $data = '['.date('Y-m-d H:i:s').']  '.$message.PHP_EOL;

        $filename = date('Y-m-d');
        // todo 重写一个文件写入函数
        return file_put_contents($log_dir.$filename,$data,FILE_APPEND);

    }


}
