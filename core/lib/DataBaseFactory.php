<?php
namespace core\lib;

use core\lib\database\PDO;
use core\lib\database\Proxy;
use core\lib\pattern\RegisterPattern;

/**
 * Class DataBaseFactory
 * @package core\lib
 * 代理类
 * 针对主从分离的数据库环境
 */
class DataBaseFactory
{
    /**
     * @var $proxy null/Proxy
     * 代理类对象
     */
    static $proxy = null;

    /**
     * @param string $id = 'proxy','mater','slave'
     * @return Proxy|null
     */
    static public function getDatabase($id = 'proxy')
    {
        $id = strtolower($id);
        if ($id === 'proxy')
        {
            if (!self::$proxy)
            {
                self::$proxy = new Proxy();
            }
            return self::$proxy;
        }

        if ($id === 'master')
        {
            //获取配置文件数组
            $db_conf = Application::getInstance()->config['database'][$id];

        }

        if ($id === 'slave')
        {
            $slaves = Application::getInstance()->config['database']['slave'];
            $db_conf = $slaves[array_rand($slaves)];

        }

        //将数据库连接信息保存进注册树中
        $key = 'database_'.$id;
        $db = RegisterPattern::get($key);

        if (!$db)
        {
            $db = new PDO();
            $db->connect($db_conf['host'],$db_conf['dbname'],$db_conf['user'],$db_conf['password']);
            RegisterPattern::set($key,$db);
        }
        return $db;

    }

}
