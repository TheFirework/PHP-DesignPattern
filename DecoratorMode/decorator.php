<?php

interface Shape
{
    public function draw();
}

/**
 * 圆形实现类
 * Class Circle
 */
class Circle implements Shape
{
    public function draw()
    {
        print_r("Shape: Circle" );
    }
}

/**
 * 矩形实现类
 * Class Rectangle
 */
class Rectangle implements Shape
{
    public function draw()
    {
        print_r("Shape: Rectangle");
    }
}

/**
 * 形状装饰类
 * Class ShapeDecorator
 */
abstract class ShapeDecorator implements Shape
{
    protected $decoratorShape;

    public function __construct(Shape $shape)
    {
        $this->decoratorShape = $shape;
    }

    public function draw()
    {
        $this->decoratorShape->draw();
    }
}


class RedShapeDecorator extends ShapeDecorator{

    public function __construct(Shape $shape)
    {
        parent::__construct($shape);
    }

    public function draw()
    {
        $this->decoratorShape->draw();
        $this->setRedColor($this->decoratorShape);
    }

    private function setRedColor(Shape $shape)
    {
        print_r("red");
    }
}


$circle = new Circle();
$rectangle = new Rectangle();

$redCircle = new RedShapeDecorator($circle);
$redCircle->draw();

echo '<br/>';

$redRectangle = new RedShapeDecorator($rectangle);
$redRectangle->draw();
