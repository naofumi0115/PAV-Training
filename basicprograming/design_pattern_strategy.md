## Design Pattern: Strategy

One of the common problems we face whilst programming, is that we have to make decisions on different strategies. Strategy pattern is a common pattern helps us make decisions on different cases, more easily.

To understand this better, let us use a scenario in the Exerciese. 

### Exercise

You're developing a notifier program, this notifier will check the given options for a user. A user may want to be notified in many ways, like Email or SMS. Your program has to check the available options to contact that user and then make a decision upon that. This case can easily be solved by: Use 2 classes called `SMSNotifier` and `EmailNotifier`. All these classes implement the Notifier interface, which has a method named `notify`. Each of these classes implement that method on their own.

Create Notifier interface first.

```php
<?php
  interface notifier
  {
    public function notify();
  }
?>
```

Now, implement 2 classes `SMSNotifier` and `EmailNotifier`

```php
<?
class EmailNotifier implements notifier
  public function notify()
  {
    //do something to notify the user by Email
  }
}

class SMSNotifier implements notifier {
  public function notify()
  {
    //do something to notify the user by SMS
  }
}
?>
```

Now we will use this code:

```php
<?php

/**
  * Let's create a mock object User which we assume has a method named 
  * getNotifier(). This method returns either "sms" or "email"
  */

class User {
  private $name;
  private $notifier;
 
  public function __construct($name, $notifier) {
    $this->name = $name;
    $this->notifier = $notifier;
  }

  public function getNotifier() {
    return $this->notifier;
  }
}

$user = new User("A", "email");

$notifier = $user->getNotifier();
switch ($notifier)
{
  case "email":
    $objNotifier = new EmailNotifier();
    break;
  case "sms":
    $objNotifier = new SMSNotifier();
    break;
}
$objNotifier->notify();
?>
```

### Home work

1. Use Strategy pattern to simulate moving of Vehicles: Bike and Car. Bike and Car classes has method `go()`. If it's Bike, output `Bike is moving`, and if it's Car, ouput `Car is moving` on screen.

