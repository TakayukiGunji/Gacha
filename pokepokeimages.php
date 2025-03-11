<?php
echo "スクレイピングを開始します...\n";

$save_dir = "images/";
if ( !is_dir ( $save_dir ) ) {
    mkdir ( $save_dir, 0777, true );
}

$start = 1;
$end = 800;

for ( $i = $start; $i <= $end; $i++ ) {
    $image_url = "https://img.gamewith.jp/article_tools/pokemon-tcg-pocket/gacha/m$i.png";
    $image_data = @file_get_contents ( $image_url );

    if ($image_data === false) {
        echo "画像が見つかりません: $image_url\n";
        continue;
    }

    $file_name = $save_dir . "m$i.png";
    file_put_contents ( $file_name, $image_data );
    echo "保存しました: $file_name\n";
}

echo "スクレイピングが完了しました！\n";
?>
