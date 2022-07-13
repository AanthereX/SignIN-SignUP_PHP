<?php

$dbhost = "localhost";
$dbuser = "fmbrjngm_agha";
$dbpass = "123idkhan";
$dbname = "fmbrjngm_agha";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
?>