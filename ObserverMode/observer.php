<?php

/**
 * 事件生成器
 * Class EventGenerator
 */
class EventGenerator
{
    private $obServers = [];

    // 增加观察者
    public function add(ObServer $obServer)
    {
        $this->obServers[] = $obServer;
    }

    // 事件通知
    public function notify()
    {
        foreach ($this->obServers as $obServer) {
            $obServer->update();
        }
    }
}

/**
 * 观察者接口
 * Interface ObServer
 */
interface ObServer
{
    public function update($event_info = null);
}

/**
 * 事件
 * Class Event
 */
class Event extends EventGenerator
{
    public function trigger()
    {
        //通知观察者
        $this->notify();
    }
}


class ObServer1 implements ObServer
{
    public function update($event_info = null)
    {
        echo "观察者1 收到执行通知 执行完毕";
    }
}

$event = new Event();
$event->add(new ObServer1());
$event->trigger();