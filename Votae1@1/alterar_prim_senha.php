<?php
include "conecta_banco.php";
$senhap= 'votae';
session_start();
if (!isset ($_SESSION ["email"]) || !isset($_SESSION ["senha"])){
header("Location: verifica_senha.php");
exit;
} else {
echo "";
}
$user = $_SESSION['email'];
echo $logado;
include "exec_alterar_senha.php";
?>
</div>
</body>
</html>