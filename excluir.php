<?php

// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nicetask";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica se a conexão foi bem sucedida
if (!$conn) {
  die("Conexão falhou: " . mysqli_connect_error());
}

// receber o ID do valor a ser excluído
$id = $_POST['id'];

// executar a consulta de exclusão
$sql = "DELETE FROM tabela WHERE id = $id";

if (!mysqli_query($conn, $sql)) {
  die('Erro ao excluir valor do banco de dados: ' . mysqli_error($conn));
}

// redirecionar para a página anterior ou enviar uma resposta de sucesso ao cliente
header("Location: ".$_SERVER['HTTP_REFERER']);
exit();

?>