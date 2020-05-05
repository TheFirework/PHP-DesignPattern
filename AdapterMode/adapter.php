<?php

/**
 * 适配器接口
 * Interface DbInterface
 */
interface DbInterface
{
    function connect($host,$user,$password,$dbname);
    function query($sql);
    function close();
}



class Mysql implements DbInterface
{
    protected $conn;

    function connect($host, $user, $password, $dbname)
    {
        $conn = mysql_connect($host,$user,$password,$dbname);
        mysql_select_db($dbname,$conn);
        $this->conn = $conn;
    }

    function query($sql)
    {
        return mysql_query($sql,$this->conn);
    }

    function close()
    {
        mysql_close($this->conn);
    }
}

class MyMysqli implements DbInterface
{
    protected $conn;

    function connect($host, $user, $password, $dbname)
    {
        $conn = mysqli_connect($host, $user, $password,$dbname);
        $this->conn = $conn;
    }

    function query($sql)
    {
        return mysqli_query($this->conn,$sql);
    }

    function close()
    {
        mysqli_close($this->conn);
    }
}

class MyPdo implements DbInterface
{
    protected $conn;

    function connect($host, $user, $password, $dbname)
    {
        $conn =  new \PDO("mysql://host=$host;dbname=$dbname", $user, $password);
        $this->conn = $conn;
    }

    function query($sql)
    {
        return $this->conn->query($sql);
    }

    function close()
    {
        unset($this->conn);
    }
}

//$db = new MyMysqli();
//$db->connect('127.0.0.1','root','','shop');
//$data = $db->query('show databases');
//$db->close();
//
//print_r($data);