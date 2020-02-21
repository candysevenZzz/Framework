<?php
namespace core\lib;

use \Exception;
use Medoo\Medoo;

/**
 * Class Model
 * @package core\lib
 * 模型基类
 */
class Model extends Medoo
{

    public $table;

    /**
     * Model constructor.
     * @throws Exception
     * 数据库模型类 基于Medoo实现
     */
    public function __construct()
    {
       $configs= Config::all('database');
       parent::__construct($configs);
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
    public function find()
    {
        //todo
        return $this;
    }

    /**
     * 删除数据方法
     */
    public function del()
    {
        //todo
        return $this;
    }

    /**
     * 更新数据方法
     */
    public function rewrite()
    {
        //todo
        return $this;
    }

    /**
     * @param string|array|null $where
     * @return array|bool
     * 条件查询数据表 多条数据
     */
    public function list($where = '')
    {
        if (!is_array($where))
        {
            $where = '*';
        }
        return $this->select($this->table,$where);
    }

    /**
     * @param $tableName
     * @return $this
     * 设置数据表名
     */
    public function setTable($tableName)
    {
        if (empty($this->table))
        {
            $this->table = strtolower($tableName) ;
        }
        return $this;
    }

}
