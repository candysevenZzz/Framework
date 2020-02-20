<?php
namespace core\lib;

use ArrayAccess;
use Exception;

class Config implements ArrayAccess
{
    /**
     * @var $path string 配置文件路径
     * @var $configs array 配置项
     *
     * 读取配置文件类
     */
    protected $path;
    protected $configs = array();

    function __construct($path = BASE)
    {
        $this->path = $path;
    }

    /**
     * @param mixed $offset 配置文件名称
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->configs[$offset]);
    }

    /**
     * @param mixed $offset 配置文件名称
     * @return mixed
     */
    public function offsetGet($offset)
    {
        if (empty($this->configs[$offset]))
        {
           $file_path = $this->path.'/'.$offset.'.php';
           $config = require $file_path;

           $this->configs[$offset] = $config;

        }
        return $this->configs[$offset];

    }

    /**
     * @param mixed $offset 配置文件名称
     * @param $value string 配置项-数组名
     * @throws Exception
     */
    public function offsetSet($offset, $value)
    {
        throw new Exception("cannot write config file.");
    }

    /**
     * @param mixed $offset 配置文件名称
     */
    public function offsetUnset($offset)
    {
        unset($this->configs[$offset]);
    }

    /**
     * 获取配置文件中的指定配置项
     * @throws Exception
     */
    static public function get($key, $file)
    {
        $path = BASE.'/configs/'.$file.'.php';
        if (is_file($path))
        {
           $config =  require $path;
           return $config[$key];
        }else{
            throw new Exception('Can\'t find this file: '.$path.'.php');
        }

    }

    /**
     * 获取配置文件中所有配置
     * @param $file
     * @return mixed
     * @throws Exception
     */
    static public function all($file)
    {
        $path = BASE.'/configs/'.$file.'.php';
        if (is_file($path))
        {
            return require $path;

        }else{
            throw new Exception('Can\'t find this file: '.$path.'.php');
        }
    }
}
