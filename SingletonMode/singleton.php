<?php

/**
 * 单例模式
 * Class Singleton
 * @package SingletonMode
 */
class Singleton
{
    // 静态的私有变量
    private static $_instance;

    // 防止外界实例化对象
    private function __construct()
    {
    }

    static function getInstance()
    {
        if (!self::$_instance instanceof self) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    // 防止克隆对象
    public function __clone()
    {
    }

    // 防止反序列化对象
    private function __wakeup()
    {

    }

    public function test()
    {
        echo "单例输出";
    }
}

$singleton1 = Singleton::getInstance();
var_dump($singleton1);

$singleton2 = Singleton::getInstance();
var_dump($singleton2);