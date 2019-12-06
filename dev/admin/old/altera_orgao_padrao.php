<?php 
include "../conecta_banco.php";
?>
<html>
<head>
<title>Alterar orgao
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
</head>
<body>
  
	 
	 <div class="container">
<h2>Alterar orgão Principal</h2>
<?php
// cria a instrução SQL que vai selecionar os dados
$query = sprintf("SELECT * FROM cdorgao WHERE padrao =1");
// executa a query
$dados =  mysqli_query($mysqli, $query) or die(mysqli_error($mysqli, $query));
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
		$idorgao=$linha['idorgao'];
		$nome=$linha['nome'];
		$cnpj=$linha['cnpj'];
		$endereco=$linha['endereco'];
		$num=$linha['num'];
		$bairro=$linha['bairro'];
		$email=$linha['email'];
		$fone=$linha['fone'];
		$gestor=$linha['gestor'];
		$diretor=$linha['diretor'];
		echo '<br>';
		echo 'Órgão: ' .$nome ;
		echo '<br>';
		echo 'CNPJ: ' .$cnpj ;
?>
<p>
<form name="form_altera" method="post" action="salva/salva_altera_orgao_padrao.php">
<fieldset class="grupo">
		 <div class="campo">
<input type="hidden" name="idorgao" value="<?php print $linha['idorgao']?>"/>  
	</div>
	</fieldset>
	<fieldset class="grupo">
		 <div class="campo">
<label class="form-control"><b>CNPJ:</b></label>
<input class="form-control" type="text" size="45" name="cnpj" value="<?php print "$cnpj" ?>"/> 
</div>
</fieldset>
<fieldset class="grupo">
		 <div class="campo">
<label class="form-control"><b>Endereço:</b></label>
<input class="form-control" type="text" size="45" name="endereco" value="<?php print "$endereco" ?>"/> 
</div>
</fieldset>
<fieldset class="grupo">
<div class="campo">
 <label class="form-control"><b>Numero:</b></label>
<input class="form-control" type="text" size="5" name="num" value="<?php echo "$num" ?>"/> 
</div>
</fieldset>
<fieldset class="grupo">
<div class="campo">
 <label class="form-control"><b>Bairro:</b></label>
<input class="form-control" type="text" size="20" name="bairro" value="<?php print "$bairro" ?>"/> 
</div>
</fieldset>
<fieldset class="grupo">
<div class="campo">
 <label class="form-control"><b>Email:</b></label> 
<input class="form-control" type="text" size="35" name="email" value="<?php print "$email" ?>"/>
</div>
</fieldset>
<fieldset class="grupo">
<div class="campo">
<label class="form-control"><b>Fone:</b></label>
<input class="form-control" type="text" size="10" name="fone" value="<?php print "$fone" ?>"/>
</div>
</fieldset>
<fieldset class="grupo">
<div class="campo">
<label class="form-control"><b>Diretor Financeiro- Tesoureiro:</b></label>
<input class="form-control" type="text" size="40" name="gestor" value="<?php print "$gestor" ?>"/>
</div>
</fieldset>
<fieldset class="grupo">
<div class="campo">
<label class="form-control"><b>Diretor Geral:</b></label>
<input class="form-control" type="text" size="40" name="diretor" value="<?php print "$diretor" ?>"/>
</div>
	</fieldset>
<fieldset class="grupo">
<div class="campo">
 <input type="submit" value="Alterar órgao" name="alteraorgao"/>
  <input type="reset" name="Limpar" value="Limpar" />
		 <input type="button" name="cancela" value="Cancelar" onclick="window.location.href='../admin/admin.php'"/>
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
