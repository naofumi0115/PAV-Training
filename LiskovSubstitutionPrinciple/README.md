# Liskov Substitution Principle :

The Liskov Substitution principle was introduced by Barbara Liskov in 1987.

>Subclass/Child class should be substitutable for their Superclass/parent class.

It states that any implementation of an abstraction (interface) should be 
substitutable in any place that the abstraction is accepted. Basically, 
it takes care that while coding using interfaces in our code, 
we not only have a contract of input that the interface receives but also the 
output returned by different Classes implementing that interface; they should be 
of the same type.

## Exercises

### Problem
We create an array containing the birds and then loop for the elements.
Please look bad design at the following code.

```php
class Animal {
    public function eat()
    {
        echo "Eat";
    }
}

class Bird extends Animal
{
    public function fly()
    {
        echo "Fly";
    }
}

class Eagle extends Bird
{
    public function fly()
    {
        echo "Eagle Fly";
    }
}

class Duck  extends Bird
{
    public function fly()
    {
        echo "Duck  Fly";
    }
}

class Penguin extends Bird
{
    public function fly()
    {
        throw new Exception;
    }
}

$eagle = new Eagle();
$duck = new Duck();
$penguin = new Penguin();

$birds = [$eagle, $duck, $penguin];

foreach ($birds as $key => $bird) {
  $bird->fly();
}

```
When calling fly function of Penguin class will throw Exception. Penguin class causes a error, failing to substitute its parent Bird class , so it violated LSP.

### Solution

1. Penguin should not substitutable for Bird so Penguin should not extend from Bird.

```php
class Penguin extends Animal
{
    //
}
```
