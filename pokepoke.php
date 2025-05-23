<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poké&nbsp;Poke&emsp;歓喜のち虚無</title>
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
    
<section id="main" >
    
    <div id="logo">
        <img src="PokePoke_logo.png" alt="PokePoke_logo">
    </div>
    
    <div id="kyomu">
        <h1>歓喜<span>&emsp;のち&emsp;</span>虚無</h1>
    </div>
    <div id="message">
        <p>あなたは&nbsp;カードパックを&nbsp;際限なく&nbsp;引きたいと&nbsp;思ったことはありませんか？</p>
        <p>あなたは&nbsp;噂の&nbsp;<span id="god_font">ゴッドパック</span>&nbsp;を引いたことがありますか？</p>
        <p>そんな&nbsp;あなたへ</p>
        <p>ご用意&nbsp;いたしました</p>
    </div>
    
    <div class="pack_img">
              
        <section id="series">
            <div class="series">
                <p>最強の遺伝子</p>
            </div>
            <!-- ピカチュウパック -->
            <div id="pika_pack">
                <p class="pack_name">ピカチュウ</p>
            <!-- <div class="pack_wrapper"> -->
                <form action="SelectPackGet.php" method='post'>
                    <button type="submit" name="pack" value="pika">
                    <?php $delay = rand(10, 100) / 10; // 0.0〜5.0秒 ?>
                        <div class="hover_wrapper">
                            <div class="glow_wrapper" style="--shine-delay: <?= $delay ?>s;">
                                <img src="pack_images/pika_pack.jpg" alt="ピカチュウ パック" class="pack_image">
                            </div>
                        </div>
                    </button>
                </form>
                <!-- <div class="shine_layer"></div> ← shineは画像と重ねる -->
            <!-- </div> -->
                <form action="SelectPackGet.php" method="post">
                    <input type="hidden" name="pack" value="pika">
                    <input type="hidden" name="mode" value="god">
                    <button type="submit" class="pika_button">
                        <span>GOD</span>
                    </button>
                </form>
            </div>
            <!-- リザードンパック -->
            <div id="riz_pack">
                <div>
                    <p class="pack_name">リザードン</p>
                </div>
                <form action="SelectPackGet.php" method='post'>
                    <button type="submit" name="pack" value="riz">
                    <?php $delay = rand(10, 100) / 10; // 0.0〜5.0秒 ?>
                    <div class="hover_wrapper">
                        <div class="glow_wrapper" style="--shine-delay: <?= $delay ?>s;">
                            <img src="pack_images/riz_pack.jpg" alt="リザードン パック" class="pack_image">
                            <div class="shine"></div>
                        </div>
                    </div>
                    </button>
                </form>
                <form action="SelectPackGet.php" method="post">
                    <input type="hidden" name="pack" value="riz">
                    <input type="hidden" name="mode" value="god">
                    <button type="submit" class="riz_button">
                        <span>GOD</span>
                    </button>
                </form>
            </div>
            <!-- ミュウツーパック -->
            <div id="myu2_pack">
                <div>
                    <p class="pack_name">ミュウツー</p>
                </div>
                <form action="SelectPackGet.php" method='post'>
                    <button type="submit" name="pack" value="myu2">
                    <?php $delay = rand(10, 100) / 10; // 0.0〜5.0秒 ?>
                    <div class="hover_wrapper">
                        <div class="glow_wrapper" style="--shine-delay: <?= $delay ?>s;">
                            <img src="pack_images/myu2_pack.jpg" alt="ミュウツー パック" class="pack_image">
                            <div class="shine"></div>
                            </div>
                    </div>
                    </button>
                </form>
                <form action="SelectPackGet.php" method="post">
                    <input type="hidden" name="pack" value="myu2">
                    <input type="hidden" name="mode" value="god">
                    <button type="submit" class="myu2_button">
                        <span>GOD</span>
                    </button>
                </form>
            </div>
        </section>

        <section id="series">
            <div class="series">
                <p>時空の激闘</p>
            </div>
            <!-- ディアルガパック -->
            <div id="dia_pack">
                <div>
                    <p class="pack_name">ディアルガ</p>
                </div>
                <form action="SelectPackGet.php" method='post'>
                    <button type="submit" name="pack" value="dhia">
                    <?php $delay = rand(10, 100) / 10; // 0.0〜5.0秒 ?>
                    <div class="hover_wrapper">
                        <div class="glow_wrapper" style="--shine-delay: <?= $delay ?>s;">
                            <img src="pack_images/dia_pack.jpg" alt="ディアルガ パック" class="pack_image">
                            <div class="shine"></div>
                        </div>
                    </div>
                    </button>
                </form>
                                
                <form action="SelectPackGet.php" method="post">
                    <input type="hidden" name="pack" value="dhia">
                    <input type="hidden" name="mode" value="god">
                    <button type="submit" class="dia_button">
                        <span>GOD</span>
                    </button>
                </form>
            </div>
                    
            <!-- パルキアパック -->
            <div id="pal_pack">
                <div>
                    <p class="pack_name">パルキア</p>
                </div>
                <form action="SelectPackGet.php" method='post'>
                    <button type="submit" name="pack" value="pal">
                    <?php $delay = rand(10, 100) / 10; // 0.0〜5.0秒 ?>
                    <div class="hover_wrapper">
                        <div class="glow_wrapper" style="--shine-delay: <?= $delay ?>s;">
                            <img src="pack_images/pal_pack.jpg" alt="パルキア パック" class="pack_image">
                            <div class="shine"></div>
                        </div>
                    </div>
                    </button>
                </form>
                
                <form action="SelectPackGet.php" method="post">
                    <input type="hidden" name="pack" value="pal">
                    <input type="hidden" name="mode" value="god">
                    <button type="submit" class="pal_button">
                        <span>GOD</span>
                    </button>
                </form>
            </div>
        </section>
            
        <section id="series">
            <div class="series">
                <p>双天の守護者</p>
            </div>
            <!-- ソルガレオ パック -->
            <div id="sol_pack">
                <div>
                    <p class="pack_name">ソルガレオ</p>
                </div>
                <form action="SelectPackGet.php" method='post'>
                    <button type="submit" name="pack" value="sol">
                    <?php $delay = rand(10, 100) / 10; // 0.0〜5.0秒 ?>
                    <div class="hover_wrapper">
                        <div class="glow_wrapper" style="--shine-delay: <?= $delay ?>s;">
                            <img src="pack_images/sol_pack.png" alt="ソルガレオ パック" class="pack_image">
                            <div class="shine"></div>
                        </div>
                    </div>
                    </button>
                </form>
                <form action="SelectPackGet.php" method="post">
                    <input type="hidden" name="pack" value="sol">
                    <input type="hidden" name="mode" value="god">
                    <button type="submit" class="sol_button">
                        <span>GOD</span>
                    </button>
                </form>
            </div>

            <!-- ルナアーラ パック -->
            <div id="luna_pack">
                <div>
                    <p class="pack_name">ルナアーラ</p>
                </div>
                <form action="SelectPackGet.php" method='post'>
                    <button type="submit" name="pack" value="luna">
                    <?php $delay = rand(10, 100) / 10; // 0.0〜5.0秒 ?>
                    <div class="hover_wrapper">
                        <div class="glow_wrapper" style="--shine-delay: <?= $delay ?>s;">
                            <img src="pack_images/luna_pack.png" alt="ルナアーラ パック" class="pack_image">
                            <div class="shine"></div>
                        </div>
                    </div>
                    </button>
                </form>
                <form action="SelectPackGet.php" method="post">
                    <input type="hidden" name="pack" value="luna">
                    <input type="hidden" name="mode" value="god">
                    <button type="submit" class="luna_button">
                        <span>GOD</span>
                    </button>
                </form>
            </div>
        </section>

        <section id="series">
            <div class="series">
                <p>テーマ拡張パック</p>
            </div>
            <!-- ミュウパック -->
            <div id="myu_pack">
                <div>
                    <p class="pack_name">ミュウ</p>
                </div>
                <form action="SelectPackGet.php" method='post'>
                    <button type="submit" name="pack" value="myu">
                    <?php $delay = rand(10, 100) / 10; // 0.0〜5.0秒 ?>
                    <div class="hover_wrapper">
                        <div class="glow_wrapper" style="--shine-delay: <?= $delay ?>s;">
                            <img src="pack_images/myu_pack.jpg" alt="ミュウ パック" class="pack_image">
                            <div class="shine"></div>
                            </div>
                    </div>
                    </button>
                </form>
                <form action="SelectPackGet.php" method="post">
                    <input type="hidden" name="pack" value="myu">
                    <input type="hidden" name="mode" value="god">
                    <button type="submit" class="myu_button">
                        <span>GOD</span>
                    </button>
                </form>
            </div>
            
            <!-- アルセウスパック -->
            <div id="al_pack">
                <div>
                    <p class="pack_name">アルセウス</p>
                </div>
                <form action="SelectPackGet.php" method='post'>
                    <button type="submit" name="pack" value="al">
                    <?php $delay = rand(10, 100) / 10; // 0.0〜5.0秒 ?>
                    <div class="hover_wrapper">
                        <div class="glow_wrapper" style="--shine-delay: <?= $delay ?>s;">
                            <img src="pack_images/al_pack.jpg" alt="アルセウス パック" class="pack_image">
                            <div class="shine"></div>
                            </div>
                    </div>
                    </button>
                </form>
                <form action="SelectPackGet.php" method="post">
                    <input type="hidden" name="pack" value="al">
                    <input type="hidden" name="mode" value="god">
                    <button type="submit" class="al_button">
                        <span>GOD</span>
                    </button>
                </form>
            </div>

            <!-- シャイニングハイパック -->
            <div id="sha_pack">
                <div>
                    <p class="pack_name">シャイニングハイ</p>
                </div>
                <form action="SelectPackGet.php" method='post'>
                    <button type="submit" name="pack" value="shai">
                    <?php $delay = rand(10, 100) / 10; // 0.0〜5.0秒 ?>
                    <div class="hover_wrapper">
                        <div class="glow_wrapper" style="--shine-delay: <?= $delay ?>s;">
                            <img src="pack_images/shai_pack.jpg" alt="シャイニングハイ パック" class="pack_image">
                            <div class="shine"></div>
                            </div>
                    </div>
                    </button>
                </form>
                <form action="SelectPackGet.php" method="post">
                    <input type="hidden" name="pack" value="shai">
                    <input type="hidden" name="mode" value="god">
                    <button type="submit" class="shai_button">
                        <span>GOD</span>
                    </button>
                </form>
            </div>
        </section>

        <section id="series">
            <div class="series">
                <p>禁断の果実</p>
            </div>
            <!-- ALL GOD パック-->
            <div id="god_pack">
                <div>
                    <p class="pack_name">オールゴッド</p>
                </div>
                <form action="SelectPackGet.php" method='post'>
                <input type="hidden" name="pack" value="all_god">
                <input type="hidden" name="mode" value="god">
                    <button type="submit" name="pack" value="all_god">
                    <?php $delay = rand(10, 100) / 10; // 0.0〜5.0秒 ?>
                    <div class="hover_wrapper">
                        <div class="glow_wrapper" style="--shine-delay: <?= $delay ?>s;">
                            <img src="pack_images/All_God_pack.jpg" alt="オールゴッド パック" class="pack_image">
                            <div class="shine"></div>
                        </div>
                    </div>
                    </button>
                </form>
                <form action="SelectPackGet.php" method="post">
                    <input type="hidden" name="pack" value="all_god">
                    <input type="hidden" name="mode" value="god">
                    <button type="submit" class="god_button">GOD</button>
                </form>
            </div>
        </section>
    </div>

    

<script>    
    document.addEventListener
    (
        "keydown", function ( event )
        {
            if ( event.key === "Enter" )
            {
                event.preventDefault (  ); // ページのリロードを防ぐ
                const godButton = document.querySelector ( ".god_button" );
                if ( godButton )
                {
                    godButton.click (  );
                }
            }
        }
    );
</script>

</body>

<footer>
    <p>© 2024 Pokémon. © 1995-2024 Nintendo / Creatures Inc. / GAME FREAK inc.</p>
    <p>© 2024 DeNA Co., Ltd.</p>
    <p>ポケットモンスター・ポケモン・Pokémonは任天堂・クリーチャーズ・ゲームフリークの登録商標です。</p>
</footer>

</html>
