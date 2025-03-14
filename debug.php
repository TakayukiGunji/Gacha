<?php
// スクレイピング対象のURL
$url = "https://gamewith.jp/pokemon-tcg-pocket/462535";
$html = file_get_contents($url);

// DOM解析の準備
$dom = new DOMDocument();
libxml_use_internal_errors(true);
$dom->loadHTML($html);
libxml_clear_errors();

// XPathで <img> タグを取得
$xpath = new DOMXPath($dom);
$images = $xpath->query("//img");

echo "取得した画像の数: " . $images->length . "\n";

foreach ($images as $img) {
    $src = $img->getAttribute("src");
    $alt = $img->getAttribute("alt");
    
    echo "画像URL: $src\n";
    echo "alt: $alt\n";
    echo "----------------------\n";
}
?>
