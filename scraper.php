<?php
$url = "https://gamewith.jp/pokemon-tcg-pocket/462535";
$html = file_get_contents($url);

if ($html === false) {
    die("ページの取得に失敗しました！\n");
}

file_put_contents("debug.html", $html);
echo "ページのHTMLを debug.html に保存しました。中身を確認してください。\n";
?>
