<?php
include ("conecta_banco.php");
?>
<!DOCTYPE HTML>
 <html lang="pt_BR">
<head>
<title>Votae: Acesso
</title>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">     
<link rel="icon" type="image/jpg" href="img/icone_barra.jpg">
<!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
  <script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

</head>
<!-------- inicia pagina-------------->
<body>
<div class="container">
<br />
<br />
<br />
<br />
<p class="center">
<img src="img/baile.gif"/></p>
<?php
$email= $_POST['email'];
	$senha= ($_POST['senha']);
	// limpa tags e espaços codigo
	$senha = trim( strip_tags( $senha ) );
	// limpa tags e espaços codigo
	$email = trim( strip_tags( $email ) );
	$senha= md5($senha);
	$sql = mysqli_query($mysqli, "SELECT * FROM user WHERE email = '$email' 
				AND senha= '$senha' 
				AND situacao = 1  ")
					or die (mysqli_error($mysqli));
$row = mysqli_num_rows($sql);
if($row > 0){
	session_start();
	$_SESSION ['email']=$_POST['email'];
	$_SESSION ['senha']=md5($_POST['senha']);
echo 'Autenticando!';
echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=verifica_senha.php'>";
} else{
echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=indexu.php'>";
echo 'Senha ou usuario não confere ou sem autorização de acesso!';
}
?>

</div>
</body>
</html>