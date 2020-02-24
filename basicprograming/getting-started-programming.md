# Getting Started Programming

## Index
- [Introduction](https://www.w3schools.com/php/php_intro.asp)
- [Install PHP](https://www.apachefriends.org/download.html)
- [PHP Syntax](https://www.w3schools.com/php/php_syntax.asp)
- [Variables](https://www.w3schools.com/php/php_variables.asp)
- [Constant](https://www.w3schools.com/php/php_constants.asp)
- [Echo/Print commands](https://www.w3schools.com/php/php_echo_print.asp)
- [Data types](https://www.w3schools.com/php/php_datatypes.asp)
- [Operators](https://www.w3schools.com/php/php_operators.asp)
- [Conditional statements](https://www.w3schools.com/php/php_if_else.asp)
- [Switch Statement](https://www.w3schools.com/php/php_switch.asp)
- [Loops](https://www.w3schools.com/php/php_looping.asp)
- [Functions](https://www.w3schools.com/php/php_functions.asp)
- [Arrays](https://www.w3schools.com/php/php_arrays.asp)

## Exercises

### Problem:

Given an array `$a = [6, 2, 5, 10, 11, 1, 17, 20];`, find minimum and maximum value of the array and ouput them to screen.

### Solution

1. Set default max and min value to first element of array.
2. Loop on array, check if current element value is less than current min value, set min value to current element. And check if current element value is greater than current max value, set max value to current element.

```php
<?php
  $a = [6, 2, 5, 10, 11, 1, 17, 20];
  // Set default min and max value is first element of array
  $min = $a[0];
  $max = $a[0];

  // Loop array
  foreach ($a as $key => $value) {
    // if $min is less than current element, assign current element to $min
    if ($value < $min) {
      $min = $value;
    }

    if ($value > $min) {
      $max = $value;
    }
  }

  // Ouput min, max on screen
  echo "Min: $min, Max: $max";
?>
```




## Home work
1. Find the sum of the odd numbers between 0 to 50, output sum value on screen.
2. Completed below function to calculate the [factorial](https://en.wikipedia.org/wiki/Factorial) of a number (a non-negative integer). The function accepts the number as an argument.

```php
<?php
function factorialOfNumber($n)
{
  // Write your source code here
}

echo factorialOfNumber(10);
?>
