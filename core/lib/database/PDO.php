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
    public $type = 'mysql';

    public function connect($host, $user, $pwd, $dbname)
    {


        $conn = new \PDO("$this->type:host=$host;dbname=$dbname",$user,$pwd);
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