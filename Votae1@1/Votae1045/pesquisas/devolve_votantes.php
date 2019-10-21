<html>
<head>
<title>Usuario</title>
	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	  <link rel="stylesheet" href="../css/reset.css" type="text/css"/>
	 <link rel="stylesheet" href="../css/codigo.css" type="text/css"/>
	 </head>
<body>
<div id="frame">
<p>Esse código criptografado sera usado para voce poder votar.
Anote-o ou imprima-o para se identificar no acesso a área de votantes.</p>
<br />
<span class="obrig">Identificação de votação</span>
<?php
include ("../conecta_banco.php");
// seleciona o ultimo usuario
$sql = mysql_query("SELECT * FROM votantes ORDER BY idv DESC LIMIT 1");
 $count = mysql_num_rows($sql);
if ($count == 0) 
{ echo "Ninguém votou ainda<br />"; } 
while ($dados = mysql_fetch_array($sql))
{ echo "<br /><br /><span>$dados[nomev]</span>";}
?>
</div>
<br><br><br><hr>
 <input type="button" name="voltar" value="Voltar" onclick="window.location.href='../painel.php'"/>
</body>
</html>