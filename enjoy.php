<?php

// 画像を保存するフォルダ（なければ作成）
$save_dir = "images/";
if (!is_dir($save_dir)) {
    mkdir($save_dir, 0777, true);
}

// 画像の番号範囲（例：000 〜 999）
$start = 0;  // 8進数にならないように修正
$end = 999;  // m999.png まで取得

for ($i = $start; $i <= $end; $i++) {
    // 画像URLを作成（ゼロパディング対応）
    $image_url = "https://img.gamewith.jp/article_tools/pokemon-tcg-pocket/gacha/" . sprintf("m%03d.png", $i);

    // 画像を取得
    $image_data = @file_get_contents($image_url);

    // 画像が存在しない場合はスキップ
    if ($image_data === false) {
        echo "画像が見つかりません: $image_url\n";
        continue;
    }

    // 保存ファイル名
    $file_name = $save_dir . sprintf("m%03d.png", $i);

    // 画像を保存
    file_put_contents($file_name, $image_data);
    echo "保存しました: $file_name\n";
}

echo "画像の取得が完了しました！\n";

?>
