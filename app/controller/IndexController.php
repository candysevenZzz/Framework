<?php
namespace app\controller;

class IndexController{
    public function index()
    {
        \core\lib\DataBaseFactory::getDatabase('master');
    }
}
