<!-- 20250312 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

<body>
    <section id="main">
        <?php
        
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
        
        <form action="PACK-get-superfunction.php" method='post'>
            <a href="PACK-get-superfunction.php" class="button"><span>1&nbsp;PACK&emsp;0&nbsp;JPY</span></a>
        </form>
        
            <a href="PACK-open-superfunction.php" class="roop"><span>TOP</span></a>
    </section>
</body>

</html>