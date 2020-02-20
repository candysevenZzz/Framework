<?php

namespace core\lib\database;


class MySQL implements DataBaseInterFace
{
    protected $conn;

    public function connect($host, $user, $pwd, $dbname)
    {
        $conn = mysql_connect($host,$user,$pwd);
        mysql_select_db($dbname,$conn);
        $this->conn = $conn;
    }

    public function query($sql)
    {
        return mysql_query($sql,$this->conn);
    }

    public function close()
    {
        mysql_close($this->conn);
    }
}