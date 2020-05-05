<?php

require '../DataObjectMappingMode/test.php';

class AllUser implements \Iterator
{
    protected $ids;
    protected $index;
    protected $data = [];

    public function __construct()
    {
        $db = new MyMysqli();
        $db->connect('127.0.0.1','root','','shop');
        $result = $db->query("select id from user");
        $this->ids = $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * 3
     * 获取当前
     * @inheritDoc
     */
    public function current()
    {
        $id = $this->ids[$this->index]['id'];
        return UserFactory::getUser($id);
    }

    /**
     * 4
     * 获取下一个
     * @inheritDoc
     */
    public function next()
    {
        $this->index ++;
    }

    /**
     * 5
     * @inheritDoc
     */
    public function key()
    {
        return $this->index;
    }

    /**
     * 2
     * 验证是否有下一个
     * @inheritDoc
     */
    public function valid()
    {
        return $this->index < count($this->ids);
    }

    /**
     * 1
     * 重置
     * @inheritDoc
     */
    public function rewind()
    {
        $this->index = 0;
    }
}

$users = new AllUser();

foreach ($users as $user){
    var_dump($user);
}