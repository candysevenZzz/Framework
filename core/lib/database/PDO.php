<?php

namespace core\lib\database;

class PDO implements DataBaseInterFace
{

    /**
     * @var \PDO
     * 数据库连接对象
     */
    protected $conn;

    /**
     * @var $type string
     * 数据库类型
     */
    public $type;

    public function connect($host, $user, $pwd, $dbname)
    {
        $dsn = "mysql:host=$host;dbname=$dbname";
        $conn = new \PDO($dsn, $user, $pwd);
        $this->conn = $conn;
    }

    public function query($sql)
    {
        return $this->conn->query($sql);
    }

    public function close()
    {
        unset($this->conn);
    }
}