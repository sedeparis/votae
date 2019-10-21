<?php
session_start();
$_SESSION ["email"];
$_SESSION ["senha"];
echo "<br><br>";
echo "<div class='container'>";
echo "Voce está logado como: ";
	echo $_SESSION['email'];
	echo "</div>";
include_once ("../../conecta_banco.php");
?>
<!DOCTYPE html>
 <html lang="pt-BR">
 <head>
	 <title>Salva órgao</title>
	   <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="../../css/bootstrap.css" rel="stylesheet">
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
$nome=$_POST['nome'];
$endereco=$_POST['endereco'];
$bairro=$_POST['bairro'];
$num=$_POST['num'];
echo $cnpj=$_POST['cnpj'];
$cidade=$_POST['cod_cidades'];
$uf=$_POST['cod_estados'];
$email=$_POST['email'];
$fone=$_POST['fone'];
$gestor=$_POST['gestor'];
$diretor=$_POST['diretor'];
?>
<?php
$dupesql = "SELECT * FROM cdorgao WHERE cnpj ='$cnpj' ";
$duperaw = mysqli_query($mysqli, $dupesql) or die(mysqli_error($mysqli));
if (mysqli_num_rows($duperaw) > 0) {
   echo "Cnpj ja cadastrado.";

} else {
$sql = ("INSERT INTO cdorgao(nome, padrao, cnpj, endereco, num, bairro, cidade, uf, email,  fone, gestor, diretor)
VALUES('$nome', 0, '$cnpj',  '$endereco', '$num', '$bairro','$cidade', '$uf', '$email', '$fone', '$gestor', '$diretor')");
$resultado =  mysqli_query($sql, $mysqli) or die(mysqli_error($mysqli));
{echo "Cadastro efetuado com sucesso!";}
}
?>
</div>
<br />
<?php
echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=../admin.php'>";
?>
</div>
</body>
</html>