<header><h2>Cancelar Agendamento</h2></header>

<?php
$idcancelar = mysqli_real_escape_string($conexao,$_GET["id"]);
$sql = "DELETE FROM cliente WHERE id = '{$idcancelar}'";

mysqli_query($conexao, $sql) or die ("Erro ao Cancelar Agendamento. " . mysqli_error($conexao));
    echo "Agendamento cancelado";

?>