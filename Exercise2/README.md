# Exercise 2: A code snippet to show how violates SOLID Principles and how can we fix it? :
```php
interface workerInterface
{
    public  function work();
    public  function  sleep();
}

class HumanWorker implements workerInterface
{
    public  function work()
    {
        var_dump('works');
    }

    public  function  sleep()
    {
        var_dump('sleep');
    }

}

class RobotWorker extends HumanWorker
{
    public  function work()
    {
        if ($this->hasPower()) {
       parent::work();
        }
    }

    public  function sleep()
    {
        // No need
    }
    
    public  function hasPower()
    {
        // return true if robot have power, otherwise false.
    }
}
```
