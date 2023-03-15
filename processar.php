<?php
// Recebe os dados do formulário
$nometarefa = $_POST['nome-tarefa'];

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

// Insere os dados no banco de dados
$sql = "INSERT INTO tabela (tarefa) VALUES ('$nometarefa')";

if (mysqli_query($conn, $sql)) {
  header('Location: index.php');
} else {
    header('Location: index.php');
  echo "Erro ao inserir dados: " . mysqli_error($conn);
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);

?>