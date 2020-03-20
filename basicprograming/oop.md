# Object-Oriented Programming

## Index

- [OOP Introduction](https://www.w3schools.com/php/php_oop_what_is.asp)
- [Classes/Objects](https://www.w3schools.com/php/php_oop_classes_objects.asp)
- [Constructor](https://www.w3schools.com/php/php_oop_constructor.asp)
- [Destructor](https://www.w3schools.com/php/php_oop_destructor.asp)
- [Access Modifiers](https://www.w3schools.com/php/php_oop_access_modifiers.asp)
- [Inheritance](https://www.w3schools.com/php/php_oop_inheritance.asp)
- [Static Methods](https://www.w3schools.com/php/php_oop_static_methods.asp)
- [Static Properties](https://www.w3schools.com/php/php_oop_static_properties.asp)
- [Abstract Classes](https://www.w3schools.com/php/php_oop_classes_abstract.asp)
- [Interfaces](./oop-interface.md)

## Exercise

### Problem

We need a system to send emails to users. And we can use other services for sending email such as SendGrid, MailChimp... Apply OOP to implement classes for email system. (Only simulate sending email)

### Solution.

Because any sending email need sender, receivers, email subject, email body. Therefore we can use Abstract class to implement this actions, it can be re-use in other email services, and in each email service, we only need to implement Sending email by extending Abstract class.

### Source code.

```php
<?
abstract class Emailer {
  // Declare properties
  protected $sender;
  protected $recipients;
  protected $subject;
  protected $body;

  // Use Constructor to initialize sender and recipients
  function __construct($sender)
  {
    $this->sender = $sender;
    $this->recipients = array(); 
  }

  public function addRecipients($recipient)
  {
    array_push($this->recipients, $recipient);
  }

  public function setSubject($subject)
  {
    $this->subject = $subject;
  }

  public function setBody($body)
  {
    $this->body = $body;
  }
}

// Implement method sendEmail for SendGrid and MailChimp

class SendGrid extends Emailer {
  public function sendEmail()
  {
    foreach ($this->recipients as $recipient) {
      $result = mail($recipient, $this->subject, $this->body, "From: {$this->sender}\r\n");
      echo "SendGrid successfully sent to {$recipient}\n";
      echo "Sender: $this->sender\n";
      echo "Subject: $this->subject\n";
      echo "Content: $this->body\n";
    }
  }
}

class MailChimp extends Emailer {
  public function sendEmail()
  {
    foreach ($this->recipients as $recipient) {
      $result = mail($recipient, $this->subject, $this->body, "From: {$this->sender}\r\n");
      echo "MailChimp successfully sent to {$recipient}\n";
      echo "Sender: $this->sender\n";
      echo "Subject: $this->subject\n";
      echo "Content: $this->body\n";
    }
  }
}

?>
```

And send email by SendGrid or MailChimp

```php

// SendGrid
$sgEmailer = new SendGrid("youremail@yourdomain.com");
$sgEmailer->addRecipients("emailID@domain.com");
$sgEmailer->setSubject("Just a Test");
$sgEmailer->setBody("Hi Name, How are you?");
$sgEmailer->sendEmail();


// MailChimp
$sgEmailer = new MailChimp("youremail@yourdomain.com");
$sgEmailer->addRecipients("emailID@domain.com");
$sgEmailer->setSubject("Just a Test");
$sgEmailer->setBody("Hi Name, How are you?");
$sgEmailer->sendEmail();
```

## Homework

1. Write a program that defines a shape class with a constructor that gives value to width and height. The define two sub-classes triangle and rectangle, that calculate the area of the shape area(). After that, define two variables: a triangle and a rectangle and then call the area() function in this two varibles.

2. Look at exercise above, we are using the syntax below to send email:

```php
// SendGrid
$sgEmailer = new SendGrid("youremail@yourdomain.com");
$sgEmailer->addRecipients("emailID@domain.com");
$sgEmailer->setSubject("Just a Test");
$sgEmailer->setBody("Hi Name, How are you?");
$sgEmailer->sendEmail();


// MailChimp
$mcEmailer = new MailChimp("youremail@yourdomain.com");
$mcEmailer->addRecipients("emailID@domain.com");
$mcEmailer->setSubject("Just a Test");
$mcEmailer->setBody("Hi Name, How are you?");
$mcEmailer->sendEmail();
```

Let refactor the source code on the exercise to use syntax below to send email

```php
// SendGrid
$sgEmailer = new SendGrid("youremail@yourdomain.com");
$sgEmailer->addRecipients("emailID@domain.com")->setSubject("Just a Test")->setBody("Hi Name, How are you?")->sendEmail();


// MailChimp
$mcEmailer = new MailChimp("youremail@yourdomain.com");
$mcEmailer->addRecipients("emailID@domain.com")->setSubject("Just a Test")->setBody("Hi Name, How are you?")->sendEmail();
```
