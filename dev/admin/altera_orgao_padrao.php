<?php
include_once "../conecta_banco.php";
?>
<html>
<head>
	<title>Alterar orgao padrão
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
</head>
<body>
	<div class="container">
		<h2>Alterar orgão-entidade</h2>
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
			if($total > 0) { echo 'ok';
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
			
		?>
		<p>
		<form name="form" method="post" action="salva/saltera_orgao_padrao.php" onSubmit="return validacao();">
			<fieldset class="grupo">
			<div class="campo">
			<input type="hidden" name="idorgao" value="<?php print $linha['idorgao']?>"/>
			</div>
			</fieldset>
			<fieldset class="grupo">
			<div class="campo">
			<label class="form-control"><b>CNPJ:</b></label>
			<input  type="text" name="cnpj" id="cnpj" onkeyup="FormataCnpj(this,event)" 
					onblur="if(!validarCNPJ(this.value)){alert('CNPJ Informado é inválido');
					this.value='';}" maxlength="18"  
					class="form-control input-md" ng-model="cadastro.cnpj"  value="<?php  print $cnpj ?>" />
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
			<input class="form-control" type="numero" size="5" name="num" value="<?php echo "$num" ?>"/>
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
	<script type="text/javascript">


		function FormataCnpj(campo, teclapres)
		{
			var tecla = teclapres.keyCode;
			var vr = new String(campo.value);
			vr = vr.replace(".", "");
			vr = vr.replace("/", "");
			vr = vr.replace("-", "");
			tam = vr.length + 1;
			if (tecla != 14)
			{
			if (tam == 3)
			campo.value = vr.substr(0, 2) + '.';
			if (tam == 6)
			campo.value = vr.substr(0, 2) + '.' + vr.substr(2, 5) + '.';
			if (tam == 10)
			campo.value = vr.substr(0, 2) + '.' + vr.substr(2, 3) + '.' + vr.substr(6, 3) + '/';
			if (tam == 15)
			campo.value = vr.substr(0, 2) + '.' + vr.substr(2, 3) + '.' + vr.substr(6, 3) + '/' + vr.substr(9, 4) + '-' + vr.substr(13, 2);
			}
		}



		function validarCNPJ(cnpj) 
		{

			cnpj = cnpj.replace(/[^\d]+/g,'');

			if(cnpj == '') return false;

			if (cnpj.length != 14)
			return false;

			// Elimina CNPJs invalidos conhecidos
			if (cnpj == "00000000000000" || 
			cnpj == "11111111111111" || 
			cnpj == "22222222222222" || 
			cnpj == "33333333333333" || 
			cnpj == "44444444444444" || 
			cnpj == "55555555555555" || 
			cnpj == "66666666666666" || 
			cnpj == "77777777777777" || 
			cnpj == "88888888888888" || 
			cnpj == "99999999999999")
			return false;

		// Valida DVs
			tamanho = cnpj.length - 2
			numeros = cnpj.substring(0,tamanho);
			digitos = cnpj.substring(tamanho);
			soma = 0;
			pos = tamanho - 7;
			for (i = tamanho; i >= 1; i--) {
			soma += numeros.charAt(tamanho - i) * pos--;
			if (pos < 2)
			pos = 9;
			}
			resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
			if (resultado != digitos.charAt(0))
			return false;

			tamanho = tamanho + 1;
			numeros = cnpj.substring(0,tamanho);
			soma = 0;
			pos = tamanho - 7;
			for (i = tamanho; i >= 1; i--) {
			soma += numeros.charAt(tamanho - i) * pos--;
			if (pos < 2)
			pos = 9;
			}
			resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
			if (resultado != digitos.charAt(1))
			return false;

			return true;

		}

		function validacao() 
		{
			if(document.form.cnpj.value=="")
			{
			alert("Por favor insira o cnpj.");
			document.form.cnpj.focus();
			return false;
			}

		}

	</script>
</body>
</html>