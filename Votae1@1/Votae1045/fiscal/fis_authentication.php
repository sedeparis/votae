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
<link rel="icon" type="image/jpg" href="../../img/icone_barra.jpg">
<!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
  <script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript" >
function loginsucessfuly(){
	setTimeout ("window.location='painelf.php'", 500);
	
}
function loginfailed(){
	setTimeout("window.location='indexf.php'", 500);
}
</script>
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
$sql = @mysql_query("SELECT * FROM users WHERE email = '$email' AND senha= '$senha' AND situacao = 1 AND tpuser=2 ") or die (mysql_error());
$row = mysql_num_rows($sql);
if($row > 0){
	session_start();
	$_SESSION['email']=$_POST['email'];
	$_SESSION['senha']=md5($_POST['senha']);
	$_SESSION['situacao']=[1];
	echo 'Autenticando!';
	echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=painelf.php'>";
} else {
	echo "<p class='center'>Acesso não autorizado. Consulte o administrador do sistema!</p><meta HTTP-EQUIV='refresh' CONTENT='1;URL=indexf.php'>";
}
?>
</div>
</body>
</html>