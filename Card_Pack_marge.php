<?php
$pdo = new PDO ( 'mysql:host=localhost;dbname=PokePoke;charset=utf8', 'admin', 'password' );

// すべてのカードを取得
$cards = $pdo -> query ( "SELECT id, pack FROM CardList" ) -> fetchAll ( PDO::FETCH_ASSOC );

foreach ( $cards as $card ) {
    $cardId = $card [ 'id' ];
    $packList = explode ( '|', $card [ 'pack' ] ); // パック名を分割

    foreach ( $packList as $packName ) {
        $packName = trim ( $packName );

        // pack テーブルからパックのIDを取得（存在しない場合はスキップでもOK）
        $stmt = $pdo -> prepare ( "SELECT id FROM pack WHERE name = ?" );
        $stmt -> execute ( [ $packName ] );
        $pack = $stmt -> fetch ( PDO::FETCH_ASSOC );

        if ( $pack ) {
            $packId = $pack [ 'id' ];

            // 重複登録を防ぎたい場合は先に存在チェックしてもOK（任意）
            $check = $pdo -> prepare ( "SELECT * FROM Card_Pack WHERE card_id = ? AND pack_id = ?" );
            $check -> execute ( [ $cardId, $packId ] );
            if ( !$check -> fetch ( ) ) {
                // 中間テーブルに挿入
                $insert = $pdo -> prepare ( "INSERT INTO Card_Pack ( card_id, pack_id) VALUES ( ?, ? )");
                $insert -> execute ( [ $cardId, $packId ] );
                echo "カードID $cardId をパックID $packId に紐付けました。\n";
            }
        } else {
            echo "⚠ パック名「$packName」が pack テーブルに見つかりませんでした。\n";
        }
    }
}
