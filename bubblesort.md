# Bubble sort

Bubble Sort is the simplest sorting algorithm that works by repeatedly swapping the adjacent elements if they are in wrong order.

## Problem to Solve

Given a list of numbers as shown below, please sort them in ascending order.
```php
$numbers = [5 1 4 2 8];
```

## Pseudocode

Bubble Sort works by comparing two values at a time and does it pair by pair. And it iterates until all elements are in place. 
After each iteration, at least one element is moved to the end of the list. Below is an illustration of Bubble Sort.

1. First Pass:

( **5 1** 4 2 8 ) –> ( **1 5** 4 2 8 ), Here, algorithm compares the first two elements, and swaps since 5 > 1.

( 1 **5 4** 2 8 ) –>  ( 1 **4 5** 2 8 ), Swap since 5 > 4

( 1 4 **5 2** 8 ) –>  ( 1 4 **2 5** 8 ), Swap since 5 > 2

( 1 4 2 **5 8** ) –> ( 1 4 2 **5 8** ), Now, since these elements are already in order (8 > 5), algorithm does not swap them.

2. Second Pass:

( **1 4** 2 5 8 ) –> ( **1 4** 2 5 8 )

( 1 **4 2** 5 8 ) –> ( 1 **2 4** 5 8 ), Swap since 4 > 2

( 1 2 **4 5** 8 ) –> ( 1 2 **4 5** 8 )

( 1 2 4 **5 8** ) –>  ( 1 2 4 **5 8** )

Now, the array is already sorted, but our algorithm does not know if it is completed. The algorithm needs one whole pass without any swap to know it is sorted.

3. Third Pass:

( **1 2** 4 5 8 ) –> ( **1 2** 4 5 8 )

( 1 **2 4** 5 8 ) –> ( 1 **2 4** 5 8 )

( 1 2 **4 5** 8 ) –> ( 1 2 **4 5** 8 )

( 1 2 4 **5 8** ) –> ( 1 2 4 **5 8** )

### Pseudocode of Bubble Sort algorithm can be written as follows:

```php
FOR each element of the list
 
    FOR each element of the list
 
        IF current element greater then next element
 
            swap the elements
 
        END IF
 
    END FOR
 
END FOR

```

## Implementation

### Following is the implementations of Bubble Sort.

```php
<?php  
// PHP program for implementation  
// of Bubble Sort 
  
function bubbleSort(&$arr) 
{ 
    $n = sizeof($arr); 
  
    // Traverse through all array elements 
    for($i = 0; $i < $n; $i++)  
    { 
        // Last i elements are already in place 
        for ($j = 0; $j < $n - $i - 1; $j++)  
        { 
            // traverse the array from 0 to n-i-1 
            // Swap if the element found is greater 
            // than the next element 
            if ($arr[$j] > $arr[$j+1]) 
            { 
                $t = $arr[$j]; 
                $arr[$j] = $arr[$j+1]; 
                $arr[$j+1] = $t; 
            } 
        } 
    } 
} 
  
// Driver code to test above 
$arr = array(5, 3, 1, 9, 8, 2, 4, 7); 
  
$len = sizeof($arr); 
bubbleSort($arr); 
  
echo "Sorted array : \n"; 
  
for ($i = 0; $i < $len; $i++) 
    echo $arr[$i]." ";  
  
?> 
```

### Output 

```php
Sorted array:
1 2 3 4 5 7 8 9
```

### Illustration :

![](./img/bubble-sort1.png)

### Optimized Implementation:

The above function always runs O(n^2) time even if the array is sorted. It can be optimized by stopping the algorithm if inner loop didn’t cause any swap.

```php
<?php  
// PHP Optimized implementation 
// of Bubble sort 
  
// An optimized version of Bubble Sort 
function bubbleSort(&$arr) 
{ 
    $n = sizeof($arr); 
  
    // Traverse through all array elements 
    for($i = 0; $i < $n; $i++) 
    { 
        $swapped = False; 
  
        // Last i elements are already 
        // in place 
        for ($j = 0; $j < $n - $i - 1; $j++) 
        { 
              
            // traverse the array from 0 to 
            // n-i-1. Swap if the element  
            // found is greater than the 
            // next element 
            if ($arr[$j] > $arr[$j+1]) 
            { 
                $t = $arr[$j]; 
                $arr[$j] = $arr[$j+1]; 
                $arr[$j+1] = $t; 
                $swapped = True; 
            } 
        } 
  
        // IF no two elements were swapped 
        // by inner loop, then break 
        if ($swapped == False) 
            break; 
    } 
} 
          
// Driver code to test above 
$arr = array(5, 3, 1, 9, 8, 2, 4, 7); 
$len = sizeof($arr); 
bubbleSort($arr); 
  
echo "Sorted array : \n"; 
  
for($i = 0; $i < $len; $i++) 
    echo $arr[$i]." "; 
      
?> 
```

## Analysis

- Worst and Average Case Time Complexity: O(n^2). Worst case occurs when array is reverse sorted.

- Best Case Time Complexity: O(n). Best case occurs when array is already sorted.

- Auxiliary Space: O(1)
