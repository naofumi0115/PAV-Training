## Design Pattern: Factory

Another common design pattern is factory pattern. The main goal of this pattern is delivering an object by hiding all the complexities behind it. 

Factory design pattern allows interfaces for creating objects without exposing the object creation logic to the client.

Above explaination may sound cryptic, so let's look at it using a real life scenario in the Exercise below.

### Exercise

You are doing a project that works on a very complex system. For this example, you are creating an online document repository, which saves documents in temporary storage. For this you need support for PostgreSQL, MySQL, Oracle, and SQLite because users may deploy your application using any of these. So you create an object, which connects to MySQL and perform the necessary tasks. Your MySQL object is:

```php
<?
   class MySQLManager
   {
     public function setHost($host)
     {
       //set db host
     }
     public function setDB($db)
     {
       //set db name
     }
     public function setUserName($user)
     {
       //set user name
     }
     public function setPassword($pwd)
     {
       //set password
     }
     public function connect()
     {
     //now connect
  }
}
?>
```
 
Well, now you use this class like this:

```php
<?
    $MM = new MySQLManager();
    $MM->setHost("host");
    $MM->setDB("db");
    $MM->setUserName("user");
    $MM->setPassword("pwd");
    $MM->connect();
?>
```

You can now see that each time you started using your class, you needed to do a lot of things. Your PostgreSQL class also looks similar:

```php
<?
   class PostgreSQLManager
   {
     public function setHost($host)
     {
       //set db host
     }
     public function setDB($db)
     {
       //set db name
     }
     public function setUserName($user)
     {
       //set user name
     }
     public function setPassword($pwd)
     {
       //set password
     }
     public function connect()
     {
       //now connect
     }
} ?>
```

And using PostgreSQL is also the same:

```php
<?
    $PM = new PostgreSQLManager();
    $PM->setHost("host");
    $PM->setDB("db");
    $PM->setUserName("user");
    $PM->setPassword("pwd");
    $PM->connect();
?>
```

But now usage could be a bit difficult when you merge them together:

```php
<?
if ($dbtype=="mysql") {
    $MM = new MySQLManager();
    $MM->setHost("host");
    $MM->setDB("db");
    $MM->setUserName("user");
    $MM->setPassword("pwd");
    $MM->connect();
} else if {
    $PM = new PostgreSQLManager();
    $PM->setHost("host");
    $PM->setDB("db");
    $PM->setUserName("user");
    $PM->setPassword("pwd");
    $PM->connect();
}
```

Shortly after this you will find that as more database engines are added such as Oracle, SQLite... The core code changes significantly and you have to hard code all these things in core classes. However, a very good practice of programming is loose coupling. Here you make a separate class called DBManager, which will perform all these things from a central place. Let's make it:

```php
<?
class DBManager{
    public static function setDriver($driver) {
        $this->driver = $driver; //set the driver
    }
    public static function connect() {
        if ($this->driver=="mysql") {
            $MM = new MySQLManager();
            $MM->setHost("host");
            $MM->setDB("db");
            $MM->setUserName("user");
            $MM->setPassword("pwd");
            $this->connection = $MM->connect();
        } else if ($this->driver=="pgsql") {
            $PM = new PostgreSQLManager();
            $PM->setHost("host");
            $PM->setDB("db");
            $PM->setUserName("user");
            $PM->setPassword("pwd");
            $this->connection= $PM->connect();
        }
    }
}
?>
```

Now you can use it from a single place called DBManager. This makes the thing a whole lot easier than before.

```php
<?
  $DB = new DBManager();
  $DB->setDriver("mysql");
  $DB->connect("host","user","db","pwd");
?>
```

And when you change to use PostgreSQL, only need to update the `drive` to `pgsql`

```php
    $DB = new DBManager();
    $DB->setDriver("pgsql");
    $DB->connect("host","user","db","pwd");
```


This is the real life example of a Factory design pattern. The DBManager now works as a Factory, which encapsulates all the complexities behind the scene and delivers two products. Factory simplifies programming by encapsulating the difficulties inside it.

### Home Work

Same with above example. You need output logs for your project, and Loggers need to support other kind of logs included Std adn file. By using Factory pattern, implement classes to simulate logging (only use `echo` command to ouput messages):


```php
// Implement your classes here

$ouputMsg = "This is a error message";
$logger = new LoggerManager('file');
$logger->log($ouputMsg);

$logger = new LoggerManager('std');
$logger->log($ouputMsg);
```

The ouput on sreen will be:

```
File logger: This is a error message
Std logger: This is a error message
```
