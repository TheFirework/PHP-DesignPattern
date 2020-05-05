<?php

class Database
{
    public function __construct()
    {
        echo '生成数据库类';
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
        $db = new DataBase();
        return $db;
    }
}

$database = Factory::create();

$database->query();