<?php


/*
$output = "First line write.\n";

if (fwrite($file, $output) > 0){
	echo "Successful write - first line <br>";
}

$output = "This is the second line.\n";

if (fwrite($file, $output) > 0){
	echo "Successful write - second line <br>";
}
*/
/*
$lol = file('testfile.txt');

function replace($lol){
	if (stristr($lol, '50')){
		return "replacement line!\n";
	}
	return $lol;
}
$lol = array_map('replace', $lol);
file_put_contents('testfile.txt', $lol);
*/
/*
$text = file_get_contents('../../.htaccess');

if (stristr($text, 'php_flag magic_quotes_gpc On')){
	echo "Magic Quotes On";
}

if (stristr($text, 'php_flag magic_quotes_gpc Off')){
	echo "Magic Quotes Off";
}
*/
$file = fopen("excel.csv", 'r');

while (($filedata = fgetcsv($file, 1000, ",")) !== false){
	$dataArray[] = $filedata;
}

fclose($file);

echo print_r($dataArray);

?>