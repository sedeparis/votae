<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<link rel="icon" type="image/jpg" href="../../img/icone_barra.jpg" />
		<title>Sccef: Cadastro de fornecedor</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="../../css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/custom.css" media="screen"/>
	</head>
	<body>
		<div class="container">
			<?php
			//tira pontos do cnpj
				$chars = array(".","/","-");
			 	$cnpj = str_replace($chars,"",$cnpj);
				
				
				//tira pontos do fone
				
				$chars2 = array(".","/","-");
				$fone = str_replace($chars2,"",$fone);
				
				//tira pontos do cep
				
				$chars3 = array(".","/","-");
				$cep = str_replace($chars3,"",$cep);
				
						// executa query
			// verifica se o cnpj jã não está cadastrado
			$dupesql =  "SELECT * FROM cadfornecedor where (cnpj = '$cnpj')";
			$duperaw = mysqli_query($mysqli, $dupesql);

			if (mysqli_num_rows($duperaw) > 0) 
			{
				echo "Esse Cnpj já foi cadastrado nessa base de dados.";
				echo '<br>Volte para a tela anterior e informe os dados corretamente!<br> <a href=../cd_fornecedor.php>Voltar</a>';
			} else 
			{

				// Cria uma variável que terá os dados do erro
				$erro = false;

				//trata nome
				// Verifica se o POST tem algum valor nome
				if ( !isset( $_POST['nome'] ) || empty( $_POST['nome'] ) ) {
				$erro = 'O Campo nome não foi informado.';
				}
				// ver tamanho dos campos
						
						if(strlen($nome) <= 5)
				{
				   $erro = 'Erro: Nome deve ter descrição com mais de 5 caracteres.<br>';
				} 
				// limpa tags e espaços nome
				$nome = trim( strip_tags( $nome ) );
				
				//********************************************************
				
				//trata endereço
				// Verifica se o POST tem algum valor endereco
				if ( !isset( $_POST['endereco'] ) || empty( $_POST['endereco'] ) ) {
				$erro = 'O Campo endereço não foi informado.';
				}
				if(strlen($endereco) <= 5)
				{
				  $erro = 'Erro: Endereço deve ter descrição com mais de 5 caracteres.<br>';
				} 
				// limpa tags e espaços endereco
				$endereco = trim( strip_tags( $endereco ) );
		
				//********************************************************
				//trata numero
				// Verifica se o POST tem algum valor numero
				if ( !isset( $_POST['nmr'] ) || empty( $_POST['nmr'] ) ) {
				$erro = 'O Campo número não foi informado.';
				}
				if (!is_numeric($nmr)) {
				$erro = "Campo número deve ser só numero";}

				//********************************************************
				//trata bairro
				// Verifica se o POST tem algum valor bairro
				if ( !isset( $_POST['bairro'] ) || empty( $_POST['bairro'] ) ) {
				$erro = 'O Campo bairro não foi informado.';
				}
				if(strlen($bairro) <= 3)
				{
				  $erro = 'Erro: Bairro deve ter descrição com mais de 3 caracteres.<br>';
				  
				} 
				//********************************************************
				//trata e-mail
				// limpa tags e espaços email
				$email = trim( strip_tags( $email ) );
				
				// Verifica se o POST tem algum valor email
				if ( ( ! isset( $email ) || ! filter_var( $email, FILTER_VALIDATE_EMAIL ) ) && !$erro ) {
				$erro = 'Envie um email válido.';
				}
					
				
				// limpa tags e espaços email
				$email = trim( strip_tags( $email ) );
			
			//********************************************************
				//trata fone
				// Verifica se o POST tem algum valor bairro
				if ( !isset( $_POST['fone'] ) || empty( $_POST['fone'] ) ) {
				$erro = 'O Campo telefone não foi informado.';
				}
				if(strlen($fone) <= 8)
				{
				   $erro = 'Erro: Telefone deve ter mais de 8 caracteres.<br>';			   
				} 
				
				// limpa tags e espaços fone
				$fone = trim( strip_tags( $fone ) );
				
				//********************************************************
				//trata cep
				// Verifica se o POST tem algum valor bairro
				if ( !isset( $_POST['cep'] ) || empty( $_POST['cep'] ) ) {
				$erro = 'O Campo CEP não foi informado.';
				}
				if(strlen($cep) <= 7)
				{
				   $erro = 'Erro: Cep deve ter mais de 8 caracteres.<br>';			   
				} 
				
				// limpa tags e espaços fone
				$cep = trim( strip_tags( $cep ) );
				//********************************************************
				//trata responsavel
				// Verifica se o POST tem algum valor bairro
				if ( !isset( $_POST['responsavel'] ) || empty( $_POST['responsavel'] ) ) {
				$erro = 'O Campo responsavel não foi informado.';
				}
				if(strlen($responsavel) <= 8)
				{
				   $erro = 'Erro: responsavel deve ter mais de 8 caracteres.<br>';			   
				} 
				
				// limpa tags e espaços fone
				$responsavel = trim( strip_tags( $responsavel ) );
				
				//********************************************************
				//trata cod_cidades
				// Verifica se o POST tem algum valor cidade
				if ( !isset( $_POST['cod_cidades'] ) || empty( $_POST['cod_cidades'] ) ) {
				$erro = 'O Campo cidade não foi informado.';
				}
				if (!is_numeric($cidade)) {
				$erro = "Você esqueceu de Selecionar a cidade";}

				//********************************************************
				//trata cod_estados
				// Verifica se o POST tem algum valor estado
				if ( !isset( $_POST['cod_estados'] ) || empty( $_POST['cod_estados'] ) ) {
				$erro = 'O Campo estado não foi informado.';
				}

				if (!is_numeric($uf)) {
				$erro = "Você esqueceu de Selecionar o estado";}
				
				//********************************************************
				
				//trata banco
				// Verifica se o POST tem algum valor banco
				if ( !isset( $_POST['banco'] ) || empty( $_POST['banco'] ) ) {
				$erro = 'O Campo banco não foi informado.';
				}
				
				if (!is_numeric($banco)) {
				$erro = "Você esqueceu de Selecionar o banco";}
				
				//********************************************************
				//trata agencia
				// Verifica se o POST tem algum valor agencia
				if ( !isset( $_POST['agencia'] ) || empty( $_POST['agencia'] ) ) {
				$erro = 'O Campo agencia não foi informado.';
				}
				if(strlen($agencia) <= 3)
				{
				  $erro = 'Erro: Agencia deve ter mais de 3 caracteres.<br>';
				} 
				// limpa tags e espaços agencia
					$agencia = trim( strip_tags( $agencia ) );
				
				//********************************************************
				//trata conta
				// Verifica se o POST tem algum valor conta
				if ( !isset( $_POST['conta'] ) || empty( $_POST['conta'] ) ) {
				$erro = 'O Campo conta não foi informado.';
				}
					if(strlen($conta)<= 3)
				{
				   $erro = 'Erro: Conta deve ter mais de 3 caracteres.<br>';
				  
				} 
				// limpa tags e espaços conta
					$conta = trim( strip_tags( $conta ) );
					
					
						// limpa tags e espaços operador
					$operador = trim( strip_tags( $operador ) );
				
				// *******************  Se existir algum erro, mostra o erro
				if ( $erro ) {
				echo $erro;
				echo '<br>Volte para a tela anterior e informe os dados corretamente!<br> <a href=../cd_fornecedor.php>Voltar</a>';
				} else 
					{
						

						$sql = mysqli_query($mysqli, "INSERT INTO cadfornecedor(nome, cnpj, endereco, nmr, bairro, cidade, uf, email, fone, banco, agencia, conta, operador, situacao, cep, responsavel)
						VALUES('$nome', '$cnpj', '$endereco', '$nmr', '$bairro', '$cidade', '$uf', '$email', '$fone', '$banco', '$agencia', '$conta', '$operador', '1', '$cep','$responsavel')");
						$resultado = mysqli_query ($mysqli, $sql);
						{echo "<p class='center'>Cadastro efetuado com sucesso!</p>";}
					
				echo '<br /><p class="center"><img src="../../img/salva.gif"/></p><br />';
					
			echo "<meta HTTP-EQUIV='refresh' CONTENT='3;URL=../painelr.php'>";
			}
			}
			?>
		</div>
	</body>
</html>