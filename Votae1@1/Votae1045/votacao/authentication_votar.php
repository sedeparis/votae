<?php
echo $nome= MD5($_POST['nomec']);
echo $senha=MD5($_POST['senhac']);
echo $ide= $_POST['eleicao'];
$voltar= '<a href="painel.php">Voltar</a>';
include ("../conecta_banco.php");
$dupesql = "SELECT * FROM votacao WHERE ide= '$ide' AND(idv ='$nome')";
$duperaw = mysqli_query($mysqli, $dupesql) or die(mysqli_error($mysqli));

if (mysqli_num_rows($duperaw) > 0) {
echo "<span class='color'>Apuramos um voto com seu usuário. Se não foi você que votou entre em contato com a comissão eleitoral</span>";

} else {
$sql = mysqli_query($mysqli, "SELECT * FROM votantes WHERE nomev = '$nome' AND senhav= '$senha' AND ide='$ide'") ;
$row = mysqli_num_rows($sql);
if($row > 0){
session_start();
$_SESSION ['nome']=$_POST['nomec'];
$_SESSION ['senha']=MD5($_POST['senhac']);
$_SESSION ['ide']=$_POST['eleicao'];

echo 'Autenticando!';
echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=votacao_numerica.php'>";
} else {
echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=../painel.php'>";
echo 'Atenção!! Não encontramos seu usuário! Você tem certeza que criou um usuário criptografado';
}
}
?>
<!DOCTYPE HTML>
<html lang="pt_BR">
<head>
	<title>Votae: Acesso votação
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
</head>
<!-------- inicia pagina-------------->
<body>
	<div class="container">
	<br />
	<br />
	<p class="center">
	<img src="../img/baile.gif"/></p>
	</div>
</body>
</html>