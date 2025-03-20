<?php

$pack = 'ピカチュウ';

echo "$pack . パック\n";

$save_dir = "$pack/";
if ( !is_dir ( $save_dir ) ) {
    mkdir ( $save_dir, 0777, true );
}

$id = [ 4, 5, 6, 8, 10, 11, 12, 13, 19, 23, 24, 31, 32, 33, 34, 36, 38, 40, 42, 44, 45, 49, 50, 51, 52, 54, 56, 60, 61, 64, 65, 69, 71, 74, 75, 81, 91, 92, 93, 94, 100, 101, 104, 106, 107, 108, 109, 115, 116, 120, 121, 122, 123, 127, 129, 130, 138, 139, 140, 141, 142, 143, 144, 145, 146, 147, 150, 151, 152, 158, 159, 164, 165, 166, 167, 168, 169, 170, 175, 176, 177, 178, 186, 187, 188, 189, 190, 191, 192, 193, 194, 195, 202, 203, 210, 213, 214, 215, 218, 219, 224, 226, 227, 228, 229, 232, 237, 243, 244, 247, 249, 250, 256, 259, 260, 263, 264, 269, 271, 275, 276, 278, 281, 284, 285, 286 ];

foreach ( $id as $image ) {
    $image_url = "https://img.gamewith.jp/article_tools/pokemon-tcg-pocket/gacha/m$image.png";
    $image_data = file_get_contents ( $image_url );

    if ( $image_data === false ) {
        echo "画像なし: m$i\n";
        continue;
    }

    $file_name = $save_dir . 'm'.$image.'.png';
    file_put_contents ( $file_name, $image_data );
    echo "画像を取得: $file_name\n";
}

echo "終了\n";

?>
