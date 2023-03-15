
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD | Dashboard</title>

    <!-- Estilização da página -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Biblioteca de ícone da Google -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

        <!-- Como usar 

        <tag class="material-symbols-outlined"> identificador do ícone </tag html>

        Lista de ícones: https://fonts.google.com/icons

        -->

</head>
<body>
    
    <header>

        <a href="index.php">NiceTask <small class="material-symbols-outlined"> done </small> </a>

        <form action="#" method="get">

            <input type="search" placeholder="Pesquise por tarefas, comandos...">

            <button type="submit" class="material-symbols-outlined"> search </button>

        </form>
        
        <div class="menu">

            <img src="img/perfil.jpeg" alt="Eduardo Moreira">

            <p class="material-symbols-outlined" id="config-btn"> more_vert </p>

        </div>

        <div id="config-modal">
            <ul>
                <li><a href="#"> <span class="material-symbols-outlined">settings</span>Config.</a></li>
                <li><a href="#"> <span class="material-symbols-outlined">forum</span>Fórum</a></li>
                <li><a href="#"> <span class="material-symbols-outlined">logout</span>Sair</a></li>
            </ul>
        </div>


    </header>

    <main>

        <section id="dashboard">

            <h2>Dashboard <small class="material-symbols-outlined"> splitscreen </small> </h2>

            <article id="addtarefa">

                <h3>Adicionar tarefa</h3>

                <form action="processar.php" method="POST">

                    <input type="text" name="nome-tarefa" id="#" placeholder="Nome da tarefa..." required>

                    <button type="submit" class="material-symbols-outlined"> add </button>

                </form>

            </article>

            <hr>

            <h2 id="title-tarefas">Tarefas</h2>

            <article id="tarefas">

                <!-- <div class="tarefa">
                    <p>Nome da tarefa </p> 
                    <div class="options">
                        <button id="done-btn" class="material-symbols-outlined">done</button>
                        <button id="close-btn" class="material-symbols-outlined">close</button> 
                    </div>                    
                </div> -->

                <?php
                    // estabelecer conexão com o banco de dados
                    $conexao = mysqli_connect("localhost", "root", "", "nicetask");

                    // verificar se a conexão foi bem-sucedida
                    if (mysqli_connect_errno()) {
                        echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
                        exit();
                    }

                    // executar consulta SQL para recuperar todas as tarefas
                    $resultado = mysqli_query($conexao, "SELECT * FROM tabela");

                    // iterar sobre os resultados e imprimir na div
                    while ($linha = mysqli_fetch_assoc($resultado)) {
                        echo "<div class='tarefa'>";
                        echo "<p>" . $linha['tarefa'] . "</p>";
                        echo "<div class='options'>";
                        echo " <form action='excluir.php' method='POST'> <input type='hidden' name='id' value='" . $linha['id'] . "'> <button id='done-btn' class='material-symbols-outlined'>done</button>";
                        echo "<button id='close-btn' class='material-symbols-outlined'>close</button> </form>"  ;
                        echo "</div>";
                        echo "</div>";
                    }

                    // fechar conexão com o banco de dados
                    mysqli_close($conexao);
                ?>


            </article>

        </section>

    </main>

    <footer>

        <p>NiceTask&copy; Todos os direitos reservados</p>

    </footer>

    <script src="script.js"></script>

</body>
</html>
