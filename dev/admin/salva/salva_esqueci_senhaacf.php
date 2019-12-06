<?php

include ("../../conecta_banco.php");
?><!DOCTYPE html>
 <html lang="pt-BR">
 <head>
	 <title>Esqueci senha</title>
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
$senhac=md5($_POST['senhac']);

$sql = ("UPDATE users SET senha='$senhac' WHERE id='$id'");
$resultado =  mysqli_query($sql, $mysqli) or die(mysqli_error($mysqli));
{echo "Senha alterada com sucesso!";}

?>
<br>
<br>
<input type="button" name="cancela" value="Voltar" onclick="window.location.href='../indexa.php'"/>
<br />
</div>
</body>
</html>