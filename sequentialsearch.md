# Sequential Search

A sequential Search or linear search sequentially checks each element of the list until it finds an element that matches the target value. If the algorithm reaches the end of the list, the search terminates unsuccessfully

## Problem

Given an array arr[] of n elements, write a function to search a given element x in arr[].

## Examples :

```php
Input : arr[] = {10, 20, 80, 30, 60, 50, 
                     110, 100, 130, 170}
          x = 110;
Output : 6
Element x is present at index 6

Input : arr[] = {10, 20, 80, 30, 60, 50, 
                     110, 100, 130, 170}
           x = 175;
Output : -1
Element x is not present in arr[].
```

## Flowchart of the Sequential Search:

1. Start from the leftmost element of arr[] and one by one compare x with each element of arr[]
2. If x matches with an element, return the index.
3. If x doesn’t match with any of elements, return -1.

![](./img/linear-search.png)

## Following is the implementations of the Sequential Search:
```php
<?php 
// PHP code for linearly search x in arr[].  
// If x is present then return its location,  
// otherwise return -1  
  
function search($arr, $x) 
{ 
    $n = sizeof($arr); 
    for($i = 0; $i < $n; $i++) 
    { 
        if($arr[$i] == $x) 
            return $i; 
    } 
    return -1; 
} 
  
// Driver Code 
$arr = array(2, 3, 4, 10, 40);  
$x = 10; 
      
$result = search($arr, $x); 
if($result == -1) 
    echo "Element is not present in array"; 
else
    echo "Element is present at index " , 
                                 $result; 

?>  
```

## Output 
```php
Element is present at index 3
```

## Analysis

- Time Complexity: O(n)
