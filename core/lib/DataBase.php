<?php
namespace core\lib;

class DataBase
{
    /**
     * @var $sb
     * 数据库连接对象
     */
    static private $db;
    private function __construct(){}

    /**
     * @return object DataBase
     * 获取数据库连接对象实例
     */
    static public function getInstance()
    {
        if (empty(self::$db))
        {
            self::$db = new self();
        }
        return self::$db;
    }

    public function where($where)
    {
        return $this;

    }

    public function order($order)
    {
        return $this;

    }

    public function limit($limit)
    {
        return $this;

    }

    public function query($sql)
    {
        echo "SQL: $sql\n";

    }

}
