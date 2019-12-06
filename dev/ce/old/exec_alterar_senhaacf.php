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
	<title>Alterar senha ACF
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
	<!---- senha atual ---- >
	if(document.form.senha.value=="")
	{
	alert("Por favor informe a senha atual.");
	document.form.senha.focus();
	return false;
	}
	<!----  nova senha ---- >
	if(document.form.senhac.value=="")
	{
	alert("Por favor informe a nova senha.");
	document.form.senhac.focus();
	return false;
	}

	}
	</script>
</head>
<body>
	<div class="container">
	<h1>Alterar senha Comissão/fiscais</h1>
	<?php
	$user=$_POST['user'];
	// cria a instrução SQL que vai selecionar os dados dos itens
	$query = ("SELECT * FROM users WHERE email ='$user'");
	// executa a query
	$dados = mysqli_query($mysqli, $query) or die(mysql_error($mysqli));
	// transforma os dados em um array
	$linha = mysqli_fetch_assoc($dados);
	// calcula quantos dados retornaram
	$total = mysqli_num_rows($dados);
	?>
	<br />
	<?php
	// se o número de resultados for maior que zero, mostra os dados//
	if($total == 0) {echo "Usuário não encontrado <a href='admince.php'>Voltar</a>";}
	
	else {
			if($total > 0) {
			// inicia o loop que vai mostrar todos os dados
			do {
			$nome=$linha['nome'];
			$senha=$linha['senha'];
			$idusers=$linha['id'];

			?>
			<?php
			// finaliza o loop que vai mostrar os dados
			}while($linha = mysqli_fetch_assoc($dados));
			// fim do if
			}
			echo $nome.'!. Bem vindo a alteração de senha.<br><br>' ;
			?>

			<form name="form" method="post" action="salva/salva_alterar_senhaacf.php" onSubmit="return validacao();">
			<fieldset class="grupo">
			<div class="form-group">
			<input type="hidden"  class="form-control" class="form-control" class="form-control"name="idusers" value="<?php echo $idusers ?>"/>
			<label">Digite a sua senha Atual:</label>
			<input class="form-control" type="password" size="7" name="senha" maxlength="6" />
			</div>
			<div class="form-group">
			<label">Digite a Nova senha com pelo menos 6 caracteres:</label>
			<input class="form-control" type="password" size="7" name="senhac"   maxlength="6" />
			</div>
			</fieldset>
			<fieldset class="grupo">
			<div class="form-group">
			<br>
			<input type="submit" value="Alterar senha" name="alterasenha"/>
			<input type="reset" name="Limpar" value="Limpar" />
			<input type="button" name="cancela" value="Cancelar" onclick="window.location.href='admince.php'"/>
			</div>
			</fieldset>
			</form>

			<?php
			// tira o resultado da busca da memória
			mysqli_free_result($dados);
		}
	?>
	</div>
</body>
</html>