<html>
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
	 
</head>
<body>
<div class="container">
<img src="../img/logop.jpg">
<?php
include "../conecta_banco.php";
?>
<?php
$h =" - ";
$user=$_POST['user'];
 // cria a instrução SQL que vai selecionar os dados dos itens
$query = ("SELECT * FROM users WHERE email ='$user'");
// executa a query
$dados =  mysqli_query($mysqli, $query) or die(mysqli_error($mysqli, $query));
// transforma os dados em um array
$linha = mysqli_fetch_assoc($dados);
// calcula quantos dados retornaram
$total = mysqli_num_rows($dados);
?>
<br />
<?php
	// se o número de resultados for maior que zero, mostra os dados//
	if($total == 0) {echo "Usuário não encontrado <a href='admin.php'>Voltar</a>";}
	if($total > 0) { 
		// inicia o loop que vai mostrar todos os dados
		do {
			$user=$linha['email'];
			$senha=$linha['senha'];
			$id=$linha['id'];
			echo $user;
?>
<form name="form_altera" method="post" action="salva/salva_alterar_senhaacf.php">
<fieldset class="grupo">
		 <div class="campo">
<input type="hidden" name="id" value="<?php print $linha['id']?>"/>
<label class="form-control">Senha Atual:</label> 
<input type="password" size="7" name="senha" maxlength="6" /> 
</div>
<div class="campo">
<label class="form-control"><b>Nova senha:</b></label>
<input type="password" size="7" name="senhac"   maxlength="6" />
	</div>
	</fieldset>
	<fieldset class="grupo">
	<div class="campo">
	<input type="submit" value="Alterar senha" name="alterasenha"/>
  <input type="reset" name="Limpar" value="Limpar" />
		 <input type="button" name="cancela" value="Cancelar" onclick="window.location.href='admin.php'"/>
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
<br />
<br />
</div>
</body>
</html>