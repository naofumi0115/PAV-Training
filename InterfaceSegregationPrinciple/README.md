# Interface Segregation Principle :

>A Client should not be forced to implement an interface that it doesn't use.

This rule means that  we should break our interfaces in many smaller ones, 
so they better satisfy the exact needs of our clients.

Similar to the Single Responsibility Principle, the goal of the Interface Segregation Principle is to minimize the side consequences and repetition by dividing the software into multiple, independent parts.

## Exercises

### Problem

As worker, he will 2 actions working and sleeping. 
In below example, we have human and robot class implement two the actions.


```php
interface WorkerInterface
{
    public  function work();
    public  function sleep();
}

class HumanWorker implements WorkerInterface
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

class RobotWorker implements WorkerInterface
{
    public  function work()
    {
        var_dump('works');
    }

    public  function sleep()
    {
        // No need
    }
}
```

In the above code, RobotWorker no needs sleep, but the class has to implement the sleep method because we know that all methods are abstract in the interface. It breaks the **Interface segregation** law.

### Solution

1. Introduce new two interface instead of workerInterface.

2. HumanWorker class should implement 2 method work and sleep.

3. RobotWorker class should implement 1 method work.

```php
interface WorkAbleInterface
{
    public  function work();
}

interface SleepAbleInterface
{
    public  function  sleep();
}

class HumanWorker implements WorkAbleInterface, SleepAbleInterface
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

class RobotWorker implements WorkAbleInterface
{
    public  function work()
    {
        var_dump('works');
    }
}
```
