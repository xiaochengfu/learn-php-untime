<?php
/**
 * Name: NoSingle.php.
 * Author: houpeng
 * Date: 2021/7/18 上午12:51
 * Description: NoSingle.php.
 */

class A
{
    public function show()
    {
        echo "我是A类函数，要调用B类函数和C类函数".PHP_EOL;
        $b = new B();
        $b->show();
        $c = new C();
        $c->show('A');
    }
}

class B
{
    public function show()
    {
        echo "我是B类函数，要调用C类函数".PHP_EOL;
        $c = new C();
        $c->show('B');
    }
}

class C
{
    public function __construct()
    {
        echo "C类对象被创建".PHP_EOL;
    }

    public function show($param)
    {
        echo "我是C类函数，现在被{$param}类函数调用".PHP_EOL;
    }
}

$a = new A();
$a->show();
