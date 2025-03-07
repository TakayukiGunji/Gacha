<?php
$pack_1 = rand ( 1, 723);
$pack_2 = rand ( 1, 723);
$pack_3 = rand ( 1, 723);
$pack_4 = rand ( 1, 723);
$pack_5 = rand ( 1, 723);

?>
<img src="images/m<?= $pack_1 ?>.png" alt="ランダムカード">
<img src="images/m<?= $pack_2 ?>.png" alt="ランダムカード">
<img src="images/m<?= $pack_3 ?>.png" alt="ランダムカード">
<img src="images/m<?= $pack_4 ?>.png" alt="ランダムカード">
<img src="images/m<?= $pack_5 ?>.png" alt="ランダムカード">

<form action="PACK-get.php" method='post'>
    <input type="submit" name="submit" value="欲張ってもうパックを引く！">
</form>

