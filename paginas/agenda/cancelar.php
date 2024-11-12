
<header class="d-flex justify-content-end align-items-center p-3">
      <div>
        <a class="btn btn-danger mb-2" href="index.php?escolha=agenda"><i class="bi bi-arrow-return-left"></i> Voltar</a>
    </div>
</header>


<?php
$idcancelar = mysqli_real_escape_string($conexao,$_GET["id"]);
$sql = "DELETE FROM cliente WHERE id = '{$idcancelar}'";

mysqli_query($conexao, $sql) or die ("Erro ao Cancelar Agendamento. " . mysqli_error($conexao));
    echo "<h2>Agendamento cancelado</h2>";

?>