<?php 
include ("../conecta_banco.php");
?>
<html lang="pt-BR">
<head>
<title>Cadastro de usuários
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

 if(document.form.id.value=="Selecione...")
{
alert("Por favor selecione o usuario.");
document.form.id.focus();
return false;
}

if(document.form.situacao.value=="Selecione...")
{
alert("Por favor informe a situacao.");
document.form.situacao.focus();
return false;
}


if(document.form.admin.value=="Selecione...")
{
alert("Por favor informe se o usuário é administrador.");
document.form.admin.focus();
return false;
}
}
	 </script>
</head>
 <body>
	 <img class="logo" src="../img/logo.jpg">
	 <div class="container">
<form name="form" method="POST" action="salva/salva_aprova_usuario.php" onSubmit="return validacao();">
<fieldset class="grupo">
		 <div class="campo">
	<?php	
	$query = mysqli_query($mysqli, "SELECT * FROM users");
?>
 <label for="">Selecione usuario</label>
 <select class="form-control" name="id">
 <option class="form-control" name="">Selecione...</option>
 <?php while($uas = mysqli_fetch_array($query)) { ?>
 <option class="form-control" value="<?php echo $uas['id'] ?>"><?php echo $uas['email'] ?></option>
 <?php } ?>
 </select>
 </div>
  </fieldset>
 <fieldset class="grupo">
		 <div class="campo">
 <?php	   
  $query = mysqli_query($mysqli, "SELECT * FROM cdsituacao");
?>
 <label for="">Selecione situacao</label>		     
 <select class="form-control" name="situacao">
 <option class="form-control" name="">Selecione...</option>
 <?php while($setor = mysqli_fetch_array($query)) { ?>
 <option class="form-control" value="<?php echo $setor['idsit'] ?>"><?php echo $setor['situacao'] ?></option>
 <?php } ?>
 </select>
 </div>
  </fieldset>
 <fieldset class="grupo">
  <div class="campo">
<label class="form-control">Administrador:</label> 
<select name="admin">
 <option>Sim</option>
 <option class="form-control" selected>Não</option>
 </select>
 </div>
 </fieldset>
 <fieldset class="grupo">
 <div class="campo">
<input type="submit" value="Gerenciar usuario" />
 <input type="button" name="cancela" value="Cancelar" onclick="window.location.href='admin.php'"/>
</div>
 </fieldset>
</form>
</div>
</body>
</html>