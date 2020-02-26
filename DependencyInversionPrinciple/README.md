# Dependency Inversion Principle :

> High-level modules should not depend on low-level modules. Both should depend on abstractions.

> Abstractions should not depend on details. Details should depend on abstractions.

Or simply : Depend on Abstractions not on concretions

By applying the Dependency Inversion the modules can be easily changed by other modules just 
changing the dependency module and High-level module will not be affected by any changes to 
the Low-level module.

## Exercises

### Problem

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

class PasswordReminder
{    
    /**
     * @var MySQLConnection
     */
     private $dbConnection;
     
     public function __construct(MySQLConnection $dbConnection) 
    {
      $this->dbConnection = $dbConnection;
    }
}
```

There's a common misunderstanding that dependency inversion is simply another way to say dependency injection. However, the two are not the same.

In the above code In spite of Injecting MySQLConnection class in PasswordReminder class but it depends on MySQLConnection.

High-level module PasswordReminder should not depend on low-level module MySQLConnection.

If we want to change the connection from MySQLConnection to MongoDBConnection, we have to change hard-coded constructor injection in PasswordReminder class.

PasswordReminder class should depend upon on Abstractions, not on concretions. 

### Solution

1. Introduce ConnectionInterface for each connection.
2. Injecting ConnectionInterface into PasswordReminder class.

```php
interface ConnectionInterface
{
   public function connect();
}

class DbConnection implements ConnectionInterface
{
   /**
    * db connection
    */
    public function connect()
    {
     var_dump('MYSQL Connection');
    }
}

class PasswordReminder
{
   /**
    * @var DBConnection
    */
    private $dbConnection;
    
    public function __construct(ConnectionInterface $dbConnection)
    {
      $this->dbConnection = $dbConnection;
    }
}
```

In the above code, we want to change the connection from MySQLConnection to MongoDBConnection, we no need to change constructor injection in PasswordReminder class. Because here PasswordReminder class depends upon on Abstractions, not on concretions.
