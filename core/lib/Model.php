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
     * @param array $data
     * @return bool|\PDOStatement
     */
    public function save(array $data)
    {
        return $this->insert($this->table, $data);
    }

    /**
     * 查询数据方法
     * @param int $id
     * @return bool|mixed
     */
    public function find(int $id)
    {
        //todo
        return $this->get($this->table, '*', array('id'=>$id));
    }

    /**
     * 删除数据方法
     * @param  int $id
     * @return bool|\PDOStatement
     */
    public function del(int $id)
    {
        return $this->delete($this->table, array('id'=>$id));
    }

    /**
     * 更新数据方法
     * @param array $data
     * @param array $where
     * @return bool|\PDOStatement
     */
    public function rewrite(array $data, array $where = null)
    {
        return $this->update($this->table, $data, $where);
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
        return $this->select($this->table, $where);
    }

    /**
     * @param string $tableName
     * @return $this
     * 设置数据表名
     */
    public function setTable(string $tableName)
    {
        if (empty($this->table))
        {
            $this->table = strtolower($tableName) ;
        }
        return $this;
    }

}
