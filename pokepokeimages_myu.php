<?php

$pack = 'ミュウ';

echo "$pack . パック\n";

$save_dir = "$pack/";
if ( !is_dir ( $save_dir ) ) {
    mkdir ( $save_dir, 0777, true );
}

$start = 318;
$end = 402; 

for ( $i = $start; $i <= $end; $i++ ) {
    $image_url = "https://img.gamewith.jp/article_tools/pokemon-tcg-pocket/gacha/m$i.png";
    $image_data = @file_get_contents ( $image_url );

    if ( $image_data === false ) {
        echo "画像なし: m$i\n";
        continue;
    }

    $file_name = $save_dir . 'm'.$i.'.png';
    file_put_contents ( $file_name, $image_data );
    echo "画像を取得: $file_name\n";
}

echo "完了\n";
?>
