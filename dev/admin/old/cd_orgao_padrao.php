<?php 
include "../conecta_banco.php";
?>
 <html lang="pt-br">
 <head>
	 <title>Cadastro do orgão</title>
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
	  <script language="JavaScript" type="text/javascript" src="MascaraValidacao.js"></script> 
 
	   <script type="text/javascript">
	   function mascara(t, mask){
 var i = t.value.length;
 var saida = mask.substring(1,0);
 var texto = mask.substring(i)
 if (texto.substring(0,1) != saida){
 t.value += texto.substring(0,1);
 }
 }
 function validacao() {

if(document.form.uasg.value=="")
{
alert("Por favor informe o número de uasg.");
document.form.uasg.focus();
return false;
}

if(document.form.nome.value=="")
{
alert("Por favor informe o nome do órgão.");
document.form.nome.focus();
return false;
}
if(document.form.endereco.value=="")
{
alert("Por favor informe o endereco.");
document.form.endereco.focus();
return false;
}

if(document.form.cidade.value=="")
{
alert("Por favor informe a cidade.");
document.form.cidade.focus();
return false;
}

if(document.form.uf.value=="")
{
alert("Por favor informe o estado.");
document.form.uf.focus();
return false;
}
if(document.form.fone.value=="")
{
alert("Por favor informe o telefone do órgão.");
document.form.fone.focus();
return false;
}

if(document.form.email.value=="")
{
alert("Por favor informe o email do órgão.");
document.form.email.focus();
return false;
}

if(document.form.gestor.value=="")
{
alert("Por favor informe o nome do gestor financeiro do órgão.");
document.form.gestor.focus();
return false;
}
if(document.form.diretor.value=="")
{
alert("Por favor informe o nome do diretor do órgão.");
document.form.diretor.focus();
return false;
}

}
<!----- funcao cnpj valida---->
	   
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



function validarCNPJ(cnpj) {
 
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
	   
 </script>
   </head>
	  <body>
	 <div class="container">
	<h1>Cadastro de Orgão</h1>
	 
	<form name="form" method="post" action="salva/salva_orgao_padrao.php" onSubmit="return validacao();"> 
	<fieldset class="grupo">
	 <div class="campo">
			<label class="form-control">Nome do Órgão:</label>
<input class="form-control" type="text" name="nome" size="80" requerid="requerid" title="nome"/>
</div>
	</fieldset>
	<fieldset class="grupo">
	<div class="campo">
	 		<label class="form-control">Cnpj: <span class="obrig">*</span></label>
	<input class="form-control" type="text" name="cnpj" id="cnpj" onkeyup="FormataCnpj(this,event)" 
	onblur="if(!validarCNPJ(this.value)){alert('CNPJ Informado é inválido');
	this.value='';}" maxlength="18"  
	class="form-control input-md" ng-model="cadastro.cnpj" required />
		</div>
		</fieldset>
	<fieldset class="grupo">
	 <div class="campo">
		<label class="form-control">Endereço:</label>
		<input class="form-control" type="text" name="endereco" size="50" />
		</div>
		</fieldset>
		<fieldset class="grupo">
	 <div class="campo">
		<label class="form-control">Número:</label>
		<input class="form-control" type="text" name="num" size="5" />
		</div>
		</fieldset>
		<fieldset class="grupo">
	 <div class="campo">
		<label class="form-control">Bairro:</label>
		<input class="form-control" type="text" name="bairro" size="30" />
		</div>
		</fieldset>
				 <fieldset class="grupo">
					<div class="form-group">
						<label for="cod_estados">Estado:</label> <!--- *,class="form-control" --->
						<select class="form-control" name="cod_estados" id="cod_estados">
							<option class="form-control"   value="Selecione..."></option>
							<?php $sql = ("SELECT cod_estados, sigla FROM estados ORDER BY sigla");
							$res = mysqli_query($mysqli, $sql);
							
							while ( $row = mysqli_fetch_assoc( $res ) ) {
								echo '<option class="form-control"   value="'.$row['cod_estados'].'">'.$row['sigla'].'</option>';
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label    for="cod_cidades">Cidade:</label><!-- *,class="form-control"> -->
						<select class="form-control" name="cod_cidades" id="cod_cidades">
							<option class="form-control"   value=""> -- Escolha um estado -- </option>
						</select>

						<!--- script src="http://www.google.com/jsapi"/script --->

						<script type="text/javascript" src="../js/jsapi.js"></script>
						<script type="text/javascript">
							google.load('jquery', '1.3');
						</script>		
						<script language="JavaScript" type="text/javascript" src="../js/jquery.js"></script> 
						
						<script type="text/javascript">
							$(function()
							{
								$('#cod_estados').change(function()
								{
									if( $(this).val() ) 
									{
										$('#cod_cidades').hide();
										$('.carregando').show();
										$.getJSON('cidades.ajax.php?search=',{cod_estados: $(this).val(), ajax: 'true'}, function(j)
										{
											var options = '<option class="form-control"   value=""></option>';	
											
											for (var i = 0; i < j.length; i++) 
											{
												options += '<option class="form-control"   value="' + j[i].cod_cidades + '">' + j[i].nome + '</option>';
											}

											$('#cod_cidades').html(options).show();
											$('.carregando').hide();
										});
									}
									else 
									{
										$('#cod_cidades').html('<option class="form-control"   value="">– Escolha um estado –</option>');
									}
								});
							});
						</script>
					</div>
				</fieldset>
	 <div class="campo">
		<label class="form-control">Email:</label>
		<input class="form-control" type="text" name="email" size="30"/>
		</div>
		 <div class="campo">
		<label class="form-control">Telefone:</label>
		<input class="form-control" type="text" name="fone" size="10" maxlength="13"  onkeypress="mascara(this, '##-####-####')" />
		 </div>
		 </fieldset>
		 <fieldset class="grupo">
		 <div class="campo">
		<label class="form-control">Tesoureiro:</label>
		<input class="form-control" type="text" name="gestor" size="50"/>
		</div>
		 <div class="campo">
	<label class="form-control">Diretor:</label>
		<input class="form-control" type="text" name="diretor" size="50"/>
		</div>
		</fieldset>
		 <div class="campo">
	<input type="submit" name="enviar" value="Cadastrar Órgão"/>
	<input type="reset" name="Limpar" value="Limpar" />
		 <input type="button" name="cancela" value="Cancelar" onclick="window.location.href='admin.php'"/>
		 </div>
</form>
</div>
 </body>
 </html>