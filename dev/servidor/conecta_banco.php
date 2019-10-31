<?php
header('Content-Type: text/html; charset=utf-8');
$host = "localhost";
$user = "u852514288_test";
$pass = "P)d@sejaca";
$banco = "u852514288_test";
$mysqli = new mysqli($host, $user, $pass, $banco);
mysqli_set_charset( $mysqli, 'utf8');
?>