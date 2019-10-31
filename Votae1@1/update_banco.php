<?php
 include_once 'conecta_banco.php';
 
 /*criar tabela recuperar senha
 $sql = "CREATE TABLE recover_solicitation (
  id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(200) NOT NULL,
  rash VARCHAR(200) NOT NULL,
  status INT(20) NOT NULL DEFAULT 0
)";

if ($mysqli->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $mysqli->error;
}

$mysqli->close();*/
?>

<?php
 include_once 'conecta_banco.php';
 
 //criar tabela recuperar senha
 $sql = "CREATE TABLE recover_solicitation_adm (
  id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(200) NOT NULL,
  rash VARCHAR(200) NOT NULL,
  status INT(20) NOT NULL DEFAULT 0
)";

if ($mysqli->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $mysqli->error;
}

$mysqli->close();
?>
