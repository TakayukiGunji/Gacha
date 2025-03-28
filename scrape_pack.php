<?php
require 'Pack.php';

$packName = 'リザードン';
$cardId = [ 135 ];

$pack = new Pack ( $packName, $cardId );
$pack -> imageDownloads ( );

$cardCount = count ( $cardId );
echo "全{$cardCount}枚";