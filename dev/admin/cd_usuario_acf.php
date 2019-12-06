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
<!DOCTYPE html>

<html lang="pt-BR">
<head>
<title>Cadastro de usuários ACF
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
	  function mascara(t, mask){
 var i = t.value.length;
 var saida = mask.substring(1,0);
 var texto = mask.substring(i)
 if (texto.substring(0,1) != saida){
 t.value += texto.substring(0,1);
 }
 }
 function validacao() {

 if(document.form.tpuser.value=="Selecione...")
{
alert("Por favor informe o tipo de usuario.");
document.form.tpuser.focus();
return false;
}

if(document.form.nome.value=="")
{
alert("Por favor informe o nome de usuario.");
document.form.nome.focus();
return false;
}

if(document.form.email.value=="")
{
alert("Por favor informe o nome de login.");
document.form.email.focus();
return false;
}

}

</script>
</head>
 <body>
 <?php 
$query = ("SELECT * FROM parametros WHERE id= 1 ");

// executa a query
$dados =  mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
// transforma os dados em um array
$linha = mysqli_fetch_assoc($dados);
// calcula quantos dados retornaram
$total = mysqli_num_rows($dados);
?>

<?php
	// se o número de resultados for maior que zero, mostra os dados//
	if($total == 0) {echo "não encontrado";}
	if($total > 0) { 
		// inicia o loop que vai mostrar todos os dados
		do {
$tipo=$linha['tipo'];
		$senhap=$linha['valor'];
?>

<?php
		// finaliza o loop que vai mostrar os dados
		}while($linha = mysqli_fetch_assoc($dados));
	// fim do if 
	}
	?>
	 <div class="container">
	 <h1>Cadastrar usuários </h1>
<form name="caduser" method="POST" action="salva/salva_usuario_acf.php" onSubmit="return validacao();"> 
<fieldset class="grupo">
		 <div class="campo">
 <?php	   
  $query = mysqli_query($mysqli, "SELECT * FROM tpuser");
?>
 <label for="">Selecione tipo de usuário</label>		     
 <select class="form-control name="tpuser">
 <option class="form-control" name="">Selecione...</option>
 <?php while($var = mysqli_fetch_array($query)) { ?>
 <option class="form-control" value="<?php echo $var['id'] ?>"><?php echo $var['tpuser'] ?></option>
 <?php } ?>
 </select>
 </div>
  </fieldset>
	<fieldset class="grupo">
		 <div class="campo">
<label class="form-control">Nome real:</label> 
<input class="form-control" type="text"  size="40" name="nome"/>
 </div>
 </fieldset>
 <fieldset class="grupo">
 <div class="campo">
<label class="form-control">Nome de usuario:</label> 
<input class="form-control" type="text" size="25" name="email" />
 </div>
 </fieldset>
 <fieldset class="grupo">
  <div class="form-group">
<label>Verificador em caso de perda de senha:</label>
 <input type="text"  class="form-control"size="20" name="verificador" />
 </div>
 </fieldset>
 <fieldset class="grupo">
 <div class="campo">
  <input type="hidden" name="senha" value="<?php echo $senhap ?>" />
<input type="submit" value="Cadastrar" />
<input type="reset" value="Limpar" />
 <input type="button" name="cancela" value="Cancelar" onclick="window.location.href='admin.php'"/>
 </div>
 </fieldset>
</form>
</div>
</body>
</html>