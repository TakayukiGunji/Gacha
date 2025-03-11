<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

<?php

// 20250310

$min = 1;
$max = 723;

$card = [ ];

while ( count ( $card ) < 5 ) {
    $num = rand ( $min, $max );
    if ( !in_array ( $num, $card ) ) {
        $card [ ] = $num;
    }
}

for ( $number = 0; $number <= 4; $number++ ) {
?>
    <img src="images/m<?= $card [ $number ] ?>.png" alt="<?= $number ?>枚目">
<?php
}
?>

<form action="PACK-get-function.php" method='post'>
    <a href="PACK-get-function.php" class="button"><span>+ 1 PACK</span></a>
</form>

    <a href="PACK-open-function.php" class="roop"><span>TOP</span></a>