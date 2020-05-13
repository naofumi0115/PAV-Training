<!DOCTYPE html>
<html>
<body>

  <?php

    $odd_number_sum = 0;

    for ($num = 0; $num <= 50; $num++){
      if ($num % 2 == 1){
        $odd_number_sum = $odd_number_sum + $num;
      }
      else{
      }
    }
    
    echo $odd_number_sum;

  ?>

</body>
</html>
