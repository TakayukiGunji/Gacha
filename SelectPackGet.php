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

        $pack = $_POST [ 'pack' ] ?? null;
        $mode = $_POST [ 'mode' ] ?? null;
        $cards = [  ];

        if ( $pack ) {
            $selector = new CardSelector ( $pdo );

            if ( $mode === 'god' ) {
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
    <link href="https://fonts.googleapis.com/css2?family=Hachi+Maru+Pop&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    if ($mode === 'god'):
    ?>

    <?php
    endif;
    ?>

    <section id="main">
        <?php
        if ( $pack ):
        ?>
            <p class="pack-title"><?= htmlspecialchars ( $packDisplay ) ?></p>
            <div class="card-container">
        <?php      
                $open = new Open (  );
                $open -> packOpen ( $cards );
        ?>
            </div>
        <?php
        else:
        ?>
            <p class="error-message">パック名が指定されていません。POSTで送信してください。</p>
        <?php
        endif;
        ?>
        
        <?php
        if ($mode === 'god'):
        ?>

            <div class="lightning-effect"></div>
            <div class="sparkle-effect"></div>
            <!-- <div class="rainbow-run"></div> -->

            <form action="SelectPackGet.php" method="post">
                <input type="hidden" name="pack" value="<?= htmlspecialchars ( $pack ) ?>">
                <input type="hidden" name="mode" value="god">
                <button type="submit" class="button">
                    <span>もう1回</span>
                </button>
            </form>

        <?php
        else:
        ?>

            <form action="SelectPackGet.php" method="post">
                <input type="hidden" name="pack" value="<?= htmlspecialchars ( $pack ) ?>">
                <button type="submit" class="button">
                    <span>もう1回</span>
                </button>
            </form>
        <?php
        endif;
        ?>

            <a href="index.php" class="roop"><span>TOP</span></a>
    </section>

    <!-- 白エフェクト残らないJS -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const effect = document.querySelector(".lightning-effect");
            if (effect) {
                effect.addEventListener("animationend", () => {
                    effect.remove();
                });
            }
            const sparkle = document.querySelector(".sparkle-effect");
            if (sparkle) {
                sparkle.addEventListener("animationend", () => {
                    sparkle.remove();
                });
            }
        });
    </script>

</body>

</html>



<!-- 色違いのレア度が間違っている！！！！！ 20250421 -->
<!-- ↑ 修正済み 20250422 -->