# Dependency Inversion Principle :

> High-level modules should not depend on low-level modules. Both should depend on abstractions.

> Abstractions should not depend on details. Details should depend on abstractions.

Or simply : Depend on Abstractions not on concretions

By applying the Dependency Inversion the modules can be easily changed by other modules just 
changing the dependency module and High-level module will not be affected by any changes to 
the Low-level module.

## Exercises

### Problem

After accessing a website, if you want to use the feature in the website, website request you login to the website.
The normal login data are user name and password.
For this example, you must check user name and password in the database. Firstly, we must connect to the database, and then compare values of user name and password.
Please look at the following code :

```php
class MySQLConnection
{
   /**
    * db connection
    */
    public function connect()
    {
      var_dump('MYSQL Connection');
    }
}

class LoginService
{    
    /**
     * @var MySQLConnection
     */
     private $dbConnection;
     
    public function __construct(MySQLConnection $dbConnection) 
    {
      $this->dbConnection = $dbConnection;
    }

    public function isValidLogin($user, $pwd) {
        // connecting to the database
        $this->dbConnection->connect();
        // checking user name and password
        echo "valid"
    }
}
```

Well, now you use this class like this:
```php
<?
    $mysqlDb = new MySQLConnection();
    $login = new LoginService($mysqlDb);
    $login ->isValidLogin("user", "pwd");
?>
```

There's a common misunderstanding that dependency inversion is simply another way to say dependency injection. However, the two are not the same.

In the above code In spite of Injecting MySQLConnection class in LoginService class but it depends on MySQLConnection.

```php
public function __construct(MySQLConnection $dbConnection) 
{
  $this->dbConnection = $dbConnection;
}
```   

High-level module LoginService should not depend on low-level module MySQLConnection.

If we want to change the connection from MySQLConnection to MongoDBConnection, we have to change hard-coded constructor injection in LoginService class.

LoginService class should depend upon on Abstractions, not on concretions. 

### Solution

1. Introduce ConnectionInterface for each connection.

2. Injecting ConnectionInterface into LoginService class.

```php
interface ConnectionInterface
{
   public function connect();
}

class MySQLConnection implements ConnectionInterface
{
   /**
    * db connection
    */
    public function connect()
    {
     var_dump('MYSQL Connection');
    }
}

class MongoDBConnection implements ConnectionInterface
{
   /**
    * db connection
    */
    public function connect()
    {
     var_dump('MongoDb Connection');
    }
}

class LoginService
{
   /**
    * @var DBConnection
    */
    private $dbConnection;
    
    public function __construct(ConnectionInterface $dbConnection)
    {
      $this->dbConnection = $dbConnection;
    }

    public function isValidLogin($user, $pwd) {
        // connecting to the database
        $this->dbConnection->connect();
        // checking user name and password
        echo "valid"
    }
}
```

```php
<?
    $db = new MongoDBConnection();
    $login = new LoginService($db);
    $login ->isValidLogin("user", "pwd");
?>
```

In the above code, we want to change the connection from MySQLConnection to MongoDBConnection, we no need to change constructor injection in LoginService class. Because here LoginService class depends upon on Abstractions, not on concretions.
