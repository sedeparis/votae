
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<title>esqueci senha</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap CSS -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link rel="icon" type="image/jpg" href="img/icone_barra.jpg">
<!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	
	<?php
		include_once 'conecta_banco.php';
		$data= date('H:i:s');
		$token=md5($data);
		$date=date("d/m/Y");
		$email = $_POST['email'];
		// Cria uma variável que terá os dados do erro
		$erro = false;

		//trata
		// Verifica se o POST tem algum valor
		if ( !isset( $_POST['email'] ) || empty( $_POST['email'] ) ) {
		$erro = 'O e-mail não foi informado.';
		}
		// ver tamanho dos campos
		if(strlen($email) <= 6)
		{
		$erro = 'Erro: E-mail deve ter mais de 6 caracteres.<br>';
		}
		// limpa tags e espaços nome
		$email = trim( strip_tags( $email ) );
		
		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				$erro = 'E-mail inválido.';
			}

		//******************************************
		
		// *******************  Se existir algum erro, mostra o erro
		if ( $erro ) {
		echo $erro;
		echo '<br>Volte para a tela anterior e informe os dados corretamente!<br> <a href=esqueci_senha.php>Voltar</a>';
		} else
		{
			// cria a instrução SQL que vai selecionar os dados dos itens
			$query = ("SELECT * FROM user WHERE email ='$email'");
			// executa a query
			$dados = mysqli_query($mysqli, $query) or die(mysql_error($mysqli));
			// transforma os dados em um array
			$linha = mysqli_fetch_assoc($dados);
			// calcula quantos dados retornaram
			$total = mysqli_num_rows($dados);
			?>
			<?php
			// se o número de resultados for maior que zero, mostra os dados//
			if($total == 0) {echo "Usuário não encontrado <a href='index.php'>Voltar</a>";}
			else 
				{
					if($total > 0) 
					{
						// inicia o loop que vai mostrar todos os dados
						do 
						{
							$nome=$linha['nome'];
							$senha=$linha['senha'];
							$iduser=$linha['id'];
							$token=substr("$token",'4',10)
							?>
							<?php
							// finaliza o loop que vai mostrar os dados
						}
						while($linha = mysqli_fetch_assoc($dados));
						// fim do if
					}
				
				?>
				<?php
					$senhatemp = ("UPDATE user SET senha='$token' WHERE id='$iduser'");
					$resultado = mysqli_query ($mysqli, $senhatemp) or die(mysqli_error($mysqli));
					{echo "Alteração efetuada com sucesso!";}
					
					// cria a instrução SQL que vai selecionar os dados do token
						$query = ("SELECT * FROM user WHERE id ='$iduser' AND (senha= '$token')");
						// executa a query
						$dados = mysqli_query($mysqli, $query) or die(mysql_error($mysqli));
						// transforma os dados em um array
						$linha = mysqli_fetch_assoc($dados);
						// calcula quantos dados retornaram
						$total = mysqli_num_rows($dados);
						?>
						<?php
						// se o número de resultados for maior que zero, mostra os dados//
						if($total == 0) {echo "Usuário não encontrado <a href='index.php'>Voltar</a>";}
						else 
							{
								if($total > 0) 
								{
									 //require_once("PHPMailer/PHPMailerAutoload.php");
									 require "PHPMailer/class.PHPMailer.php";
									 require "PHPMailer/class.SMTP.php";
									
									$mail = new PHPMailer();
									$mail -> CharSet = 'utf-8';
									$mail -> IsSMTP ();
									$mail -> host = 'smtp.gmail.com';
									$mail -> SMTPAuth = 'true';
									$mail -> SMTPSecure = 'ssl';
									$mail -> Username = 'sedeparis@gmail.com';
									$mail -> Password = 'N@Zbozo+';
									$mail -> Port = 465 ;
									$mail -> IsHTML (true);
									$mail -> AddReplyTo($email, $nome);
									$mail -> From = $email;
									$mail -> Sender = $email;
									$mail -> FromName = $email;
									$mail -> AddAddress('sedeparis@gmail.com');
									$mail -> AddBCC($email);
									$mail -> FromName = $email;
									
									$mail -> IsHTML (true);
									$mail -> Subject = 'Recuperação de senha';
									$mail -> Body = 'Olá '
									.$nome.
									'! Recebemos seu pedido de 
									recuperação de senha. Segue abaixo o link para alterar sua senha.
									<br><a href="editar_senha.php?token'
									.$token.
									'">editar_senha.php?token'
									.$token.
									'</a>.<br> Enviado em : '
									.$date
									;
									$enviando= $mail-> Send();
									if ($enviando) 
									{ echo '<script>alert("Acesse seu e-mail e verfique
									o e-mail recebido de confirmação")</script>';
									}
									else 
									{ echo '<script> alert("Não foi possível enviar")</script>';
										
									}
								}
							}
				}		
				?>
			<?php
			// tira o resultado da busca da memória
			mysqli_free_result($dados);
		}
			?>
			
</div>
</body>
</html>
