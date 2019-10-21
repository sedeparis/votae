<?php
session_start();
$_SESSION['email'];
$_SESSION['senha'];
include ("conecta_banco.php");
?>
<!DOCTYPE HTML>
<html lang="pt-BR">
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
<!-----  bootstrap ------>

</head>
<!-------- inicia pagina-------------->
<body>

<div class="container">
<p><img src="img/baile.gif"/></p>
<p>Estamos verificando se você fez a alteração obrigatória da sua senha inicial. Aguarde...</p>
<?php
$user= $_SESSION['email'];
$senhav= $_SESSION['senha'];
$smd5=MD5($senhav);
// verifica se a senha é igual a senha padrão
// cria a instrução SQL que vai selecionar os dados dos itens
$query = ("SELECT valor FROM parametros WHERE id=1");
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
$valida=$linha['valor'];


		// finaliza o loop que vai mostrar os dados
		}while($linha = mysqli_fetch_assoc($dados));
	// fim do if 
	}
?>
<?php
// tira o resultado da busca da memória
mysqli_free_result($dados);

//
$senhap=$valida;
$smd5=$senhap;

$dupesql =  "SELECT * FROM user WHERE email= '$user' AND senha='$smd5'" ;
$duperaw = mysqli_query($mysqli, $dupesql);

			if (mysqli_num_rows($duperaw) > 0)
				{
	echo "Você precisa alterar sua senha para continuar com segurança";
   echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=exec_alterar_senha.php'>";
}
else{
echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=painel.php'>";
}
?>
<br />
<br />
<br />
</div>
</body>
</html>
