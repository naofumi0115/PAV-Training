<!DOCTYPE html>
<html>
<body>

  <?php
  function factorialOfNumber($n){
    $odd_number_sum = 0;
    for ($num = 0; $num <= 50; $num++){
      if ($num % 2 == 0){
      }
      else{
        $odd_number_sum = $odd_number_sum + $num;
      }
    }

  $stairs = 1;

  for ($i = 1; $i <= $n; $i++ ){
    $stairs = $stairs * $i;

  }

    echo $stairs;
    echo"<br>";
    echo $odd_number_sum;

  }

  echo factorialOfNumber(10);
  ?>

</body>
</html>
