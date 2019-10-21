<?php 
include "../conecta_banco.php";
?>
<html>
<head>
<title>Parametros</title>
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

 
</script>
  </head>
<body>
  
	 <div class="container">
<h2>Parâmetros da senha inicial de eleitores</h2>
<br />
<br />
<?php
// cria a instrução SQL que vai selecionar os dados eleicao
$query = ("SELECT * FROM parametros");
// executa a query
// executa a query
$dados =  mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
// transforma os dados em um array
$linha = mysqli_fetch_assoc($dados);
// calcula quantos dados retornaram
$total = mysqli_num_rows($dados);
?>
<?php
	// se o número de resultados for maior que zero, mostra os dados//
	if($total > 0) {
		// inicia o loop que vai mostrar todos os dados
		do {
$senha= $linha['valor'];
		?>
<?php
		// finaliza o loop que vai mostrar os dados
		}while($linha = mysqli_fetch_assoc($dados));
	// fim do if 
	}
?>
<form name="form" method="post" action="salva/salva_altera_parametro.php">

<fieldset class="grupo">
		 <div class="campo">
<label class="form-control">Senha Padrão Atual criptografada: <?php print $senha; ?></label> 

<label>Nova Senha Padrão</label> 
<input class="form-control" type="text" size="37" name="senhap" />
</div>
	</fieldset>
	<fieldset class="grupo">
	<div class="campo">
	<input type="submit" value="Atualizar" name="alterasenha"/>

		 <input type="button" name="cancela" value="Cancelar" onclick="window.location.href='admin.php'"/>
 </div>
 </fieldset>
</form>
<br />
<br />
</div>
</body>
</html>
