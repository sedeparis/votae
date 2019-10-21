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
<html lang="pt-BR">
<head>
	<title>Cadastro de usuários</title>
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
	 <script type="text/javascript">
		function validacao() {
		<!----  nome  ---- >
			if(document.form.nome.value=="")
			{
			alert("Por favor informe o nome da eleitor.");
			document.form.nome.focus();
			return false;
			}
			<!----  email  ---- >
			if(document.form.email.value=="")
			{
			alert("Por favor informe o email da eleitor.");
			document.form.email.focus();
			return false;
			}
			<!----  codigo  ---- >
			if(document.form.codigo.value=="")
			{
			alert("Por favor informe o codigo da eleitor.");
			document.form.codigo.focus();
			return false;
			}
			
		}
	</script>
</head>
<body>
	<?php 
	 //selecionar senhap
	$query = ("SELECT * FROM parametros WHERE id= 1 ");
	// executa a query
	$dados = mysqli_query($mysqli, $query) or die(mysql_error($mysqli));
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
		<form name="form" method="POST" action="salva/salva_usuario.php" onSubmit="return validacao();">
			<fieldset class="grupo">
			<div class="form-group">
				<label>Nome real (5 ou mais caracteres):</label> 
				 <input type="text"  class="form-control" size="40" name="nome"/>
			 </div>
			</fieldset>
		 <fieldset class="grupo">
			 <div class="form-group">
			<label>Nome de usuario/e-mail):</label> 
			 <input type="text"  class="form-control"size="25" name="email" />
			 </div>
		 </fieldset>
		 <fieldset class="grupo">
			  <div class="form-group">
			<label>Código de usuário (Siape, matrícula...) :</label> 
			 <input type="text"  class="form-control"size="10" name="codigo" />
			 </div>
		 </fieldset>
		 <fieldset class="grupo">
			  <div class="form-group">
			 <input type="hidden" name="senha" value="<?php echo $senhap ?>" />
			<input type="submit" value="Cadastrar" />
			<input type="reset" value="Limpar" />
			 <input type="button" name="cancela" value="Cancelar" onclick="window.location.href='admince.php'"/>
			 </div>
		 </fieldset>
		</form>
	</div>
</body>
</html>