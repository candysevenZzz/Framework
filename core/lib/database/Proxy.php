<?php
namespace core\lib\database;

use core\lib\DataBaseFactory;

class Proxy
{
    public function query($sql)
    {
        //判断sql是否为select语句，查询使用从库，写入使用主库
        if (strtolower(substr($sql,0,6)) === 'select')
        {
           return DataBaseFactory::getDatabase('slave')->query($sql);

        }else{
            return DataBaseFactory::getDatabase('master')->query($sql);

        }

    }

}
