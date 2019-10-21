<?php
// session_start();
// $_SESSION['email'];
// $_SESSION['senha'];
include ("conecta_banco.php");
?>
<!DOCTYPE HTML>
<html lang="pt-BR">
<head>
<title>Alterar senha esquecida</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link rel="icon" type="image/jpg" href="img/icone_barra.jpg">
<!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-----  bootstrap ------>
</head>
<body>
	<div class="container">
		<img src="img/baile.gif"/>
		<br>
		<br>
		<?php
		$id=$_POST['id'];
		$senhac=md5($_POST['senhac']);
		$senhacnf = md5($_POST['senhacnf']);
		 // Cria uma variável que terá os dados do erro
				$erro = false;

				//trata 
				// Verifica se o POST tem algum valor 
				if ( !isset( $_POST['id'] ) || empty( $_POST['id'] ) ) {
				$erro = 'Erro ao recuperar id. solicite suporte.';
				}
				// ver se é número ou selecione...
				if (!is_numeric($id)) {
				$erro = "Erro ao recuperar id numérico. solicite suporte";}
				
				// limpa tags e espaços 
				$id = trim( strip_tags($id) );
				
				//********************************************************
				
				
				//trata 
				// Verifica se o POST tem algum valor 
				if ( !isset( $_POST['senhac'] ) || empty( $_POST['senhac'] ) ) {
				$erro = 'Erro: nova Senha não informada.';
				}
				// ver tamanho dos campos
						
				if(strlen($senhac) <= 5)
				{
				   $erro = 'Erro: Senha deve ter mais de 5 caracteres.<br>';
				} 
				
				// limpa tags e espaços 
				$senhac = trim( strip_tags($senhac) );
				
				//********************************************************
				//trata 
				// Verifica se o POST tem algum valor 
				if ( !isset( $_POST['senhacnf'] ) || empty( $_POST['senhacnf'] ) ) {
				$erro = 'Erro: Confirmação da nova Senha não informada.';
				}
				// ver tamanho dos campos
						
				if(strlen($senhacnf) <= 5)
				{
				   $erro = 'Erro: Confirmação da Senha deve ter mais de 5 caracteres.<br>';
				} 
				
				// limpa tags e espaços 
				$senhacnf = trim( strip_tags($senhacnf) );
				
				//********************************************************
				
				if ($senhac <> $senhacnf) {
				   $erro = 'Erro: As senhas não são iguais.<br>';  
				}
				
				//********************************************************
				// *******************  Se existir algum erro, mostra o erro
				if ( $erro )
				{
				echo $erro;
				echo '<br>Volte para a tela anterior e informe os dados corretamente!<br> <a href=exec_alterar_senha.php>Voltar</a>';
				} 
				    else 
					{
                		$sql = mysqli_query($mysqli, "UPDATE user SET senha='$senhac' WHERE id='$id'");
                		$resultado = mysqli_query ($mysqli, $sql);
                		{echo "Senha alterada com sucesso!";}
						
						//voltar para painel
					echo "<meta HTTP-EQUIV='refresh' CONTENT='3;URL=index.php'>";
					}
		?>
	</div>
</body>
</html>