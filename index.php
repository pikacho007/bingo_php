<?php

require_once(__DIR__.'/config.php');
require_once(__DIR__.'/Bingo.php');

$bingo = new \MyApp\Bingo();
$nums = $bingo->create();

/*
B: $nums[0] 1-15
B: $nums[1] 16-30
・・
O:nums[4]

$nums[$i] $i * 15 + 1 ~ $i * 15 + 15
*/

$nums = [];

for ($i = 0; $i < 5; $i++) {
  $col = range($i * 15 + 1, $i * 15 + 15);

  shuffle($col);
  $nums[$i] = array_slice($col,0 ,5);
}

$nums[2][2] = "FREE";

// var_dump($nums);
// exit;



?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>BINGO!🐰</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div id="container">
    <table>
      <tr>
        <th>B</th><th>I</th><th>N</th><th>G</th><th>O</th>
      </tr>
      <?php for ($i = 0; $i < 5; $i++) : ?>
      <tr>
        <?php for ($j = 0; $j < 5; $j++) : ?>
        <td><?= h($nums[$i][$j]); ?></td>
        <?php endfor; ?>
      </tr>
        <?php endfor; ?>
    </table>
  </div> 
</body>
</html>