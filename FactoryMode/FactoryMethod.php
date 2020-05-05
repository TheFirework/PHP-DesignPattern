<?php

/**
 * 工厂方法模式
 */

/**
 * 工厂类接口
 * Interface PayFactoryInterface
 */
interface PayFactoryInterface
{
    public function createMode();
}

interface PayInterface
{
    /**
     * 发起支付
     */
    public function pay();

    /**
     * 查询订单
     */
    public function query();
}


class AliPay implements PayInterface
{
    /**
     * @inheritDoc
     */
    public function pay()
    {
        echo '支付宝支付';
    }

    /**
     * @inheritDoc
     */
    public function query()
    {
        echo '支付宝订单查询';
    }

    /**
     * 取消订单
     */
    public function cancel(){
        echo '支付宝订单取消';
    }
}

class Wechat implements PayInterface
{
    /**
     * @inheritDoc
     */
    public function pay()
    {
        echo '微信支付';
    }

    /**
     * @inheritDoc
     */
    public function query()
    {
        echo '微信订单查询';
    }
}

/**
 * 支付宝工厂类
 * Class AlipayFactory
 */
class AlipayFactory implements PayFactoryInterface
{

    public function createMode()
    {
        return new AliPay();
    }
}

/**
 * 微信工厂类
 * Class WechatFactory
 */
class WechatFactory implements PayFactoryInterface
{

    public function createMode()
    {
        return new Wechat();
    }
}


$alipayFactory = new AlipayFactory();
$alipay =$alipayFactory->createMode();
$alipay->pay();
$alipay->query();

$wechatFactory = new WechatFactory();
$wechat = $wechatFactory->createMode();
$wechat->pay();
$wechat->query();