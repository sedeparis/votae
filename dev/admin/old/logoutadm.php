<!DOCTYPE html>
 <html lang="pt-br">
 <head>
	 <title>Sair</title>
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
   </head>
	 <body>
	 <div class="container">
<?php
session_start ();
session_destroy();
header ("Location: ../index.html");
echo '<p class="center">Saida do sistema com sucesso!</p>';
?>
<?php
echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=../index.php'>";
?>
</body>
</html>