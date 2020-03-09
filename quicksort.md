# QuickSort

QuickSort picks an element as pivot and partitions the given array around the picked pivot. There are many different versions of quickSort that pick pivot in different ways.

1. Always pick first element as pivot.
2. Always pick last element as pivot (implemented below)
3. Pick a random element as pivot.
4. Pick median as pivot.
The key process in quickSort is partition(). Target of partitions is, given an array and an element x of array as pivot, put x at its correct position in sorted array and put all smaller elements (smaller than x) before x, and put all greater elements (greater than x) after x. All this should be done in linear time.

## The Quicksort function

### Pseudo Code for recursive QuickSort function :

```php
/* low  --> Starting index,  high  --> Ending index */
quickSort(arr[], low, high)
{
    if (low < high)
    {
        /* pi is partitioning index, arr[pi] is now
           at right place */
        pi = partition(arr, low, high);

        quickSort(arr, low, pi - 1);  // Before pi
        quickSort(arr, pi + 1, high); // After pi
    }
}
```
![](./img/QuickSort2.png)

### The Quicksort function
```php
function quicksort(&$array, $left, $right) {
        if($left < $right) {
                $pivotIndex = partition($array, $left, $right);
                quicksort($array,$left,$pivotIndex -1 );
                quicksort($array,$pivotIndex, $right);
        }
}
```

## Partition Algorithm
When dealing with the Quicksort, the goal of the algorithm is to split the array in half then compare the values from the going up, and the top coming down to that pivot value. When the value to the left of the pivot is greater and the value to the right of the pivot is less, the two values change place. This sort continues until the left hand index is greater than the right hand index, at which point, the value of the left hand index is returned.

```php
function partition(&$array, $left, $right) {
    $pivotIndex = floor($left + ($right - $left) / 2);
    $pivotValue = $array[$pivotIndex];
    $i=$left;
    $j=$right;
    while ($i <= $j) {
            while (($array[$i] < $pivotValue) ) {
                    $i++;
            }
            while (($array[$j] > $pivotValue)) {
                    $j--;
            }
            if ($i <= $j ) {
                    $temp = $array[$i];
                    $array[$i] = $array[$j];
                    $array[$j] = $temp;
                    $i++;
                    $j--;
            }
    }
    return $i;
}
```
There are two important items to note on this function:
1. The array is passed by reference into this function. This allows the array to be updated without returning it. If the language you write in doesn’t support pass by reference, there are ways around this, such as: making the array a global value (please don’t), and setting the return to be an array containing both the left hand index and the array we are sorting.

2. When calculating the pivotIndex I added the built-in command floor() to the calculation. Apparently, in C, integer division automatically appears to round down. When I did no rounding at all or the round() command, the script fell into an infinite loop. When I used floor(), the script performed as it expected.

## Following is the implementations of the Quick Sort:
```php
<?php 
function partition(&$array, $left, $right) {
    $pivotIndex = floor($left + ($right - $left) / 2);
    $pivotValue = $array[$pivotIndex];
    $i=$left;
    $j=$right;
    while ($i <= $j) {
            while (($array[$i] < $pivotValue) ) {
                    $i++;
            }
            while (($array[$j] > $pivotValue)) {
                    $j--;
            }
            if ($i <= $j ) {
                    $temp = $array[$i];
                    $array[$i] = $array[$j];
                    $array[$j] = $temp;
                    $i++;
                    $j--;
            }
    }
    return $i;
}

function quicksort(&$array, $left, $right) {
    if($left < $right) {
            $pivotIndex = partition($array, $left, $right);
            quicksort($array,$left,$pivotIndex -1 );
            quicksort($array,$pivotIndex, $right);
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

$arr = array(12, 11, 13, 5, 6); 
$n = sizeof($arr); 
quicksort($arr, 0,count($arr) -1);
printArray($arr, $n); 
```
## Analysis

- Time Complexity: O(n2) as there are two nested loops.
- Auxiliary Space: O(1)
- Sorting In Place: As per the broad definition of in-place algorithm it qualifies as an in-place sorting algorithm as it uses extra space only for storing recursive function calls but not for manipulating the input.
- Stable : The default implementation is not stable. 
