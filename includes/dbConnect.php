<?php
$DBhost = getenv("IP");         
$DBuser = getenv("C9_USER");    
$DBpass = "";
$DBname = "triviagame";
$DBport = 3306;

$DBcon = new MySQLi($DBhost,$DBuser,$DBpass,$DBname,$DBport);

if ($DBcon->connect_error) {
    die("ERROR : -> ".$DBcon->connect_error);
}
?>