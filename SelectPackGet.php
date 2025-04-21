<!-- 20250312 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="hue.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hachi+Maru+Pop&display=swap" rel="stylesheet">

<body>
    <section id="main">
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


        // --- レア度記号変換関数 ---
        function convertRaritySymbol ( int $rare ): string
        {
            switch ( $rare ) {
                case 8: return '<span class="rare rare-8">👑</span>';
                case 7: return '<span class="rare rare-7">★★★</span>';
                case 6: return '<span class="rare rare-6">★★</span>';
                case 5: return '<span class="rare rare-5">★</span>';
                case 4: return '<span class="rare rare-4">◆◆◆◆</span>';
                case 3: return '<span class="rare rare-3">◆◆◆</span>';
                case 2: return '<span class="rare rare-2">◆◆</span>';
                case 1: return '<span class="rare rare-1">◆</span>';
                default: return '<span class="rare">？</span>';
            }
        }
        
        // --- クラス定義（CardSelector） ---
        class CardSelector {
            private $pdo;
            private $rarityPool;

            public function __construct ( PDO $pdo ) {
                $this -> pdo = $pdo;

                // レア度出現確率（固定）
                $this -> rarityPool = [
                    'first_three' => [ 1 => 100.000 ],
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

            public function selectCards ( $packName ) {
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

            // レア度を抽選する
            private function selectRarity ( array $distribution ) {
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
            private function getRandomCard ( string $packName, int $rarity ) {
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

        // --- 表示用クラス（Open） ---
        class Open {
            public function packOpen ( array $cards )
            {
                foreach ( $cards as $card )
                {
                    if ( $card ) {
                        echo '<div style="text-align:center; display:inline-block; margin:10px;">';
                        echo '<img src="' . $card [ 'image' ] . '" alt="' . $card [ 'name' ] . '" width="250"><br>';
                        echo $card [ 'name' ] . '<br>';
                        echo convertRaritySymbol ( ( int ) $card [ 'rare' ] );
                        echo '</div>';
                    } else {
                        echo '<div>該当カードが見つかりませんでした</div>';
                    }
                }
            }
        }

        // --- メイン処理 ---
        $pdo = new PDO ( 'mysql:host=localhost;dbname=xslive230801_gunnji;charset=utf8', 'xslive230801_gun', 'livebusiness' );

        $packNames =
        [
            'pika' => 'ピカチュウ',
            'riz' => 'リザードン',
            'myu2' => 'ミュウツー',
            'myu' => 'ミュウ',
            'dhia' => 'ディアルガ',
            'pal' => 'パルキア',
            'al'   => 'アルセウス',
            'shai'  => 'シャイニングハイ',
            'ALL'  => '全部'
        ];

        if ( $_SERVER [ 'REQUEST_METHOD' ] === 'POST' ) {
            $pack = $_POST [ 'pack' ] ?? null;

            if ( $pack ) {
                $selector = new CardSelector ( $pdo );
                $cards = $selector -> selectCards ( $pack );

                $packDisplay = $packNames [ $pack ] ?? $pack;

                echo "<p style='font-size: 35px; font-weight: 3000; text-align: center;'>{$packDisplay}&nbsp;パック</p>";
                echo "<div style='display:flex; gap:20px; flex-wrap: wrap;'>";

                $open = new Open (  );
                $open -> packOpen ( $cards );

                echo "</div>";
            } else {
                echo "パック名が指定されていません。";
            }
        } else {
            echo "POSTで送信してください。";
        }
        ?>
        
        <form action="SelectPackGet.php" method="post">
            <input type="hidden" name="pack" value="<?= htmlspecialchars ( $pack ) ?>">
            <button type="submit" class="button"><span>1&nbsp;PACK</span></button>
        </form>

            <a href="index.php" class="roop"><span>TOP</span></a>
    </section>
</body>

</html>



<!-- 色違いのレア度が間違っている！！！！！ 20250421 -->