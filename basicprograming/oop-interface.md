## Interface

An interface is a description of the actions that an object can do.
Example, Animals (Cow, Dog, Cat...) have actions `eat` and `sound`. In this case of Animal, an Interface will define the actions, and other classes (Cow, Cat...) will decrible how is these actions.

Interface allows the users to create programs, specifying the public methods that a class must implement.


**Creating an Interface**

Following is an example of how to define an interface using the interface keyword.

```php
<?php  

interface MyInterfaceName { 
   public  function methodA(); 
   public  function methodB(); 
}

?> 
```

Few characteristics of an Interface are:

- An interface consists of methods that have no implementations, which means the interface methods are abstract methods.
- All the methods in interfaces must have public visibility scope.
- Interfaces are different from classes as the class can inherit from one class only whereas the class can implement one or more interfaces.

To implement an interface, use the implements operator as follows:

```php
<?php 
  
class MyClassName implements MyInterfaceName{ 
   public  function methodA() {  
  
     // method A implementation 
   }  
   public  function methodB(){  
  
     // method B implementation 
   }  
} 
  
?> 
```

**Concrete Class**: The class which implements an interface is called the Concrete Class. It must implement all the methods defined in an interface. Just like any class, an interface can be extended using the extends operator as below:

```php
<?php 

interface MyInterfaceName1{ 

	public function methodA(); 

} 

interface MyInterfaceName2 extends MyInterfaceName1{ 

	public function methodB(); 
} 

?> 
```

## Interface Example

```php

<?php

// Interface
interface Animal {
  public function animalSound(); // interface method (does not have a body)
  public function animalEat(); // interface method (does not have a body)
}

// Cow "implements" the Animal interface
class Cow implements Animal {
  public function animalSound() {
    // The body of animalSound() is provided here
    echo "The cow says cow cow\n";
  }
  public function animalEat() {
    // The body of animalEat() is provided here
    echo "The cow eats vegetables\n";
  }
}

// Cat "implements" the Animal interface
class Cat implements Animal {
  public function animalSound() {
    echo "The cat says meow meow\n";
  }
  public function animalEat() {
    echo "The cat eats beefsteak\n";
  }
}

$cow = new Cow();
$cat = new Cat();

$animals = [$cow, $cat];

foreach ($animal as $key => $animal) {
  $animal->animalSound();
  $animal->animalEat();
}

```

Output:

```
The cow says cow cow
The cow eats vegetables
The cat says meow meow
The cat eats beefsteak
```

[Try it](http://sandbox.onlinephpfunctions.com/code/ca341e4e4cf67b413355c0aaa168a7692fecdd3e)
