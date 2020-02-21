<?php
namespace core\lib;

use Medoo\Medoo;

/**
 * Class Model
 * @package core\lib
 * 模型基类
 */
class Model extends Medoo
{
    /**
     * Model constructor.
     * @throws \Exception
     * 所有增删改查 基于Medoo提供的基类方法
     */
    public function __construct()
    {
       $configs= Config::all('database');
       parent::__construct($configs);
    }

}
