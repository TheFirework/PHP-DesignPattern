<?php

/**
 * 抽象原型类
 * Class Prototype
 */
Abstract class Prototype
{
    abstract function __clone();
}

class Map extends Prototype
{
    public $width;
    public $height;
    public $name;
    public $people;

    public function setAttribute($name,$width,$height,$people)
    {
        $this->name = $name;
        $this->width = $width;
        $this->height = $height;
        $this->people = $people;
    }

    /**
     * 深拷贝 解决修改成员对象属性影响原型对象
     */
    function __clone()
    {
        $this->people = clone $this->people;
    }
}

class People
{
    public $name;
    public $age;
}

$PrototypeMap = new Map();

$PrototypeMap->setAttribute('新手村',10000,20000,new People);

$map1 = clone $PrototypeMap;
$map1->name = '深渊';
$map1->people->name = '撒旦';

var_dump($PrototypeMap);
var_dump($map1);