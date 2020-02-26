# Exercise 1: A code snippet to show how violates SOLID Principles and how can we fix it? :
```php
class Rectangle
{
    protected $width;
    protected $height;

    public setWidth($width)
    {
        $this->width = $width;
    }

    public setHeight($height)
    {
        $this->height = $height;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function getHeight()
    {
        return $this->height;
    }
}

class Square extends Rectangle
{
    public setWidth($width)
    {
        parent::setWidth($width);
        parent::setHeight($width);
    }

    public setHeight($height)
    {
        parent::setHeight($height);
        parent::setWidth($height);
    }
}

class Circle
{
    public $radius;
    public setRadius($radius)
    {
        $this->radius = $radius;
    }

    public function getRadius()
    {
        return $this->radius;
    }
}

class CostManager
{
    public function calculate($shape)
    {
        $costPerUnit = 1.5;
        if ($shape instanceof Rectangle) {
            $area = $shape->width * $shape->height;
        } else {
            $area = $shape->radius * $shape->radius * pi();
        }
        
        return $costPerUnit * $area;
    }
}
$circle = new Circle();
$circle->setRadius(5);

$rect = new Rectangle();
$rect->setWidth(8);
$rect->setHeight(5);

$sqr = new Square();
$sqr->setWidth(5);

$obj = new CostManager();
echo $obj->calculate($circle);
```
