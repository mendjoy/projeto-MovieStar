<?php

$host = "localhost";
$dbname = "moviestar";
$user = "root0";
$pass = "";

try {

  $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

  // Ativar o modo de erros
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
  // erro na conexão
  $error = $e->getMessage();
  echo "Erro: $error";
}


?>