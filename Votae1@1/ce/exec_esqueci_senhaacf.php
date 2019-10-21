<?php

include ("../conecta_banco.php");
?>
<!DOCTYPE html>
 <html lang="pt-BR">
<head>
<title>esqueci senha ACF</title>
	<meta charset="utf-8"> 
	  <meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="../css/bootstrap.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet"> 
  <link rel="icon" type="image/jpg" href="../img/icone_barra.jpg">
<!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
  <script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript">
	function validacao() {
	if(document.form.senhac.value=="")
	{
	alert("Por favor informe a senha.");
	document.form.senhac.focus();
	return false;
	}
	if(document.form.senhacnf.value=="")
	{
	alert("Por favor informe novamente a senha.");
	document.form.senhacnf.focus();
	return false;
	}
        senhac = document.form.senhac.value;
        senhacnf = document.form.senhacnf.value;

        if (senhac != senhacnf) {
        alert("SENHAS DIFERENTES! FAVOR DIGITAR SENHAS IGUAIS");
        document.form.senhacnf.focus();
	    return false;
        	}
	}
	</script>
</head>
<body>
	<div class="container">
	<img src="../img/logop.jpg"><br>
	<?php
	$user=$_POST['user'];
	$veri=$_POST['verificador'];
	// cria a instrução SQL que vai selecionar os dados dos itens
	$query = ("SELECT * FROM users WHERE email ='$user' AND verificador= '$veri'");
	// executa a query
	$dados = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
	// transforma os dados em um array
	$linha = mysqli_fetch_assoc($dados);
	// calcula quantos dados retornaram
	$total = mysqli_num_rows($dados);
	?>
	<?php
	// se o número de resultados for maior que zero, mostra os dados//
	if($total == 0) {echo "<br>Usuário não encontrado ou verificador não confere. <a href='indexc.php'>Voltar</a>";}
	if($total > 0) {
	// inicia o loop que vai mostrar todos os dados
	do {
	$user=$linha['email'];
	$senha=$linha['senha'];
	$id=$linha['id'];
	$verificador=$linha['verificador'];
	?>
	<form name="form" method="post" action="salva/salva_esqueci_senhaacf.php" onSubmit="return validacao();">
		<fieldset class="grupo">
			<input type="hidden" name="id" value="<?php print $linha['id']?>"/>
			<div class="form-group"><br>
			<label><b>Por favor altere sua senha inicial: </b></label>
			<input type="password" size="10" name="senhac"  placeholder="Nova Senha com no mínimo 6 caracteres" class="form-control" minlength="6" />
			<br>
			<label><b>Por favor confirme sua senha:</b></label>
			<input type="password" size="10" name="senhacnf"  placeholder="Repita a Senha..." class="form-control" minlength="6" />
			</div>
			</fieldset>
		<fieldset class="grupo">
		<div class="form-group">
		<input type="submit" value="Alterar senha" name="alterasenha"/>
		<input type="reset" name="Limpar" value="Limpar" />
		<input type="button" name="cancela" value="Cancelar" onclick="window.location.href='indexc.php'"/>
		</div>
		</fieldset>
	</form>
	<?php
	// finaliza o loop que vai mostrar os dados
	}while($linha = mysqli_fetch_assoc($dados));
	// fim do if
	}
	?>
	<?php
	// tira o resultado da busca da memória
	mysqli_free_result($dados);
	?>
	</div>
</body>
</html>