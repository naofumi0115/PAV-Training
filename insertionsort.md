# Insertion Sort

Insertion sort works in the similar way as we sort cards in our hand in a card game.

We assume that the first card is already sorted then, we select an unsorted card. If the unsorted card is greater than the card in hand, it is placed on the right otherwise, to the left. In the same way, other unsorted cards are taken and put at their right place.

A similar approach is used by insertion sort.

Insertion sort is a sorting algorithm that places an unsorted element at its suitable place in each iteration.

## Problem to Solve

Given a list of numbers as shown below, please sort them in ascending order.
```php
$numbers = [9, 5, 1, 4, 3];
```

## Pseudocode

Insertion Sort works by maintaining a sorted sub-list, extracting the master list's items one by one and inserting them into a the sub-list until all items are moved from master list to the sub-list.

### How Insertion Sort Works?

1. The first element in the array is assumed to be sorted. Take the second element and store it separately in **key**. Compare key with the first element. If the first element is greater than **key**, then **key** is placed in front of the first elemet.

![](./img/Insertion-sort-0_1.png)

2. Now, the first two elements are sorted. Take the third element and compare it with the elements on the left of it. Placed it just behind the element smaller than it. If there is no element smaller than it, then place it at the begining of the array.

![](./img/Insertion-sort-1_1.png)

3. In a similar way, place every unsorted element at its correct position.

![](./img/Insertion-sort-2_2.png)

![](./img/Insertion-sort-3_2.png)


### Pseudocode of Insertion Sort algorithm can be written as follows:

```php
insertionSort(array)
  mark first element as sorted
  for each unsorted element X
    'extract' the element X
    for j <- lastSortedIndex down to 0
      if current element j > X
        move sorted element to the right by 1
    break loop and insert X here
end insertionSort
```

## Following is the implementations of the Insertion Sort:

```php
<?php  
// PHP program for insertion sort 
  
// Function to sort an array 
// using insertion sort 
function insertionSort(&$arr, $n) 
{ 
    for ($i = 1; $i < $n; $i++) 
    { 
        $key = $arr[$i]; 
        $j = $i-1; 
      
        // Move elements of arr[0..i-1], 
        // that are greater than key, to  
        // one position ahead of their  
        // current position 
        while ($j >= 0 && $arr[$j] > $key) 
        { 
            $arr[$j + 1] = $arr[$j]; 
            $j = $j - 1; 
        } 
          
        $arr[$j + 1] = $key; 
    } 
} 
  
// A utility function to 
// print an array of size n 
function printArray(&$arr, $n) 
{ 
    for ($i = 0; $i < $n; $i++) 
        echo $arr[$i]." "; 
    echo "\n"; 
} 
  
// Driver Code 
$arr = array(12, 11, 13, 5, 6); 
$n = sizeof($arr); 
insertionSort($arr, $n); 
printArray($arr, $n); 
  
?> 
```

## Output 
```php
Sorted array:
5 6 11 12 13
```

## Analysis

- Time Complexity: O(n^2)
- Auxiliary Space: O(1)