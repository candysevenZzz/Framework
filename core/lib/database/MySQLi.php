<?php

namespace core\lib\dataBase;


class MySQLi implements DataBaseInterFace
{
    protected $conn;

    public function connect($host, $user, $pwd, $dbname)
    {
        $conn = mysqli_connect($host,$user,$pwd,$dbname);
        $this->conn = $conn;
    }

    public function query($sql)
    {
        return mysqli_query($this->conn,$sql);
    }

    public function close()
    {
        mysqli_close($this->conn);
    }
}