<?php
/**
 * Name: SingleTest.php.
 * Author: houpeng
 * Date: 2021/7/18 上午12:54
 * Description: SingleTest.php.
 */

class A
{
    public function show()
    {
        echo "我是A类函数，要调用B类函数和C类函数" . PHP_EOL;
        $b = new B();
        $b->show();
        $c = SingleC::getInstance();
        $c->show('A');
    }
}

class B
{
    public function show()
    {
        echo "我是B类函数，要调用C类函数" . PHP_EOL;
        $c = SingleC::getInstance();
        $c->show('B');
    }
}

class SingleC
{
    use InstanceTool;

    private function __clone()
    {
        //不允许被new
    }

    private function __construct()
    {
        //不允许被new
        echo "SingleC 对象被创建" . PHP_EOL;
    }

    public function show($param)
    {
        echo "我是C类函数，现在被{$param}类函数调用" . PHP_EOL;
    }
}


trait InstanceTool
{
    private function __construct()
    {
    }

    /**
     * Instances of the derived classes.
     * @var array
     */
    protected static $instances = null;

    /**
     * Get instance of the derived class.
     * @param array $params
     * @return static
     */
    public static function getInstance($params = [])
    {
        $className = get_called_class();
        if (is_null(self::$instances)) {
            self::$instances = new $className;
            echo "被实例化了" . PHP_EOL;
        }
        self::$instances->params = $params;
        return self::$instances;
//        if (!isset(self::$instances[$className])) {
//            self::$instances[$className] = new $className;
//            echo "被实例化了".PHP_EOL;
//        }
//        self::$instances[$className]->params = $params;
//        return self::$instances[$className];
    }
}

$a = new A();
$a->show();