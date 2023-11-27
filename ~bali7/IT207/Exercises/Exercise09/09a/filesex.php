<?php

$url = 'https://helios.vse.gmu.edu/~bali7/php.ini';

$text = file_get_contents($url);

if (stristr($text, 'magic_quotes_gpc = On')){
	echo "Magic Quotes On";
}

if (stristr($text, 'magic_quotes_gpc = Off')){
	echo "Magic Quotes Off";
}


?>