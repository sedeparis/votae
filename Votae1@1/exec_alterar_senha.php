<?php
session_start();
$_SESSION['email'];
$_SESSION['senha'];
include ("conecta_banco.php");
?>
<!DOCTYPE HTML>
<html lang="pt-BR">
<head>
	<title>Alterar senha
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
	<script type="text/javascript">
	function validacao() {
	if(document.form.senhac.value=="")
	{
	alert("Por favor informe a senha.");
	document.form.senhac.focus();
	return false;
	}
	}
	</script>
</head>
<body>
	<div class="container">
		<h1>Alterar senha</h1>
		<?php
		$user=$_SESSION ['email'];
		// cria a instrução SQL que vai selecionar os dados dos itens
		$query = ("SELECT * FROM user WHERE email ='$user'");
		// executa a query
		$dados = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
		// transforma os dados em um array
		$linha = mysqli_fetch_assoc($dados);
		// calcula quantos dados retornaram
		$total = mysqli_num_rows($dados);
		?>
		<br />
		<?php
		// se o número de resultados for maior que zero, mostra os dados//
		if($total == 0) {echo "Usuário não encontrado. <a href='painel.php'>Voltar</a>";}
		if($total > 0) {
		// inicia o loop que vai mostrar todos os dados
		do {
		$use=$linha['email'];
		$senha=$linha['senha'];
		$id=$linha['id'];
		?>
		<form name="form" method="post" action="salva_alterar_senha.php" onsubmit="return validacao();">
			<fieldset class="grupo">
			<input type="hidden" name="id" value="<?php print $linha['id']?>"/>
			<div class="form-group">
			<label><b>Por favor altere sua senha inicial:</b></label>
			<input type="password" size="10" name="senhac"  placeholder="Senha..." class="form-control" minlength="6" />
			</div>
			</fieldset>
			<fieldset class="grupo">
			<div class="form-group">
			<input type="submit" value="Alterar senha" name="alterasenha"/>
			<input type="reset" name="Limpar" value="Limpar" />
			<input type="button" name="cancela" value="Cancelar" onclick="window.location.href='indexu.php'"/>
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