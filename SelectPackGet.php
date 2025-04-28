<!-- 20250312 -->

        <?php

        require_once __DIR__ . '/config/database.php';
        require_once __DIR__ . '/functions.php';
        require_once __DIR__ . '/classes/CardSelector.php';
        require_once __DIR__ . '/classes/Open.php';
        
        $packNames =
        [
            'pika' => '最強の遺伝子 ピカチュウ',
            'riz' => '最強の遺伝子 リザードン',
            'myu2' => '最強の遺伝子 ミュウツー',
            'myu' => '幻のいる島',
            'dhia' => '時空の激闘 ディアルガ',
            'pal' => '時空の激闘 パルキア',
            'al'   => '超克の光',
            'shai'  => 'シャイニングハイ',
            'ALL'  => '全部'
        ];

        $packImages =
        [
            'pika' => 'pika_pack.jpg',
            'riz' => 'riz_pack.jpg',
            'myu2' => 'myu2_pack.jpg',
            'myu' => 'myu_pack.jpg',
            'dhia' => 'dia_pack.jpg',
            'pal' => 'pal_pack.jpg',
            'al' => 'al_pack.jpg',
            'shai' => 'shai_pack.jpg',
            'all_god' => 'All_God_pack.jpg'
        ];

        $pack = $_POST [ 'pack' ] ?? null;
        $mode = $_POST [ 'mode' ] ?? null;
        $cards = [  ];
        $packDisplay = '';

        if ( $pack ) {
            $selector = new CardSelector ( $pdo );

            if ( $pack === 'all_god' && $mode === 'god' ) {
                $cards = $selector -> selectAllGodPack (  );
                $packDisplay = 'GOD';
            } else if ( $mode === 'god' ) {
                $cards = $selector -> selectGodPack ( $pack );
                $packDisplay = ( $packNames [ $pack ] ?? $pack );
            } else {
                $cards = $selector -> selectCards ( $pack );
                $packDisplay = ( $packNames [ $pack ] ?? $pack );
            }
        }

        ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset ( $packDisplay ) ? $packDisplay . 'パック' : 'パック選択' ?></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="hue.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Hachi maru -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Hachi+Maru+Pop&display=swap" rel="stylesheet"> -->
    <!-- Zen maru -->
    <link href="https://fonts.googleapis.com/css2?family=Hachi+Maru+Pop&family=Zen+Maru+Gothic&display=swap" rel="stylesheet">

</head>

<body>
    <section id="main">
        <div class="logo">
            <img src="PokePoke_logo.png" alt="PokePoke_logo">
        </div>
        <div id="card_container">
            <div id="get_pack">

                <?php
                    if ( isset ( $pack ) && isset ( $packImages [ $pack ] ) ):
                ?>
                        <form action="SelectPackGet.php" method="post">
                            <input type="hidden" name="pack" value="<?= htmlspecialchars($pack) ?>">
                            <input type="hidden" name="mode" value="<?= htmlspecialchars($mode) ?>">
                            <button type="submit" style="border: none; background: none; padding: 0;">
                                <?php if (isset($packImages[$pack])): ?>
                                    <img src="/enjoy/pack_images/<?= htmlspecialchars($packImages[$pack]) ?>" alt="<?= htmlspecialchars($packNames[$pack] ?? 'パック名不明') ?>" id="get_pack_image">
                                <?php else: ?>
                                    <p>パック画像が見つかりませんでした。</p>
                                <?php endif; ?>
                            </button>
                        </form>
                        <p class="pack-title"><?= htmlspecialchars ( $packDisplay ) ?></p>
                <?php  
                    else:
                ?>
                        <p>パック画像が見つかりませんでした。</p>
                <?php    
                    endif;
                ?>

                </div>

        <?php   $open = new Open (  );
                $cardDataList = $open -> packOpen ( $cards );

                foreach ( $cardDataList as $data ):
                    if ( $data ): ?>
                        <div class="card_image">
                            <img src="<?= htmlspecialchars ( $data [ 'image' ] ) ?>" alt="<?= htmlspecialchars ( $data [ 'name' ] ) ?>">
                            <p><?= htmlspecialchars ( $data [ 'name' ] ) ?></p>
                            <p id="rare_symbol"><?= $data [ 'rare_symbol' ] ?></p>
                        </div>
        <?php else: ?>
                        <div>
                            <p>該当カードが見つかりませんでした</p>
                        </div>
        <?php       endif;
                endforeach; ?>
        </div>

            <div id="two_button">
                <div class="center-more-button">
                    <form action="SelectPackGet.php" method="post">
                        <input type="hidden" name="pack" value="<?= htmlspecialchars($pack) ?>">
                        <?php if ($mode === 'god'): ?>
                            <input type="hidden" name="mode" value="god">
                        <?php endif; ?>
                        <button type="submit" class="more_button">
                            <span>MORE</span>
                        </button>
                    </form>
                </div>

                <div class="center-top-button">
                    <a href="index.php" class="roop">
                        <button class="top_button">
                            <span>TOP</span>
                        </button>
                    </a>
                </div>
            </div>

            
            <!-- フラッシュエフェクト -->
            <div class="lightning-effect" style="display: none;"></div>
            
            <?php
            $hasHighRare = false;
            foreach ($cardDataList as $data) {
                if ($data && (int)$data['rare'] >= 4) {
                    $hasHighRare = true;
                    break; // 1枚でもあれば即終了
                }
            }
            ?>

    </section>

    <script>
        // エフェクト残らないJS
        const hasHighRare = <?= $hasHighRare ? 'true' : 'false' ?>;

        document.addEventListener ( "DOMContentLoaded", (  ) => {
            if ( hasHighRare ) {
                const effect = document.querySelector ( ".lightning-effect" );
                if ( effect ) {
                    effect.addEventListener ( "animationend", (  ) => {
                        effect.remove (  );
                    } );
                    effect.style.display = "block"; // フラッシュ発動！
                }
            }
        } );

        // エンターキー押下でMOREボタン起動
        document.addEventListener ( "keydown", function ( event ) {
            if ( event.key === "Enter" ) {
                event.preventDefault (  ); // ページのリロードを防ぐ
                const moreButton = document.querySelector ( ".more_button" );
                if ( moreButton ) {
                    moreButton.click (  );
                }
            }
        } );
        
        // カード画像クリック→モーダルで拡大
        document.addEventListener("DOMContentLoaded", function() {
            const modal = document.getElementById("modal");
            const modalImg = document.getElementById("modal-img");
            const closeBtn = document.getElementById("close");

            const cardImages = document.querySelectorAll(".card_image img");

            cardImages.forEach(img => {
                img.addEventListener("click", function() {
                    modal.style.display = "flex"; // モーダルを表示
                    modalImg.src = this.src; // 押した画像のsrcをモーダルにセット
                });
            });

            closeBtn.addEventListener("click", function() {
                modal.style.display = "none"; // モーダルを閉じる
            });

            modal.addEventListener("click", function(e) {
                if (e.target === modal) { // モーダルの背景をクリックしても閉じる
                    modal.style.display = "none";
                }
            });
        });

    </script>

        <!-- モーダル本体 -->
    <div id="modal" class="modal">
        <!-- 閉じるボタン -->
        <span id="close">&times;</span>
        <!-- モーダル内に表示する画像 -->
        <img class="modal-content" id="modal-img">
    </div>


</body>
</html>