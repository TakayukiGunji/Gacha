<?php

// 1〜3枚目のカード排出確率
// 1:100%

// 4枚目のカード排出確率
// 8:0.040%
// 7:0.222%
// 6:0.500%
// 5:2.572%
// 4:1.666%
// 3:5.000%
// 2:90.000%

// 5枚目のカード排出確率
// 8:0.160%
// 7:0.888%
// 6:2.000%
// 5:10.288%
// 4:6.664%
// 3:20.000%
// 2:60.000%

// 👑👑👑👑👑👑👑👑👑👑👑👑👑👑👑👑👑👑👑👑👑

// 8:5.000%
// 7:5.000%
// 6:50.000%
// 5:40.000%

// --- クラス定義（CardSelector） ---
        class CardSelector {
            private $pdo;
            private $rarityPool;

            public function __construct ( PDO $pdo ) {
                $this -> pdo = $pdo;

                // レア度出現確率（固定）
                $this -> rarityPool = [
                    'first_three' =>
                    [
                        1 => 100.000
                    ],
                    'fourth' => 
                    [
                        8 => 0.040,
                        7 => 0.222,
                        6 => 0.500,
                        5 => 2.572,
                        4 => 1.666,
                        3 => 5.000,
                        2 => 90.000
                    ],
                    'fifth' =>
                    [
                        8 => 0.160,
                        7 => 0.888,
                        6 => 2.000,
                        5 => 10.288,
                        4 => 6.664,
                        3 => 20.000,
                        2 => 60.000
                    ]
                ];
            }

            // 通常パック
            public function selectCards ( $packName )
            {
                $selectedCards = [  ];

                // 1〜3枚目（レア度1）
                for ( $i = 0; $i < 3; $i++ ) {
                    $rarity = $this -> selectRarity ( $this -> rarityPool [ 'first_three' ] );
                    $selectedCards [  ] = $this -> getRandomCard ( $packName, $rarity );
                }

                // 4枚目
                $rarity = $this -> selectRarity ( $this -> rarityPool [ 'fourth' ] );
                $selectedCards [  ] = $this -> getRandomCard ( $packName, $rarity );

                // 5枚目
                $rarity = $this -> selectRarity ( $this -> rarityPool [ 'fifth' ] );
                $selectedCards [  ] = $this -> getRandomCard ( $packName, $rarity );

                return $selectedCards;
            }

            // GODパック
            public function selectGodPack ( string $packName ): array
            {
                if ( $packName === 'all' ) {
                    $stmt = $this -> pdo -> prepare ( "SELECT * FROM CardList WHERE rare >= 5 ORDER BY RAND() LIMIT 5" );
                    $stmt -> execute (  );
                    $cards = $stmt -> fetchAll ( PDO::FETCH_ASSOC );

                    // 画像パスを追加
                    foreach ($cards as &$card) {
                    $card['image'] = 'images/m' . $card['id'] . '.png';
                    }
                    return $cards;
                }

                $selectedCards = [  ];
        
                $rarityPool =
                [
                    8 => 5.000,
                    7 => 5.000,
                    6 => 50.000,
                    5 => 40.000
                ];
        
                for ($i = 0; $i < 5; $i++ ) {
                    $rarity = $this -> selectRarity ( $rarityPool );
                    $selectedCards [  ] = $this -> getRandomCard ( $packName, $rarity );
                }
        
                return $selectedCards;
            }

            // レア度を抽選する
            private function selectRarity ( array $distribution )
            {
                $rand = mt_rand (  ) / mt_getrandmax (  ) * 100;
                $cumulative = 0;

                foreach ( $distribution as $rarity => $chance ) {
                    $cumulative += $chance;
                    if ( $rand <= $cumulative ) {
                        return $rarity;
                    }
                }

                return array_key_last ( $distribution );
            }

            // 指定のパック名＆レア度で1枚ランダム取得
            private function getRandomCard ( string $packName, int $rarity ) 
            {
                $stmt = $this -> pdo -> prepare
                ( "SELECT CardList.* FROM CardList JOIN Card_Pack ON CardList.id = Card_Pack.card_id JOIN pack ON pack.id = Card_Pack.pack_id WHERE pack.name = ? AND CardList.rare = ? ");
                $stmt -> execute ( [ $packName, $rarity ] );
                $cards = $stmt -> fetchAll ( PDO::FETCH_ASSOC );

                if ( count ( $cards ) === 0) {
                    return null;
                }

                return $cards [ array_rand ( $cards ) ];
            }
        }

?>