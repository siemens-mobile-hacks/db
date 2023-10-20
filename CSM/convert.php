<?php
$mode = $argv[1] ?? "";

foreach (glob("*.txt") as $file) {
	$data = file_get_contents($file);
	$data = preg_replace("/\r\n|\r|\n/si", "\r\n", $data);
	
	if ($mode == "encode") {
		$data = iconv("UTF-8", "cp1251//IGNORE", $data);
		file_put_contents($file, $data);
	} else if ($mode == "decode") {
		$data = iconv("cp1251", "UTF-8//IGNORE", $data);
		file_put_contents($file, $data);
	}
}
