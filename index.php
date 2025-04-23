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

</head>
<body>
    
<section id="main" >
    <div id="kyomu">
        <h1>歓喜<span>&emsp;のち&emsp;</span>虚無</h1>
    </div>

    <div id="pack_img">

        <!-- ピカチュウパック -->
        <div id="pika_pack">
            <form action="SelectPackGet.php" method='post'>
                <button type="submit" name="pack" value="pika">
                    <img src="pack_images/pika_pack.jpg" alt="ピカチュウ パック">
                </button>
            </form>

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
            <form action="SelectPackGet.php" method='post'>
                <button type="submit" name="pack" value="riz">
                    <img src="pack_images/riz_pack.jpg" alt="リザードン パック">
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
            <form action="SelectPackGet.php" method='post'>
                <button type="submit" name="pack" value="myu2">
                    <img src="pack_images/myu2_pack.jpg" alt="ミュウツー パック">
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

        <!-- ミュウパック -->
        <div id="myu_pack">
            <form action="SelectPackGet.php" method='post'>
                <button type="submit" name="pack" value="myu">
                    <img src="pack_images/myu_pack.jpg" alt="ミュウ パック">
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

        <!-- ディアルガパック -->
        <div id="dia_pack">
            <form action="SelectPackGet.php" method='post'>
                <button type="submit" name="pack" value="dhia">
                    <img src="pack_images/dia_pack.jpg" alt="ディアルガ パック">
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
            <form action="SelectPackGet.php" method='post'>
                <button type="submit" name="pack" value="pal">
                    <img src="pack_images/pal_pack.jpg" alt="パルキア パック">
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
        
        <!-- アルセウスパック -->
        <div id="al_pack">
            <form action="SelectPackGet.php" method='post'>
                <button type="submit" name="pack" value="al">
                    <img src="pack_images/al_pack.jpg" alt="アルセウス パック">
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
            <form action="SelectPackGet.php" method='post'>
                <button type="submit" name="pack" value="shai">
                    <img src="pack_images/sha_pack.jpg" alt="シャイニングハイ パック">
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

    </div>

        <!-- ALLパックボタン -->
        <div id="all_pack">
            <form action="SelectPackGet.php" method="post">
                <input type="hidden" name="pack" value="all">
                <button type="submit" class="all_button">
                    <span>ALL</span>
                </button>
            </form>
        </div>

        <!-- ALL GOD ボタン -->
        <div>
            <form action="SelectPackGet.php" method="post">
                <input type="hidden" name="pack" value="all">
                <input type="hidden" name="mode" value="god">
                <button type="submit" class="all_god_button">
                    <span>ALL GOD</span>
                </button>
            </form>
        </div>

    <!-- <div>
        <a href="PACK-open-superfunction.php" class="roop"><span>TOP</span></a>
    </div> -->

</section>



</body>

<footer>
    <p>© 2024 Pokémon. © 1995-2024 Nintendo / Creatures Inc. / GAME FREAK inc.</p>
    <p>© 2024 DeNA Co., Ltd.</p>
    <p>ポケットモンスター・ポケモン・Pokémonは任天堂・クリーチャーズ・ゲームフリークの登録商標です。</p>
</footer>

</html>
