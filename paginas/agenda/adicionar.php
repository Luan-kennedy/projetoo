
<header>Adicionar</header>

<?php
$nomeagendar = mysqli_real_escape_string($conexao,$_POST["nome"]);
$telefoneagendar = mysqli_real_escape_string($conexao,$_POST["telefone"]);
$emailagendar = mysqli_real_escape_string($conexao,$_POST["email"]);
$dataagendar = mysqli_real_escape_string($conexao,$_POST["dataa"]);
$horaagendar = mysqli_real_escape_string($conexao,$_POST["hora"]);

$sql = "INSERT INTO cliente(nome,telefone,email,dataa,hora)
         VALUES('{$nomeagendar}','{$telefoneagendar}', '{$emailagendar}', '{$dataagendar}', '{$horaagendar}')";

 mysqli_query($conexao,$sql) or die ("Erro ao executar cadastro." . mysqli_error($conexao));

    echo "A Reserva foi feita com Sucesso! ";
?>
