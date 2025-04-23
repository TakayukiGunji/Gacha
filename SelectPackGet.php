<!-- 20250312 -->

        <?php

        require_once __DIR__ . '/config/database.php';
        require_once __DIR__ . '/functions.php';
        require_once __DIR__ . '/classes/CardSelector.php';
        require_once __DIR__ . '/classes/Open.php';
        
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

        $pack = $_POST [ 'pack' ] ?? null;
        $mode = $_POST [ 'mode' ] ?? null;
        $cards = [  ];

        if ( $pack ) {
            $selector = new CardSelector ( $pdo );

            if ( $mode === 'god' ) {
                $cards = $selector -> selectGodPack ( $pack );
                $packDisplay = "GODパック：" . ( $packNames [ $pack ] ?? $pack );
            } else {
                $cards = $selector -> selectCards ( $pack );
                $packDisplay = ( $packNames [ $pack ] ?? $pack ) . 'パック';
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
    <style>
        .lightning-effect {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(255, 255, 255, 0.7);
            z-index: 9999;
            animation: flash 0.3s ease-in-out 3;
            pointer-events: none;
        }

        @keyframes flash {
            0%   { opacity: 0; }
            50%  { opacity: 1; }
            100% { opacity: 0; }
        }
    </style>
</head>

<body>
    <section id="main">
        <?php
        if ( $pack ):
        ?>
            <p class="pack-title"><?= htmlspecialchars ( $packDisplay ) ?>&nbsp;パック</p>
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
        
        <?php if ($mode === 'god'): ?>
            <form action="SelectPackGet.php" method="post">
                <input type="hidden" name="pack" value="<?= htmlspecialchars ( $pack ) ?>">
                <input type="hidden" name="mode" value="god">
                <button type="submit" class="button">
                    <span>1&nbsp;PACK</span>
                </button>
            </form>
        <?php
        else:
        ?>
            <form action="SelectPackGet.php" method="post">
                <input type="hidden" name="pack" value="<?= htmlspecialchars ( $pack ) ?>">
                <button type="submit" class="button">
                    <span>1&nbsp;PACK</span>
                </button>
            </form>
        <?php
        endif;
        ?>

            <a href="index.php" class="roop"><span>TOP</span></a>
    </section>
</body>

</html>



<!-- 色違いのレア度が間違っている！！！！！ 20250421 -->
<!-- ↑ 修正済み 20250422 -->