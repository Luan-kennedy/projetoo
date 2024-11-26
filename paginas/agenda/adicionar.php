
<?php
$nomeagendar = mysqli_real_escape_string($conexao,$_POST["nome"]);
$telefoneagendar = mysqli_real_escape_string($conexao,$_POST["telefone"]);
$emailagendar = mysqli_real_escape_string($conexao,$_POST["email"]);
$dataagendar = mysqli_real_escape_string($conexao,$_POST["dataa"]);
$horaagendar = mysqli_real_escape_string($conexao,$_POST["hora"]);

$sql = "INSERT INTO cliente(nome,telefone,email,dataa,hora)
         VALUES('{$nomeagendar}','{$telefoneagendar}', '{$emailagendar}', '{$dataagendar}', '{$horaagendar}')";

 mysqli_query($conexao,$sql) or die ("Erro ao executar cadastro." . mysqli_error($conexao));

    echo "<h2>A Reserva foi feita com Sucesso!</h2> ";
?>
  <header class="d-flex justify-content-end align-items-center p-3">
      <div>
        <a class="btn btn-danger mb-2" href="index.php?escolha=agendar"><i class="bi bi-arrow-return-left"></i> Voltar</a>
      </div>
  </header>