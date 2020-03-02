# Set
A **set** is a data structure that can store any number of **unique** values in any order. Set is different from array in the sense that they only allow non-repeated, unique values within them.

## Implement Set
Following, we will use array to implement a set of integer.

```php
class Set {
    /** @var array */
    private $elements;

    /**
    * constructor
    */
    public function __construct()
    {
        $this->elements = array();
    }

    /**
    * add element to set
    * @param int $ele
    */
    public function add($ele)
    {
        if (!$this->isExist($ele)) { // we have to check if element is existed before adding
            $this->elements[] = $ele; // because the order is any so we can add to the end or beginning
        }
    }

    /**
    * get set
    * @return array
    */
    public function get()
    {
        return $this->elements;
    }


    /**
    * check if element is exist in set
    * @param int $ele
    * @return bool
    */
    public function isExist($ele)
    {
        return in_array($ele, $this->elements); // In php, in_array use to check an element is in array or not
    }
}

$set = new Set(); // init set: ()
$set->add(1); // add 1 to set: (1)
$set->add(3); // add 3 to set: (1, 3)
$set->add(1); // add 1 to set: (1, 3), 1 is existed
$set->add(2); // add 2 to set: (1, 3, 2)
print_r($set->get()); // print set
//result: 1, 3, 2

```

## Exercise
### Problem
Your team will have party in the month that have member's birthday. You are team lead so you would like to know these months to prepare.
### Solution
You can remember every member's birthday, but it may be many member have same birthday month. Therefore if we can extract only month, its easier to remember.

We use set to process this problem.

```php
<? php

function extractMonth($date)
{
    $timestamp = strtotime($date); // convert string to timestamp (https://www.php.net/manual/en/function.strtotime)
    return date("m", $timestamp); // format date from timestamp, "m" means month (https://www.php.net/manual/en/function.date)
}

$set = new Set(); 

$set->add(extractMonth("2019/01/14")); // add month 01, set (1)
$set->add(extractMonth("2019/10/04")); // add month 10, set (1, 10)
$set->add(extractMonth("2019/01/02")); // add month 01, set (1, 10)
$set->add(extractMonth("2019/03/02")); // add month 03, set (1, 10, 3)
$set->add(extractMonth("2019/01/02")); // add month 01, set (1, 10, 3)

print_r($set->get()); // print set
//result: 1, 10, 3

```

## Homework
1. (Easy) You are learning English. Everyday, you caught a lot of new words, some of them you're already learned but forgetting now. Therefore, you want build a dictionary to check which one is new word, which is your forgetting word.