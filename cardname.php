<?php
// スクレイピング対象のURL
$url = "https://gamewith.jp/pokemon-tcg-pocket/462535";

// HTMLデータを取得
$html = file_get_contents($url);

// DOM解析の準備
$dom = new DOMDocument();
libxml_use_internal_errors(true); // HTMLエラーを無視
$dom->loadHTML($html);
libxml_clear_errors();

// XPathで <img> タグを取得
$xpath = new DOMXPath($dom);
$images = $xpath->query("//img");

// テキストファイルに保存する準備
$output_file = "pokemon_images.txt";
$file = fopen($output_file, "w");

// 画像リストを取得して処理
foreach ($images as $img) {
    $src = $img->getAttribute("src");
    $alt = $img->getAttribute("alt");

    // URLが "mXX.png" の形式かチェック
    if (preg_match('/m(\d+)\.png$/', $src, $matches)) {
        $file_name = "m" . $matches[1] . ".png";
        $line = "$file_name : $alt\n";
        fwrite($file, $line);
        echo $line; // ターミナルにも出力
    }
}

// ファイルを閉じる
fclose($file);

echo "データを $output_file に保存しました！\n";
?>
