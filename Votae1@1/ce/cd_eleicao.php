<?php
session_start();
$_SESSION ["email"];
$_SESSION ["senha"];
echo "<br><br>";
echo "<div class='container'>";
echo "Voce está logado como: ";
echo $_SESSION['email'];
echo "</div>";
include ("../conecta_banco.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>cadastro de eleição</title>
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
function mascara(t, mask){
var i = t.value.length;
var saida = mask.substring(1,0);
var texto = mask.substring(i)
if (texto.substring(0,1) != saida){
t.value += texto.substring(0,1);
}
}
function validacao() {
<!----  nome da eleicao ---- >
if(document.form.eleicao.value=="")
{
alert("Por favor informe o nome da eleicao.");
document.form.eleicao.focus();
return false;
}
<!----  finalidade da eleicao ---- >
if(document.form.proposta.value=="")
{
alert("Por favor informe a pergunta central da eleição.");
document.form.proposta.focus();
return false;
}

<!----  tipo da eleicao ---- >
if(document.form.tipo.value=="Selecione...")
{
alert("Por favor informe o tipo da eleicao.");
document.form.tipo.focus();
return false;
}
<!----  tipo da data ---- >
if(document.form.data.value=="")
{
alert("Por favor informe a data da eleicao.");
document.form.data.focus();
return false;
}
<!----  tipo da hora ---- >
if(document.form.hora.value=="")
{
alert("Por favor informe hora da eleicao.");
document.form.hora.focus();
return false;
}
<!----  hora final ---- >
if(document.form.horaf.value=="")
{
alert("Por favor informe a hora final.");
document.form.horaf.focus();
return false;
}
<!---- permite voto branco  ---- >
if(document.form.branco.value=="Selecione...")
{
alert("Por favor informe se será permitida voto em branco.");
document.form.branco.focus();
return false;
}
<!---- permite voto nulo  ---- >
if(document.form.nulo.value=="Selecione...")
{
alert("Por favor informe se será permitido voto nulo.");
document.form.nulo.focus();
return false;
}
}

</script>
</head>
<body>

<div class="container">
<br>
<h2>Cadastro de Eleições</h2>
<form name="form" method="post" action="salva/salva_eleicao.php" onSubmit="return validacao();">
<fieldset class="grupo">
<div class="form-group">
<label>Nome da Eleição:</label>
<input type="text"  class="form-control" class="form-control" class="form-control"name="eleicao" size="40" id="eleicao">
</div>
</fieldset>
<fieldset class="grupo">
<div class="form-group">
<label>Proposta: </label>
<textarea class="form-control" name="proposta" cols="40" rows="5" placeholder="Questão central da eleição ou consulta. A escolha do eleitor responderá a qual pergunta? Ex: Quem voce escolhe para diretor?"></textarea>
</div>
</fieldset>
<div class="form-group">
<?php
// seleciona tipo de eleicao
$query = mysqli_query($mysqli, "SELECT * FROM tipo_eleicao");
?>
<label for="">Tipo de eleição</label>
<select class="form-control"  name="tipo">
<option class="form-control" name="">Selecione...</option>
<?php while($var = mysqli_fetch_array($query)) { ?>
<option class="form-control" value="<?php echo $var['idtipo'] ?>"><?php echo $var['tipo'] ?></option>
<?php } ?>
</select>
</div>
</fieldset>
<fieldset class="grupo">
<div class="form-group">
<label>Data da eleição:</label>
<input class="form-control" type="date" name="data" maxlength="12" required onkeypress="mascara(this, '##/##/####')">
<label>Hora início:</label>
<input class="form-control" class="form-control" type="time" id="horario" name="hora" maxlength="5" required onkeypress="mascara(this, '##:##')"/>
<label>Hora final:</label>
<input class="form-control" type="time" id="horari" name="horaf" maxlength="5" required onkeypress="mascara(this, '##:##')"/>
</div>
</fieldset>
<div class="form-group">
<?php
$query = mysqli_query($mysqli, "SELECT * FROM condicao");
?>
<label for="">Permite voto branco? Se sim o sistema criará uma chapa de código 100 para computar votos em branco.</label>
<select class="form-control" name="branco">
<option  class="form-control" class="form-control" name="">Selecione...</option>
<?php while($var = mysqli_fetch_array($query)) { ?>
<option class="form-control" value="<?php echo $var['id'] ?>"><?php echo $var['sn'] ?></option>
<?php } ?>
</select>
</div>
</fieldset>
<div class="form-group">
<?php
$query = mysqli_query($mysqli, "SELECT * FROM condicao");
?>
<label for="">Permite voto nulo? Se sim, o sistema criará uma chapa de código 99 para computar votos nulos.</label>
<select class="form-control" name="nulo">
<option class="form-control" class="form-control" name="">Selecione...</option>
<?php while($var = mysqli_fetch_array($query)) { ?>
<option  class="form-control" value="<?php echo $var['id'] ?>"><?php echo $var['sn'] ?></option>
<?php } ?>
</select>
</div>
</fieldset>
<fieldset class="grupo">
<div class="form-group">
<input type="submit" name="enviar" value="Cadastrar Eleição"/>
<input type="submit" name="limpar" value="Limpar"/>
<input type="button" name="cancela" value="Cancelar" onclick="window.location.href='admince.php'"/>
</div>
</fieldset>
</form>
</div>
</body>
</html>