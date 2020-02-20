<?php
namespace core\lib;

use core\lib\pattern\RegisterPattern;
use \PDO as PDO;

/**
 * Class Model
 * @package core\lib
 * 模型基类
 */
class Model extends PDO
{
    public function __construct()
    {
        $config = Application::getInstance()->config['database']['master'];
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']}";
        try {
            parent::__construct($dsn, $config['user'], $config['password']);

        }catch (\PDOException $e){
            p($e->getMessage());
        }

    }

    /**
     * 添加数据方法
     */
    public function save()
    {
        //todo
        return $this;
    }

    /**
     * 查询数据方法
     */
    public function select()
    {
        //todo
        return $this;
    }

    /**
     * 删除数据方法
     */
    public function delete()
    {
        //todo
        return $this;
    }

    /**
     * 更新数据方法
     */
    public function update()
    {
        //todo
        return $this;
    }


}
