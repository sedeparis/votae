<?php
session_start();
$_SESSION ["email"];
$_SESSION ["senha"];
echo "<br><br>";
echo "<div class='container'>";
echo "Voce está logado como: ";
	echo $_SESSION['email'];
	echo "</div>";
include ("../../conecta_banco.php");
?>
<!DOCTYPE html>
 <html lang="pt-BR">
<head>
<title>Alterar senha de usuários
</title>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="../../css/bootstrap.min.css" rel="stylesheet">
<link href="../../css/style.css" rel="stylesheet">     
<link rel="icon" type="image/jpg" href="../../img/icone_barra.jpg">
<!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
  <script src="../../js/jquery.js"></script>
<script src="../../js/bootstrap.min.js"></script>

  <!-- Bootstrap CSS -->
</head>
 <body>
<div class="container">
<?php

$id=$_POST['id'];
$senha=md5($_POST['senha']);
$senhac=md5($_POST['senhac']);

$dupesql = "SELECT * FROM users WHERE (senha = '$senha')";

$duperaw = mysql_query($dupesql);

if (mysql_num_rows($duperaw) == 0) {
   echo "<span>Senha antiga não confere.</span>";

} else { 
$sql = @mysql_query("UPDATE users SET senha='$senhac' WHERE id='$id'");
$resultado = @mysql_query ($sql);
{echo "Senha alterada com sucesso!";}
}
?>
<br>
<br>
<input type="button" name="cancela" value="Voltar" onclick="window.location.href='../painelf.php'"/>
<br />
</div>
</body>
</html>