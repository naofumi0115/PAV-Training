<?php

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

class RobotWorker
{

    public  function work()
    {
        if ($this->hasPower()) {
            var_dump('works');
        }
    }

    public  function hasPower()
    {
        // return true if robot have power, otherwise false.
    }

}