<?php
echo "スクレイピングを開始します...\n";

$saveName = "pokepokeName.txt";
if ( !is_dir ( $saveName ) ) {
    mkdir ( $saveName, 0777, true );
}

$start = 1;
$end = 800;

for ( $i = $start; $i <= $end; $i++ ) {
    $image_url = '<img src="https://img.gamewith.jp/article_tools/pokemon-tcg-pocket/gacha/m'.$i.'.png" alt="ミツハニー">"';
    $imageAlt = @file_get_contents ( $image_url );

    if ($image_data === false) {
        echo "画像が見つかりません: $image_url\n";
        continue;
    }

    $imgName = $saveName . "m$i.png";
    file_put_contents ( $imgName, $imageAlt );
    echo "保存しました: $imgName\n";
}

echo "スクレイピングが完了しました！\n";
?>
