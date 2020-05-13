<!DOCTYPE html>
<html>
<body>

  <?php

  function factorialOfNumber($n){

    $stairs = 1;

    for ($i = 1; $i <= $n; $i++ ){
      $stairs = $stairs * $i;
    }

    echo $stairs;

  }

  echo factorialOfNumber(10);
  ?>

</body>
</html>
