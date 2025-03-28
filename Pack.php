<?php

class Pack {

    private $id = [ ];
    private $packName;
    
    public function __construct ( $packName, $id ) {
        $this -> packName = $packName;
        $this -> id = $id;
    }

    public function imageDownloads (  ) {
        
        echo $this -> packName."パック\n";
        $save_dir = $this -> packName.'/';

        if ( !is_dir ( $save_dir ) ) {
            mkdir ( $save_dir, 0777, true );
        }

        foreach ( $this -> id as $image ) {
            $image_url = "https://img.gamewith.jp/article_tools/pokemon-tcg-pocket/gacha/m$image.png";
            $image_data = file_get_contents ( $image_url );

            if ( $image_data === false ) {
                echo "画像なし: m$image\n";
                continue;
            }

        $file_name = $save_dir . 'm'.$image . '.png';
        file_put_contents ( $file_name, $image_data );
        echo "画像を取得: $file_name\n";
        }

        echo "終了\n";
    }
}