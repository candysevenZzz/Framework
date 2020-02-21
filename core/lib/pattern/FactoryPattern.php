<?php
namespace core\lib\pattern;

/**
 * Class FactoryPattern
 * @package core\lib\pattern
 * @pattern 工厂模式
 *
 * 工厂类
 */
class FactoryPattern
{
    /**
     * @param $modelName string 模型名称
     * @return object 模型实例
     * 创建模型实例
     */
    static public function createModel($modelName)
    {
        $key = 'app_model_'.$modelName;
        $model = RegisterPattern::get($key);
        if (!$model) {
            $class = 'app\\model\\' . ucfirst(strtolower($modelName)) . 'Model';
            $model = new $class;
            RegisterPattern::set($key, $model);
        }
        return $model;

    }
}
