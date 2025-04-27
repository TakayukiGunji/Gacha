
<?php

require_once 'functions.php'; // convertRaritySymbol関数が必要なので

?>

<?php

// --- 表示用クラス（Open） ---
class Open {
    public function packOpen ( array $cards ): array
    {
        $result = [  ];

        foreach ( $cards as $card )
        {
            if ( $card )
            {
                $result [  ] =
                [
                    'image' => $card [ 'image' ],
                    'name'  => $card [ 'name' ],
                    'rare'  => $card [ 'rare' ],
                    'rare_symbol' => convertRaritySymbol ( ( int ) $card [ 'rare' ] )
                ];
            } else {
                $result [  ] = null;
            }
        }

        return $result;
    }
}
?>