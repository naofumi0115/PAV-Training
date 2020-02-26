## Design Pattern: Singleton

Signleton is a design pattern to ensure that the class instace is only created once. It means that object is only created on first time, after first time, created object will be resuse instead of creating more new objects.

### When you can use Singleton

In the application, there are objects that are accessed many times but do not need to be initialized again. Example:

- Database connection: if don't use Signleton, every time we want to access the database, we need to create a new Database object. But actually, we need only one database object to access the database.
- Logging: we need to store logs in some case such as error. We need only one object for this action. If there is no Singleton, many objects will be created.


### How To Implement a Singleton

To implement a Singleton, we need:

- Define a private static property to store the instance.
- Declaring constructor of the class to be private.
- Providing a static method that returns a reference to the instance.

```php
class Singleton {
    // Define a private static property to store the instance. 
    private static $instance = null;

    // Declaring constructor of the class to be private.
    private function __construct(){}

    // Providing a static method that returns a reference to the instance.
    public function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
```

### Exercises

#### Problem

When we need to access database such as MySQL, we need only one Database Object with one connection to access the database. But if we create many objects, many connections will be created. It's not good for performance.

#### Solution

Use singleton to implement a class `DB` to access database to create only one object.

```php
<?php
class DB
{
    // Define a private static property to store the instance.
    private static $instance = null;

    private $conn;
    private $host = 'localhost';
    private $user = 'root';
    private $pass = 'root';
    private $name = 'test';

    // Declaring constructor of the class to be private.
    private function __construct()
    {
        $this->conn = new PDO("mysql:host={$this->host};dbname={$this->name}", $this->user, $this->pass);
    }

    // Providing a static method that returns a reference to the instance.
    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new DB();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}

$instance1 = DB::getInstance();
$connectionID1 = $instance1->getConnection()->query('SELECT CONNECTION_ID()')->fetch(PDO::FETCH_ASSOC);
print_r($connectionID1);


$instance2 = DB::getInstance();
$connectionID2 = $instance2->getConnection()->query('SELECT CONNECTION_ID()')->fetch(PDO::FETCH_ASSOC);
print_r($connectionID2);

```

Excute above source code, the values of `$connectionID1` and `$connectionID2` are the same.

### Home Work

1. Use Singleton to implement a Logger class, the Logger contains method `log` with input parameter is a string and ouput the input string to screen.
