<?php

interface UserStrategy
{
    function showAd();

    function showCategory();
}

class FemaleUserStrategy implements UserStrategy
{

    function showAd()
    {
        echo '夏季新款女装';
    }

    function showCategory()
    {
        echo '女装';
    }
}

class MaleUserStrategy implements UserStrategy
{


    function showAd()
    {
        echo '夏季新款男装';
    }

    function showCategory()
    {
        echo '男装';
    }
}


class Page
{
    /**
     * @var UserStrategy $strategy
     */
    protected $strategy;

    function index()
    {
        $this->strategy->showAd();

        $this->strategy->showCategory();
    }

    /**
     * 控制反转
     * @param UserStrategy $strategy
     */
    function setStrategy(UserStrategy $strategy)
    {
        $this->strategy = $strategy;
    }
}

$page = new Page;

if (isset($_GET['female'])){
    $strategy = new FemaleUserStrategy();
}else{
    $strategy = new MaleUserStrategy();
}

$page->setStrategy($strategy);
$page->index();