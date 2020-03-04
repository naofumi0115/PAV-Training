# Insertion Sort

Insertion sort is a simple sorting algorithm that works the way we sort playing cards in our hands.

## Step-by-step example:
()[./img/insertionsort.png]

## Flowchart of the Insertion Sort:
()[/.img/insertionsort.png]

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
        // that are    greater than key, to  
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

- Time Complexity: O(n*2)
- Auxiliary Space: O(1)
- Sorting In Place: Yes
- Stable : The default implementation is not stable. 