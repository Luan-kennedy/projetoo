<?php

session_start();


if(!isset($_SESSION["id"])){ // verifica se estite login de acordo com o nivel de acesso, caso nao esteja logado mata o script e apresenta o caminho para logar
    die("<h2>Você não pode acessar esta Pagina porque não esta logado.</h2>
    <h3><p><a href=\"login.php\"><i class=\"bi bi-box-arrow-in-right\"></i> Login</a></p></h3>"); 
}

?>