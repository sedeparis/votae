<?php
include ("../conecta_banco.php");
?>
<html lang="pt_BR">
<head>
<title>Acesso de usuario
</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
<link rel="icon" type="image/jpg" href="../img/icone_barra.jpg">
<!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<!-- Bootstrap CSS -->
<script type="text/javascript" >
</script>
</head>
<!-------- inicia pagina-------------->
<body>
	<div class="container">
	 <img src="../img/logop.jpg"/>
	<h3>Acesso ao sistema</h3>
	 <div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:75%">
    <span class="sr-only">70% Complete</span>
  </div>
</div> 
	<?php
	$email= $_POST['email'];
	$senha= md5($_POST['senha']);
	$sql = mysqli_query($mysqli, "SELECT * FROM users WHERE email = '$email' AND senha= '$senha' AND situacao = 1 AND admin='Sim' ") or die (mysqli_error());
	$row = mysqli_num_rows($sql);
	if($row > 0){
	session_start();
	$_SESSION ['email']=$_POST['email'];
	$_SESSION ['senha']=md5($_POST['senha']);
	$_SESSION ['situacao']=[1];
	echo 'Autenticando!';
	echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=admin.php'>";
	} else {
	echo "<p class='center'>Acesso não autorizado. Consulte o administrador do sistema!</p><meta HTTP-EQUIV='refresh' CONTENT='2;URL=indexa.php'>";
	}
	?>
	</div>
</body>
</html>