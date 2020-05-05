<?php

/**
 * 抽象工厂模式
 */

/**
 * 抽象产品 iphone 高端产品
 * Interface HighEnd
 */
interface HighEnd
{
    public function getName();
}

/**
 * 抽象产品 iphone 低端产品
 * Interface GroundEnd
 */
interface GroundEnd
{
    public function getName();
}

/**
 * 具体产品 IPhone19
 * Class IPhoneMobile
 */
class IPhoneHighEndMobile implements HighEnd
{
    private $_name;

    public function __construct()
    {
        $this->_name = 'IPhone19';
    }

    public function getName()
    {
        return $this->_name;
    }
}

/**
 * 具体产品 坚果 Pro3
 * Class NutMobile
 */
class IPhoneGroundEndMobile implements GroundEnd
{
    private $_name;

    public function __construct()
    {
        $this->_name = 'IPhone11';
    }

    public function getName()
    {
        return $this->_name;
    }
}

/**
 * 抽象工厂
 * Interface AbstractFactory
 */
interface AbstractFactory
{
    // 创建具体产品的工厂方法
    public function createIPhoneHighEnd();

    public function createIPhoneGroundEnd();
}

class IPhoneFactory implements AbstractFactory
{
    public function createIPhoneHighEnd()
    {
        return new IPhoneHighEndMobile();
    }

    public function createIPhoneGroundEnd()
    {
        return new IPhoneGroundEndMobile();
    }
}

$factory = new IPhoneFactory();
$groundEnd = $factory->createIPhoneGroundEnd();
$highEnd = $factory->createIPhoneHighEnd();

echo $groundEnd->getName();
echo $highEnd->getName();