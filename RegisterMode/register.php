<?php

/**
 * 单例模式
 * Class Database
 */
class Database
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

    public function query(){
        echo '查询数据';
    }
}

/**
 * 工厂模式
 * Class Factory
 */
class Factory{
    static public function create(){
        $db = Database::getInstance();
        Register::set('db',$db);
        return $db;
    }
}

/**
 * 注册树模式
 * Class Register
 */
class Register
{
    protected static $objects;

    static function set($alias, $object)
    {
        self::$objects[$alias] = $object;
    }

    static function get($name)
    {
        return self::$objects[$name];
    }

    function _unset($alias)
    {
        unset(self::$objects[$alias]);
    }
}

//$db1 = Factory::create();
//
//$db2 = Register::get('db');
//
//print_r($db1);
//print_r($db2);
