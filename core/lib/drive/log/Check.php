<?php
namespace core\lib\drive\log;

class Check
{
    /**
     * @param $dir string 文件目录
     * 检查文件目录是否存在
     */
    static public function checkDir($dir)
    {
        if (!is_dir($dir))
        {
            mkdir($dir,'0777',true);
        }

    }
}
