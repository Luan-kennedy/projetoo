<?php
include("db/conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/meu-estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Agendamento</title>

</head>
<body>
    <header class="bg-dark">
<div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
        <img src="img/logo.jpg" alt="Agendador" width="120">
        </a>
   

   <div class="collapse navbar-collapse" id="navbarsuportado">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active"><a class="nav-link" href="index.php?escolha=home">Home</a></li>
            <li class="nav-item active"><a class="nav-link" href="./login.php">Login</a></li>
        </ul>
   </div>
   </nav>
</div>
</header>
<main>
    <div class="container">
    <?php
    $escolha = (isset($_GET["escolha"]))?$_GET["escolha"]:"home";
        switch ($escolha) {
            
            case 'agendauser':
                include("paginas/agenda/agendauser.php");
                break;
            case 'agenda':
                include("paginas/agenda/agendamentos.php");
                break;
            case 'agendar':
                include("paginas/agenda/agendar.php");
                break;
            case 'adicionar':
                include("paginas/agenda/adicionar.php");
                break;
            case 'editar':
                include("paginas/agenda/editar.php");
                break;
            case 'atualizar':
                include("paginas/agenda/atualizar.php");
                break;
            case 'cancelar':
                include("paginas/agenda/cancelar.php");
                break;            
            default:
                include("paginas/agenda/agendar.php");
                break;
        }

    ?>
    </div>
</main>
<footer class="container-fluid bg-dark">
        <div class="text-center">Sistema de Agendamentos</div>

</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="./js/validform.js"></script>
</body>
</html>
    
    