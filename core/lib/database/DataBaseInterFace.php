<?php
namespace core\lib\database;
interface DataBaseInterFace
{
    public function connect($host,$user,$pwd,$dbname);
    public function query($sql);
    public function close();

}
