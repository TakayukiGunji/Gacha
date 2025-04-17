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

        class Pack {
            public function SelectPackOpen ( $pack ) {
                $pdo = new PDO ( 'mysql:host=localhost;dbname=xslive230801_gunnji;charset=utf8', 'xslive230801_gun', 'livebusiness' );
                $sql = "SELECT number FROM Cardlist WHERE pack = $this -> pack;";
                
            }
        }







        
        // 20250310
        
        class Open {
            public function packOpen ( array $card ) {
                for ( $number = 0; $number < count ( $card ); $number++ ) {
                    echo '<img src="images/m'.$card [ $number ].'.png" alt="'.$number.'枚目">';
                }
            }
        }
        
        $min = 1;
        $max = 723;
        
        $card = [ ];
        
        while ( count ( $card ) < 5 ) {
            $num = rand ( $min, $max );
            if ( !in_array ( $num, $card ) ) {
                $card [ ] = $num;
            }
        }
        ?>
        
        <div id="img">
        <?php
        $open = new Open ( );
        $open -> packOpen ( $card );
        ?>
        </div>
        
        <form action="PACK-get-select.php" method='post'>
            <a href="PACK-get-select.php" class="button"><span>1&nbsp;PACK</span></a>
        </form>
        
            <a href="SelectPackOpen.php" class="roop"><span>TOP</span></a>
    </section>
</body>

</html>