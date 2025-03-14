<?php

$min = 1;
$max = 723;

// $pack_1 = rand ( $min, $max);
// $pack_2 = rand ( 1, 723);
// $pack_3 = rand ( 1, 723);
// $pack_4 = rand ( 1, 723);
// $pack_5 = rand ( 1, 723);

$card = [ ];

while ( count ( $card ) < 5 ) {
    $num = rand ( $min, $max );
    if ( !in_array ( $num, $card ) ) {
        $card [ ] = $num;
    }
}
 ?>
 
<img src="images/m<?= $card [ 0 ] ?>.png" alt="1枚目">
<img src="images/m<?= $card [ 1 ] ?>.png" alt="2枚目">
<img src="images/m<?= $card [ 2 ] ?>.png" alt="3枚目">
<img src="images/m<?= $card [ 3 ] ?>.png" alt="4枚目">
<img src="images/m<?= $card [ 4 ] ?>.png" alt="5枚目">

<form action="PACK-get.php" method='post'>
    <input type="submit" name="submit" value="欲張ってもうパックを引く！">
</form>

