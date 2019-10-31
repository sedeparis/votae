<?php
//header('Content-Type: text/html; charset=utf-8');
$host = "localhost";
$user = "root";
$pass = "";
$banco = "votaecopy";
$mysqli = new mysqli($host, $user, $pass, $banco);
mysqli_set_charset( $mysqli, 'utf8');
?>