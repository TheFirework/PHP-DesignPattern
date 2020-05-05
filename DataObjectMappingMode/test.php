<?php
header("Content-type:text/html; charset=utf-8");

require '../AdapterModel/adapter.php';
require '../RegisterMode/register.php';

class User
{
    public $id;
    public $nickname;
    public $mobile;

    protected $db;

    function __construct()
    {
        $this->db = new MyMysqli();
        $this->db->connect('127.0.0.1', 'root', '', 'shop');
        $res = $this->db->query('select * from user limit 1');
        $data = $res->fetch_assoc();
        $this->id = $data['id'];
        $this->nickname = $data['nickname'];
        $this->mobile = $data['mobile'];
    }

    function __destruct()
    {
        $this->db->query("update user set nickname = '{$this->nickname}',mobile = '{$this->mobile}' where id={$this->id} limit 1");
    }
}

class UserFactory
{
    static function getUser($id)
    {
        $key = 'user_'.$id;
        $user = Register::get($key);
        if (!$user){
            $user = new User($id);
            Register::set($key,$user);
        }
        return $user;
    }
}

class Page
{
    function index(){
        $user = UserFactory::getUser(1);
        $user->mobile = 15681277777;
        $this->test();
        echo 'ok';
    }

    function test(){
        $user = UserFactory::getUser(1);
        $user->nickname = '这个人有点冷';
    }
}

$page = new Page();
$page->index();