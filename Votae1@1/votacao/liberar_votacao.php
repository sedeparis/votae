<?php
session_start();
$_SESSION ["email"];
$_SESSION ["senha"];
echo "<br><br>";
echo "<div class='container'>";
echo "Voce está logado como: ";
	echo $_SESSION['email'];
	echo "</div>";
include ("../conecta_banco.php");
?>
<!DOCTYPE HTML>
 <html lang="pt-br">
<head>
<title>Autorizar inicio da votacao
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

  <script type="text/javascript">

 function validacao() {
<!----  nome da chapa ---- >
if(document.form.chapa.value=="Selecione...")
{
alert("Por favor informe o nome da chapa.");
document.form.chapa.focus();
return false;
}
<!----  nome da comissao ---- >
if(document.form.comissao.value=="Selecione...")
{
alert("Por favor informe o nome do comissionario.");
document.form.comissao.focus();
return false;
}
<!----  senha ---- >
if(document.form.senha.value=="")
{
alert("Por favor informe a senha.");
document.form.senha.focus();
return false;
}
}
</script>
  </head>
<body>
	  <div class="container">
<h2>Autorizar inicio da votação</h2>

<form name="form" method="post" action="salva/salva_autor_votacao.php" onSubmit="return validacao();"> 
<fieldset class="grupo">
		 <div class="form-group">
 <?php	   
  $query = mysqli_query($mysqli, "SELECT * FROM eleicoes WHERE aberta=0");
?>
<label  for="">Selecione a eleição</label>		     
 <select class="form-control" name="eleicao">
 <option  class="form-control" name="">Selecione...</option>
 <?php while($var = mysqli_fetch_array($query)) { ?>
 <option value="<?php echo $var['ideleicao'] ?>"><?php echo $var['eleicao'] ?></option>
 <?php } ?>
 </select>
 </div>
  </fieldset>
  <fieldset class="grupo">
		 <div class="form-group">
 <?php	   
  $query = mysqli_query($mysqli, "SELECT * FROM users WHERE tpuser=1");
?>
<label  for="">Selecione o representante da comissão</label>		     
 <select class="form-control" name="comissao">
 <option class="form-control" name="">Selecione...</option>
 <?php while($var = mysqli_fetch_array($query)) { ?>
 <option value="<?php echo $var['id'] ?>"><?php echo $var['email'] ?></option>
 <?php } ?>
 </select>
 </div>
  </fieldset>
  <fieldset class="grupo">
 <div class="form-group">
<label>Senha:</label> 
<input class="form-control" type="password" size="10" name="senha"/> 
</div>
</fieldset>
<fieldset class="grupo">
		 <div class="form-group">
	<input type="submit" name="enviar" value="Selecionar"/>
	<input type="submit" name="limpar" value="Limpar"/>
	<input type="button" name="cancela" value="Cancelar" onclick="window.location.href='../ce/admince.php'"/>
	</div>
	</fieldset>
</div>
</body>
</html>
