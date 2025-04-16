<?php
$pdo = new PDO ( 'mysql:host=localhost;dbname=PokePoke;charset=utf8', 'admin', 'password' );

// 例：データ1件を追加

$sql = "INSERT INTO CardList ( number, name, image, rare ) VALUES (?, ?, ?, ?)";
$stmt = $pdo -> prepare ( $sql );
$stmt -> execute ( [ 1, 'ピカチュウ', 'pikachu.png', 5, '拡張パック' ] );
echo "データを挿入しました。\n";


while ( )
    INSERT INTO PokePoke VALUES ( NULL, $name, $image, $rare );

try {
    $pdo = new PDO('mysql:host=localhost;dbname=PokePoke;charset=utf8', 'admin', 'password');

    $csvUrl = "https://docs.google.com/spreadsheets/d/e/2PACX-1vTOna8gMsTbZHFwKAdiBFWpphTi8QHBWChPETtU0_ndzE4vt2GKy45skap7NUfOnpqk6d8Qx0eKarAv/pub?gid=2065395659&single=true&output=csv";
    $csv = file_get_contents ( $csvUrl );

    // 1行ずつ配列に
    $rows = array_map ( "str_getcsv", explode ( "\n", $csv ) );

    // ヘッダー行を除く（もしあるなら）
    array_shift ( $rows );

    foreach ( $rows as $row ) {
        // 空行を除外
        if ( count ( $row ) < 5 ) continue;

        $sql = "INSERT INTO CardList ( number, name, image, rare, pack ) VALUES ( ?, ?, ?, ?, ? )";
        $stmt = $pdo -> prepare ( $sql );
        $stmt -> execute ( [
            $row [ 0 ], // number
            $row [ 1 ], // name
            $row [ 2 ], // image
            $row [ 3 ], // rare
            $row [ 4 ]  // pack（ここは後で pack テーブルとの関連にできる）
        ] );
    }

    echo "CSVのデータを挿入しました。\n";

} catch ( PDOException $e ) {
    echo "DBエラー: " . $e -> getMessage ( ) . "\n";
}
?>


https://docs.google.com/spreadsheets/d/e/2PACX-1vTOna8gMsTbZHFwKAdiBFWpphTi8QHBWChPETtU0_ndzE4vt2GKy45skap7NUfOnpqk6d8Qx0eKarAv/pub?gid=2065395659&single=true&output=csv