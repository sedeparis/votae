<?php
include "conecta_banco.php";
$senhap= 'votae';
session_start();
if (!isset ($_SESSION ["email"]) || !isset($_SESSION ["senha"])){
header("Location: verifica_senha.php");
exit;
} else {
echo "";
}
$logado=$_SESSION['email'];
?>
<?php
// cria a instrução SQL que vai selecionar os dados dos itens
$query = sprintf("SELECT * FROM user WHERE email ='$logado'");
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
$user=$linha['email'];
$id=$linha['id'];
?>
<html>
<head>
<title>Alterar senha</title>
<meta charset="utf-8"> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap CSS --><link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link rel="icon" type="image/jpg" href="img/icone_barra.jpg">
<!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
	function validacao() {
	if(document.form.user.value=="")
	{
	alert("Por favor informe o seu usuário.");
	document.form.user.focus();
	return false;
	}
	}
	</script>
</head>
<body>
	<div class="container">
		<br><br>
		<?php echo 'Usuário identificado: '.$logado=$_SESSION['email']; ?>
		<h2>Alterar senha</h2>
		<br />
		<form name="form" action="exec_alterar_senha.php" method="post" onsubmit="return validacao();">
			<fieldset class="grupo">
			<div class="form-group">
			<label>Usuário:</label>
			<input class="form-control" type="text" name="user" size="30" value="<?php echo $logado=$_SESSION['email'] ?>"/>
			</div>
			</fieldset>
			<div class="form-group">
			<input type="submit" name="buscad" value="Buscar"/>
			<input type="reset" name="reset" value="Limpar"/>
			<input type="button" name="cancela" value="Cancelar" onclick="window.location.href='painel.php'"/>
			</div>
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