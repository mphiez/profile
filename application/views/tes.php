<?php
	//$array = $list;
	$array = json_decode(json_encode($list), True);
	$delimiter = ";";
	header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename="eeee.csv";');

    // open the "output" stream
    // see http://www.php.net/manual/en/wrappers.php.php#refsect2-wrappers.php-unknown-unknown-unknown-descriptioq
    $f = fopen('php://output', 'w');

    foreach ($array as $line) {
        fputcsv($f, $line, $delimiter);
    }
?>