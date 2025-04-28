<?php 

function convertRaritySymbol ( int $rare ): string {
    switch ( $rare ) {
        case 8: return '<span class="rare rare-8">👑</span>';
        case 7: return '<span class="rare rare-7">★★★</span>';
        case 6: return '<span class="rare rare-6">★★</span>';
        case 5: return '<span class="rare rare-5">★</span>';
        case 4: return '<span class="rare rare-4">◆◆◆◆</span>';
        case 3: return '<span class="rare rare-3">◆◆◆</span>';
        case 2: return '<span class="rare rare-2">◆◆</span>';
        case 1: return '<span class="rare rare-1">◆</span>';
        default: return '<span class="rare">？</span>';
    }
}

?>