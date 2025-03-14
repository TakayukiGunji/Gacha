<?php
// エラーメッセージを表示する設定
error_reporting(E_ALL);  // すべてのエラーを表示
ini_set('display_errors', 1);  // エラーをブラウザに表示

// スクレイピング対象のURL
$url = "https://gamewith.jp/pokemon-tcg-pocket/462535";

// HTMLデータを取得
$html = file_get_contents($url);
if ($html === false) {
    echo "URLの読み込みに失敗しました。\n";
    exit;
}
echo "HTML取得成功！\n";

// DOM解析の準備
$dom = new DOMDocument();
libxml_use_internal_errors(true);  // HTMLエラーを無視
$dom->loadHTML($html);
libxml_clear_errors();

// XPathで <img> タグを取得
$xpath = new DOMXPath($dom);
$images = $xpath->query("//img");

// テキストファイルに保存する準備
$output_file = "pokemon_alt_texts.txt";
$file = fopen($output_file, "w");

if (!$file) {
    die("⚠ ファイルを開けませんでした！\n");
}

echo "取得した画像の数: " . $images->length . "\n";

// 各画像に対して処理を実施
foreach ($images as $img) {
    $src = $img->getAttribute("src");
    $alt = $img->getAttribute("alt");

    echo "画像URL: $src\n";  // URLが正しく取得されているか確認

    // 画像URLが "m0" から "m700" までに対応するかチェック
    if (preg_match('/m(\d+)\.png$/', $src, $matches)) {
        $image_number = (int) $matches[1];
        echo "マッチした番号: $image_number\n";  // 番号が取得できているか確認

        // m0 から m700 の範囲にマッチ
        if ($image_number >= 0 && $image_number <= 700) {
            if (!empty($alt)) {
                echo "alt: $alt\n";  // altの内容を確認
                $line = "$alt\n";
                if (fwrite($file, $line) === false) {
                    echo "⚠ 書き込み失敗: $alt\n";
                } else {
                    echo "✅ 保存: $alt\n";  // 正常に保存された場合に表示
                }
            }
        }
    }
}

// ファイルを閉じる
fclose($file);

echo "データを $output_file に保存しました！\n";
?>
