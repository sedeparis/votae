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
  <link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">     
<link rel="icon" type="image/jpg" href="../img/icone_barra.jpg">
<!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
  <script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
</head>
<!-------- inicia pagina-------------->
<body>
 <div class="container">
<br />
<br />
<br />
<br />
<p class="center"><img src="../img/baile.gif"/></p>
<?php
$email= $_POST['email'];
$senha= md5($_POST['senha']);
$sql = mysqli_query($mysqli, "SELECT * FROM users WHERE email = '$email' AND senha= '$senha' AND situacao = 1 AND tpuser=1") or die (mysqli_error());
$row = mysqli_num_rows($sql);
if($row > 0){
	session_start();
	$_SESSION['email']=$_POST['email'];
	$_SESSION['senha']=md5($_POST['senha']);
	$_SESSION['situacao']=[1];
	echo 'Autenticando!';
	echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=admince.php'>";
	
} else {
	echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=indexc.php'>";
	echo "Acesso não autorizado. Erro de usuário ou senha!</p>";
}
?>
</div>
</body>
</html>