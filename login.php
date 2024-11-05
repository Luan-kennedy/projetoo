<?php
include ("db/conexao.php");

if(isset($_POST["loginn"]) && isset($_POST["senha"])) { // verifica se exixte a variavel login e senha//

    if(strlen($_POST["loginn"])== 0){ // confirma se o campo foi preenchido
        echo "Preencha seu login";

      } else if(strlen($_POST["senha"])== 0){ // confirma se o campo foi preenchido
      echo "Preencha sua Senha";

    } else {

      $loginn = mysqli_real_escape_string($conexao,$_POST["loginn"]);
      $senha = mysqli_real_escape_string ($conexao,$_POST["senha"]);
      
    

      $sql = "SELECT * FROM usuarios WHERE loginn = '$loginn' AND senha = '$senha'"; // consulta no banco a existencia do usuario
      $result = mysqli_query($conexao,$sql) or die("Falha na execução do codigo SQL" );// mata e limpa a sessao e apresenta oerro
      $dados = mysqli_fetch_assoc($result);

      $quant = mysqli_num_rows($result); // retorna o numero de linhas que a consulta retornou do banco

      if($quant == 1){ 
              session_start();
          

          $_SESSION["id"] = $dados["id"];
          $_SESSION["loginn"] = $loginn;
          $_SESSION["senha"] = $senha;
          $_SESSION["nome"] = $dados["nome"];
          $_SESSION["nivel"] = $dados["nivel"];

          if($dados["nivel"] ==1){// nivel 1 é nivel ADM os demais sao niveis 0;
          header ("Location: index.php?escolha=agenda");// redireciona para a pagina de controle
          } else{
            header("Location: index.php?escolha=agendauser");// 
          }
      } else{
          echo "<h3><br>Falha ao logar! Login (e)ou senha incorreto(s)</h3>";
      }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="./js/validform.js"></script>
    <title>Acesso ao Painel</title>
</head>
<body class="bg-secondary">
  <header class="d-flex justify-content-end align-items-center p-3">
      <div>
        <a class="btn btn-danger mb-2" href="index.php"><i class="bi bi-house-fill"></i> Inicio</a>
      </div>
  </header>

<form class="needs-validation" action="login.php" method="post" novalidate>
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Painel de Controle</h2>
              <p class="text-white-50 mb-5">Por favor, digite seu login e senha!</p>

              <div data-mdb-input-init class="form-outline form-white mb-4">
                <input type="text" name="loginn" id="loginn" class="form-control form-control-lg" required>
                <div class="invalid-feedback">Campo obrigatorio</div>
                <label class="form-label" for="loginn">Login</label>
              </div>

              <div data-mdb-input-init class="form-outline form-white mb-4">
                <input type="password" name="senha" id="senha" class="form-control form-control-lg"required>
                <div class="invalid-feedback">Campo obrigatorio</div>
                <label class="form-label" for="senha">Senha</label>
              </div>

              <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit" name ="entar">Entrar</button>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</form>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="./js/validform.js"></script>
</body>
</html>