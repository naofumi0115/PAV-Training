# Binary Search

Search a sorted array by repeatedly dividing the search interval in half. 
Begin with an interval covering the whole array. If the value of the search key is less than the item in the middle of the interval, narrow the interval to the lower half. Otherwise narrow it to the upper half. 
Repeatedly check until the value is found or the interval is empty.

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

## Flowchart of the Binary Search:

1. Compare x with the middle element.
2. If x matches with middle element, we return the mid index.
3. Else If x is greater than the mid element, then x can only lie in right half subarray after the mid element. So we recur for right half.
4. Else (x is smaller) recur for the left half.

![](./img/Binary-Search.png)

## Following is the implementations of the Binary Search:

1. Recursive implementation of Binary Search

```php
<?php 
// PHP program to implement 
// recursive Binary Search 
  
// A recursive binary search 
// function. It returns location 
// of x in given array arr[l..r]  
// is present, otherwise -1 
function binarySearch($arr, $l, $r, $x) 
{ 
	if ($r >= $l) 
	{ 
        $mid = ceil($l + ($r - $l) / 2); 
  
        // If the element is present  
        // at the middle itself 
        if ($arr[$mid] == $x)  
            return floor($mid); 
  
        // If element is smaller than  
        // mid, then it can only be  
        // present in left subarray 
        if ($arr[$mid] > $x)  
            return binarySearch($arr, $l, $mid - 1, $x); 
  
        // Else the element can only  
        // be present in right subarray 
        return binarySearch($arr, $mid + 1, $r, $x); 
	} 
  
	// We reach here when element  
	// is not present in array 
	return -1; 
} 
  
// Driver Code 
$arr = array(2, 3, 4, 10, 40); 
$n = count($arr); 
$x = 10; 
$result = binarySearch($arr, 0, $n - 1, $x); 
if(($result == -1)) 
	echo "Element is not present in array"; 
else
	echo "Element is present at index ", $result; 
```

2. Iterative implementation of Binary Search

```php
<?php 
// PHP program to implement 
// iterative Binary Search 
  
// A iterative binary search  
// function. It returns location  
// of x in given array arr[l..r]  
// if present, otherwise -1 
function binarySearch($arr, $l, $r, $x) 
{ 
    while ($l <= $r) 
    { 
        $m = $l + ($r - $l) / 2; 
  
        // Check if x is present at mid 
        if ($arr[$m] == $x) 
            return floor($m); 
  
        // If x greater, ignore 
        // left half 
        if ($arr[$m] < $x) 
            $l = $m + 1; 
  
        // If x is smaller,  
        // ignore right half 
        else
            $r = $m - 1; 
    } 
  
    // if we reach here, then  
    // element was not present 
    return -1; 
} 
  
// Driver Code 
$arr = array(2, 3, 4, 10, 40); 
$n = count($arr); 
$x = 10; 
$result = binarySearch($arr, 0,  
                       $n - 1, $x); 
if(($result == -1)) 
	echo "Element is not present in array"; 
else
	echo "Element is present at index ", $result; 
  
?> 
```

## Output 
```php
Element is present at index 3
```

## Analysis

- Time Complexity: O(Logn)
