# Algorithm

## Analysis of Algorithms

Algorithm analysis is an important part of computational complexity theory, which provides theoretical estimation for the required resources of an algorithm to solve a specific computational problem. Most algorithms are designed to work with inputs of arbitrary length. Analysis of algorithms is the determination of the amount of time and space resources required to execute it.

Usually, the efficiency or running time of an algorithm is stated as a function relating the input length to the number of steps, known as **time complexity**, or volume of memory, known as **space complexity**.

### Analysis of Algorithms Index
- [A beginner's guide to Big O notation](https://rob-bell.net/2009/06/a-beginners-guide-to-big-o-notation/)
- [Recursive](https://www.elated.com/php-recursive-functions/)

## Sorting Algorithms

A Sorting Algorithm is used to rearrange a given array or list elements according to a comparison operator on the elements. 
The comparison operator is used to decide the new order of element in the respective data structure.

### Sorting Algorithms Index
- [Bubble sort](./bubblesort.md)
- [Selection sort](./selectionsort.md)
- [Insertion sort](./insertionsort.md)
- [Merge sort](./mergesort.md)
- [Quick sort](./quicksort.md)

## Searching Algorithms

Searching Algorithms are designed to check for an element or retrieve an element from any data structure where it is stored. Based on the type of search operation, these algorithms are generally classified into two categories:

### Searching Algorithms Index

- [Sequential Search](./sequentialsearch.md).
- [Binary Search](./binarysearch.md).

## Exercise

### Exercise 1

#### Question: 

Given an array and a number k where k is smaller than size of array, we need to find the k’th smallest element in the given array. It is given that ll array elements are distinct.

#### For example:

**Input**: arr[] = {7, 10, 4, 3, 20, 15}

k = 3

**Output**: 7

**Input**: arr[] = {7, 10, 4, 3, 20, 15}

k = 4

**Output**: 10

#### Solution
Step 1: Sort the given array using a O(N log N) sorting algorithm like [Merge sort](./mergesort.md), [Quick sort](./quicksort.md), etc

Step 2: Return the element at index k-1 in the sorted array.

- Time Complexity of this solution is O(N Log N)

```php
<?php 
// k'th smallest element 
  
// Function to return k'th smallest 
// element in a given array 
function kthSmallest($arr, $n, $k) 
{ 
      
    // Sort the given array 
    sort($arr); 
  
    // Return k'th element  
    // in the sorted array 
    return $arr[$k - 1]; 
} 
  
    // Driver Code 
    $arr = array(12, 3, 5, 7, 19); 
    $n =count($arr); 
    $k = 2; 
    echo "K'th smallest element is "
       , kthSmallest($arr, $n, $k); 
  
?> 
```

### Exercise 2

#### Question: 
A sorted array is rotated at some unknown point, find the minimum element in it.

Following solution assumes that all elements are distinct.

#### For example:

- Example 1: 

Input: {5, 6, 1, 2, 3, 4}

Output: 1

- Example 2: 

Input: {1, 2, 3, 4}

Output: 1

- Example 3:

Input: {2, 1}

Output: 1

#### Solution

A simple solution is to traverse the complete array and find minimum. This solution requires O(n) time.
We can do it in O(Logn) using Binary Search. If we take a closer look at above examples, we can easily figure out following pattern:

- The minimum element is the only element whose previous is greater than it. If there is no previous element element, then there is no rotation (first element is minimum). We check this condition for middle element by comparing it with (mid-1)’th and (mid+1)’th elements.

- If minimum element is not at middle (neither mid nor mid + 1), then minimum element lies in either left half or right half.
	1. If middle element is smaller than last element, then the minimum element lies in left half
	2. Else minimum element lies in right half.

```php
<?php 
// PHP program to find minimum 
// element in a sorted and  
// rotated array 
  
function findMin($arr, $low, $high) 
{ 
    // This condition is needed 
    // to handle the case when  
    // array is not rotated at all 
    if ($high < $low) return $arr[0]; 
  
    // If there is only 
    // one element left 
    if ($high == $low) return $arr[$low]; 
  
    // Find mid 
    $mid = $low + ($high - $low) / 2; /*($low + $high)/2;*/
  
    // Check if element (mid+1) 
    // is minimum element.  
    // Consider the cases like  
    // (3, 4, 5, 1, 2) 
    if ($mid < $high &&  
        $arr[$mid + 1] < $arr[$mid]) 
    return $arr[$mid + 1]; 
  
    // Check if mid itself 
    // is minimum element 
    if ($mid > $low &&  
        $arr[$mid] < $arr[$mid - 1]) 
    return $arr[$mid]; 
  
    // Decide whether we need  
    // to go to left half or  
    // right half 
    if ($arr[$high] > $arr[$mid]) 
    return findMin($arr, $low,  
                   $mid - 1); 
    return findMin($arr, $mid + 1, $high); 
} 
  
// Driver Code 
$arr1 = array(5, 6, 1, 2, 3, 4); 
$n1 = sizeof($arr1); 
echo "The minimum element is " .  
    findMin($arr1, 0, $n1 - 1) . "\n"; 
  
$arr2 = array(1, 2, 3, 4); 
$n2 = sizeof($arr2); 
echo "The minimum element is " .  
    findMin($arr2, 0, $n2 - 1) . "\n"; 
  
$arr3 = array(1); 
$n3 = sizeof($arr3); 
echo "The minimum element is " .  
    findMin($arr3, 0, $n3 - 1) . "\n"; 
  
$arr4 = array(1, 2); 
$n4 = sizeof($arr4); 
echo "The minimum element is " .  
    findMin($arr4, 0, $n4 - 1) . "\n"; 
  
$arr5 = array(2, 1); 
$n5 = sizeof($arr5); 
echo "The minimum element is " .  
    findMin($arr5, 0, $n5 - 1) . "\n"; 
  
$arr6 = array(5, 6, 7, 1, 2, 3, 4); 
$n6 = sizeof($arr6); 
echo "The minimum element is " .  
    findMin($arr6, 0, $n6 - 1) . "\n"; 
  
$arr7 = array(1, 2, 3, 4, 5, 6, 7); 
$n7 = sizeof($arr7); 
echo "The minimum element is " .  
    findMin($arr7, 0, $n7 - 1) . "\n"; 
  
$arr8 = array(2, 3, 4, 5, 6, 7, 8, 1); 
$n8 = sizeof($arr8); 
echo "The minimum element is " .  
    findMin($arr8, 0, $n8 - 1) . "\n"; 
  
$arr9 = array(3, 4, 5, 1, 2); 
$n9 = sizeof($arr9); 
echo "The minimum element is " . 
    findMin($arr9, 0, $n9 - 1) . "\n"; 
?> 
```

## Home work


### Home work 1 (Easy)

#### Question:

We have a integer unsorted array and number m. Each integer of array is in the range from 0 to m-1

Find the smallest number that is missing from the array.

#### For example:
```
Input: {0, 2, 1, 9, 7}, n = 5, m = 10

Output: 3
```

```
Input: {4, 11, 13, 6}, n = 4, m = 12

Output: 0
```

```
Input: {5, 1, 6, 3, 7, 0, 2, 4, 10}, m = 11

Output: 8
```

### Home work 2 (Normal)

#### Question:

- We have 2 integer arrays arr1[] and arr2[] unsorted and an integer k. 

- Find k pairs with smallest sums such that one element of a pair belongs to arr1[] and other element belongs to arr2[]

- Time Complexity : O(nlogn)

#### For example:

**Input**: 

- arr1[] = {11, 7, 1}
- arr2[] = {4, 6, 2}
- k = 3

**Output**: 

- [1, 2], [1, 4], [1, 6]

**Explanation**: 

- The first 3 pairs are returned from the sequence [1, 2], [1, 4], [1, 6], [7, 2], [7, 4], [11, 2], [7, 6], [11, 4], [11, 6]

### Home work 3 (Hard)

#### Question:

- We have an array that is sorted and then rotated around an unknown point.

- For exmaple: sorted array{ 6, 8, 9, 10, 11, 15,} rotated -> {11, 15, 6, 8, 9, 10}

- Find if the array has a pair with a given sum ‘x’. It may be assumed that all elements in the array are distinct.

#### For example:

- Example 1:

```
Input: arr[] = {11, 15, 6, 8, 9, 10}, 
x = 16

Output: true

There is a pair (6, 10) with sum 16v
```


- Example 2:

```
Input: arr[] = {11, 15, 26, 38, 9, 10}, 
x = 35

Output: true

There is a pair (26, 9) with sum 35
```

- Example 3:

```
Input: arr[] = {11, 15, 26, 38, 9, 10}, 
x = 45

Output: false

There is no pair with sum 45.
```
