<?php
session_start();
if (!isset ($_SESSION ["email"]) || !isset($_SESSION ["senha"])){
	header("Location: indexc.php");
	exit;
} else {
	echo '<div class="container">';
	echo "Voce está logado como: ";
	echo $_SESSION['email'];
}
include '../conecta_banco.php';
echo '</div>';
?>
<!DOCTYPE html>
<html lang="pt_br">
    <head>
       <title>Administrar</title>
       <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">     
<link rel="icon" type="image/jpg" href="../img/icone_barra.jpg">
<!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
  <script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>

  <!-- Bootstrap CSS -->
    </head>
    <body>   
	 <div class="container">
	 	 
<br /><br />
	<h1>VOTAe: Administrar Sistema </h1>
	<br /><br />
	<input type="button" class="admin" value="Cadastrar usuarios"  onclick="location.href='cd_usuario_acf.php'">
<br />
	<input type="button" class="admin" value="Aprovar Usuários"  onclick="location.href='aprova_usuario.php'">
<br />
<input type="button" class="admin" value="Cadastrar orgão"  onclick="location.href='cd_orgao_padrao.php'">
<br />
<input type="button" class="admin" value="Alterar órgão"  onclick="location.href='altera_orgao_padrao.php'">
<br />

<input type="button" class="admin" value="Alterar senha ACF"  onclick="location.href='alterar_senhaacf.php'">
<br />
<input type="button" class="admin" value="Parametros"  onclick="location.href='altera_parametro.php'">
<br />
<input type="button" class="admin" value="Sair"  onclick="location.href='logoutadm.php'">
<br /><br /><br />
         </div>
    </body>
</html>