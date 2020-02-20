<?php
namespace core\lib\pattern;

/**
 * Class RegisterPattern
 * @package core\lib\pattern
 * @pattern 注册器模式
 *
 * 注册器类
 */
class RegisterPattern
{
    /**
     * @var $objs array 全局注册树
     */
    static protected $objs;

    /**
     * @param $alias string 注册树的键
     * @param $obj mixed 对应值
     */
    static function set($alias,$obj)
    {
        self::$objs[$alias] = $obj;
    }

    /**
     * @param $alias string 注册树的键
     * @return mixed 对应值
     */
    static function get($alias)
    {
        return self::$objs[$alias];
    }

    /**
     * @param $alias string 注册树的键
     */
    static function _unset($alias)
    {
        unset(self::$objs[$alias]);
    }
}
