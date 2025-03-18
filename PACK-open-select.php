<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="hue.css">

</head>
<body>
    
<section id="main" >
    <div id="kyomu">
        <h1>歓喜<span>&emsp;のち&emsp;</span>虚無</h1>
    </div>

    <div id="pack_img">
        <div id="pika_pack">
            <form action="PACK-get-select.php" method='post'>
                <a href="PACK-get-select.php">
                    <input type="hidden" name="pika">
                        <img src="pack_images/pika_pack.jpg" alt="ピカチュウ パック">
                    </input>
                </a>
            </form>
        </div>
        <div id="riz_pack">
            <form action="PACK-get-select.php" method='post'>
                <a href="PACK-get-select.php">
                    <input type="hidden" name="riz" method="post">
                        <img src="pack_images/riz_pack.jpg" alt="リザードン パック">
                    </input>
                </a>
            </form>
        </div>
        <div id="myu2_pack">
            <form action="PACK-get-select.php" method='post'>
                <a href="PACK-get-select.php">
                    <img src="pack_images/myu2_pack.jpg" alt="ミュウツー パック">
                </a>
            </form>
        </div>
        <div id="myu_pack">
            <form action="PACK-get-selectn.php" method='post'>
                <a href="PACK-get-select.php">
                    <img src="pack_images/myu_pack.jpg" alt="ミュウ パック">
                </a>
            </form>
        </div>
        <div id="dia_pack">
            <form action="PACK-get-select.php" method='post'>
                <a href="PACK-get-selectn.php">
                    <img src="pack_images/dia_pack.jpg" alt="ディアルガ パック">
                </a>
            </form>
        </div>
        <div id="pal_pack">
            <form action="PACK-get-select.php" method='post'>
                <a href="PACK-get-select.php">
                    <img src="pack_images/pal_pack.jpg" alt="パルキア パック">
                </a>
            </form>
        </div>
        <div id="al_pack">
            <form action="PACK-get-select.php" method='post'>
                <a href="PACK-get-select.php">
                    <img src="pack_images/al_pack.jpg" alt="アルセウス パック">
                </a>
            </form>  
        </div>
    </div>
    <div id="open_button">
                <form action="PACK-get-select.php" method='post'>
                    <a href="PACK-get-select.php" class="button"><span>1&nbsp;PACK</span></a>
                </form>
            </div>
    <!-- <div>
        <a href="PACK-open-superfunction.php" class="roop"><span>TOP</span></a>
    </div> -->
</section>



</body>
</html>
