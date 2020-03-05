# Single Responsibility Principle :

>A class should have one, and only one, reason to change.

One class should only serve one purpose, this does not imply that each class should have only one method but they should all relate directly to the responsibility of the class. All the methods and properties should all work towards the same goal. When a class serves multiple purposes or responsibility then it should be made into a new class.

## Exercises

### Problem

Users want to print information of order report by condtion start date and end date following the specific format. 
The orders save in orders table.

Please look bad design at the following code :

```php
namespace Demo;
use DB;
class OrdersReport
{
    public function getOrdersInfo($startDate, $endDate)
    {
        $orders = $this->queryDBForOrders($startDate, $endDate);
        return $this->format($orders);
    }
    
    protected function queryDBForOrders($startDate, $endDate)
    {   // If we would update our persistence layer in the future,
        // we would have to do changes here too. <=> reason to change!
        return DB::table('orders')->whereBetween('created_at', [$startDate, $endDate])->get();
    }
    
    protected function format($orders)
    {   // If we changed the way we want to format the output,
        // we would have to make changes here. <=> reason to change!
        return '<h1>Orders: ' . $orders . '</h1>';
    }
}
```

OrdersReport class have all functions to do everything.

- Connecting to db and query orders table with condition start date and end date.
```php
protected function queryDBForOrders($startDate, $endDate)
{   // If we would update our persistence layer in the future,
    // we would have to do changes here too. <=> reason to change!
    return DB::table('orders')->whereBetween('created_at', [$startDate, $endDate])->get();
}
```

- Format order output 
```php
protected function format($orders)
{   // If we changed the way we want to format the output,
    // we would have to make changes here. <=> reason to change!
    return '<h1>Orders: ' . $orders . '</h1>';
}
```

We will have problem if we want to change something in specification.
For example:
- We want to change condition to query orders records.
- We want to change format the order layout.
- We want to reuse format of order.

### Solution

1. Above class violates single responsibility principle. Why should this class retrieve data from database? It is related to the 
persistence layer [doc](https://en.wikipedia.org/wiki/Multitier_architecture). 

2. The persistence layer deals with persisting (storing and retrieving) data from a data store (such as a database, for example). So it is not the responsibility of this class.

3. Next method format is also not the responsibility of this class. Because we may need different format data such as XML, JSON, HTML etc.

So finally the refactored code will be described as below :

```php
namespace Report;
use Report\Repositories\OrdersRepository;
class OrdersReport
{
    protected $repo;
    protected $formatter;
    public function __construct(OrdersRepository $repo, OrdersOutPutInterface $formatter)
    {
        $this->repo = $repo;
        $this->formatter = $formatter;
    }
    public function getOrdersInfo($startDate, $endDate)
    {
        $orders = $this->repo->getOrdersWithDate($startDate, $endDate);
        return $this->formatter->output($orders);
    }
}

namespace Report;
interface OrdersOutPutInterface
{
	public function output($orders);
}

namespace Report;
class HtmlOutput implements OrdersOutPutInterface
{
    public function output($orders)
    {
        return '<h1>Orders: ' . $orders . '</h1>';
    }
}

namespace Report\Repositories;
use DB;
class OrdersRepository
{
    public function getOrdersWithDate($startDate, $endDate)
    {
        return DB::table('orders')->whereBetween('created_at', [$startDate, $endDate])->get();
    }
}
```
