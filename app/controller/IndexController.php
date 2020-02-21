<?php
namespace app\controller;

use app\model\PeopleModel;
use core\lib\Controller;
use core\lib\Log;
use core\lib\Model;
use core\lib\pattern\FactoryPattern;

class IndexController extends Controller {
    public function index()
    {
        $model = new Model();
        $sql = "select * from people";
        $res = $model->query($sql)->fetchAll();
        p($res);
    }

    //测试TWIG模板引擎输出1
    public function test()
    {
        $this->assign('data','数据内容');
        $this->assign('title','自定义标题');
        $this->display('test');
    }

    //测试TWIG模板引擎输出2
    public function test1()
    {
        $this->assign('data','数据');
        $this->assign('title','标题');
        $this->display('index');
    }

    //测试TWIG模板引擎输出3
    public function test2()
    {
        $this->view(
            [
                'title'=>'标题',
                'data'=>'内容1'
            ]
            , 'test');

    }

    //测试日志记录
    public function test3()
    {
       Log::error('这是一个错误信息');
       Log::log('这是一个日志信息');
    }

    //测试工厂模式创建对象
    public function test4()
    {
        $model =FactoryPattern::createModel('people');
        $model->test();
        dump($_SERVER);exit;

    }

    //测试Medoo数据库模型(轻量级ORM)
    public function test5()
    {
        $model = new PeopleModel();
        $data = $model->select('people','*');
        $model->insert('people',['id'=>7]);
        $model->insert('people',['id'=>8]);
        $model->insert('people',['id'=>9]);
        $data1 = $model->delete('people',['id'=>9]);

        $list = $model->list();
        dump($list);

        dump($data,$data1);

    }
}
