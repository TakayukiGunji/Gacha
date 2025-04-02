<?php

$detaUrl = "https://docs.google.com/spreadsheets/d/e/2PACX-1vTOna8gMsTbZHFwKAdiBFWpphTi8QHBWChPETtU0_ndzE4vt2GKy45skap7NUfOnpqk6d8Qx0eKarAv/pub?gid=0&single=true&output=csv";

$csv = file_get_contents ( $detaUrl );
$arrayCsv = explode("\n", $csv);

$insertSql = [ ];

foreach ( $arrayCsv as $incsv ) {
    $insertSql [ ] = str_getcsv ( $incsv );
}

foreach ( $insertSql as $deta ) {
    print_r ( $deta );
    echo '<br>';
}