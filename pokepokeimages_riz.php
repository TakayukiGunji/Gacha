<?php

$pack = 'リザードン';

echo $pack."パック\n";

$save_dir = "$pack/";
if ( !is_dir ( $save_dir ) ) {
    mkdir ( $save_dir, 0777, true );
}

$id = [ 2, 3, 4, 6, 12, 13, 20, 21, 24, 25, 26, 27, 29, 34, 39, 41, 42, 43, 45, 46, 47, 49, 55, 57, 58, 63, 64, 65, 66, 67, 68, 79, 80, 84, 85, 86, 87, 88, 89, 91, 92, 93, 94, 95, 96, 97, 98, 99, 102, 103, 104, 106, 109, 110, 111, 112, 124, 125, 126, 128, 133, 134, 136, 136, 137, 138, 139, 140, 146, 147, 150, 151, 153, 154, 164, 165, 166, 167, 168, 169, 171, 172, 173, 174, 181, 184, 185, 187, 188, 189, 190, 201, 202, 203, 204, 210, 211, 212, 216, 217, 218, 219, 221, 226, 227, 228, 230, 233, 236, 239, 240, 241, 242, 245, 246, 258, 261, 267, 270, 272, 277, 280, 282, 284, 285, 286 ];

foreach ( $id as $image ) {
    $image_url = "https://img.gamewith.jp/article_tools/pokemon-tcg-pocket/gacha/m$image.png";
    $image_data = file_get_contents ( $image_url );

    if ( $image_data === false ) {
        echo "画像なし: m$image\n";
        continue;
    }

    $file_name = $save_dir . 'm'.$image.'.png';
    file_put_contents ( $file_name, $image_data );
    echo "画像を取得: $file_name\n";
}

echo "終了\n";

?>
