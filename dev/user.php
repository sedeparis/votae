
							<?php
							
								include_once "conecta_banco.php";
								
									// cria a instrução SQL que vai selecionar os dados eleicao
									$querya = sprintf("SELECT * FROM user WHERE email = '$email'
								AND senha= '$senha'
								AND situacao = 1 ");
									// executa a query
									$dadosa = mysqli_query($mysqli, $querya) or die(mysqli_error($mysqli));
									// transforma os dados em um array
									$linhaa = mysqli_fetch_assoc($dadosa);
									// calcula quantos dados retornaram
									$totala = mysqli_num_rows($dadosa);
									?>
									<?php
									// se o número de resultados for maior que zero, mostra os dados//
									if($totala > 0) {
									// inicia o loop que vai mostrar todos os dados
									do {
								echo	$email = $linhaa['email'];
								echo	$id = $linhaa['id'];
								echo	$nome = $linhaa['nome'];
									?>
									<?php
									// finaliza o loop que vai mostrar os dados
									}while($linhaa = mysqli_fetch_assoc($dadosa));
									// fim do if
									}
									
							?>