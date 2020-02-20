<?php
namespace core\lib\drive\log;

class Check
{
    static public function checkDir($dir)
    {
        if (!is_dir($dir))
        {
            mkdir($dir,'0777',true);
        }

    }
}
