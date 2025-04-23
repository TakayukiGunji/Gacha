
<?php

require_once 'functions.php'; // convertRaritySymbol関数が必要なので

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


?>