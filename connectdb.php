#!/usr/bin/php

<?php

echo $argv[0].": begin".PHP_EOL;

$mysql = new mysqli("localhost","root","12345");

if ($mysql->errno != 0){

	echo "error connection to database".$mysql->error.PHP.EOL;
	exit (0);	
}

echo $argv[0].": end".PHP_EOL;
>?