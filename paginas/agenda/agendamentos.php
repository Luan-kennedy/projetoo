<?php
include("protect.php");
    if(isset($_SESSION["loginn"]) && isset($_SESSION["senha"])){
            
            $loginn = $_SESSION["loginn"];
            $senha = $_SESSION["senha"];
            $nome = $_SESSION["nome"];
            $nivel = $_SESSION["nivel"];

          $sql = "SELECT * FROM usuarios WHERE loginn = '$loginn' AND senha = '$senha'"; // consulta no banco a existencia do usuario
          $result = mysqli_query($conexao,$sql) or die("Falha na execução do codigo SQL" );// mata e limpa a sessao e apresenta oerro
          $dados = mysqli_fetch_assoc($result);

          $quant = mysqli_num_rows($result); // o numero de linhas que a consulta retornou do banco

         if($quant == 0){
            session_unset();
            session_destroy();
            header("Location: login.php");
            exit();
        }
    }else{

        header("Location: login.php");
            exit();
    }

    //variavel que mantem o texto digitado na pesquisa em exibiçao//
    $pesquisa = (isset($_POST["pesquisa"]))?$_POST["pesquisa"] :"";

$id= (isset($_GET['id']))?$_GET['id']:"";// ternaria para confirmar que o id existe//
$statuss = (isset($_GET['statuss']) and $_GET['statuss']=='0')? '1':'0';//ternaria para modificar no banco o status 0=nao concluido / 1= concluido//

// muda e armazena o valor no banco
$sql = "UPDATE cliente SET statuss = '{$statuss}' WHERE id = '{$id}'";
$result = mysqli_query($conexao,$sql);

?>
<header>
<header class="d-flex justify-content-between align-items-center p-3">
    <h2><i class="bi bi-book"></i> Agenda</h2>
    <div class="navbar-nav">
        <a href="logout.php" class="nav-link text-danger text-right">
            <i class="bi bi-person"> <?=$nome?> </i>: Sair 
            <i class="bi bi-box-arrow-right"></i>
        </a>
    </div>
</header>
        
</header>
<div>
    <a class="btn btn-primary mb-2" href="index.php?escolha=agendar"><i class="bi bi-person-add"></i> Agendar</a>
</div>

<div>
    <form action="index.php?escolha=agenda" method="post">
        <div class="input-group">
            <input class="form-control bg-secondary" value="<?=$pesquisa?>" type="text" name="pesquisa">    
            <button class="btn btn-success btn-sm" type="submit"><i class="bi bi-search"></i> </button>
        </div>
    </form>
</div>
    <div class="tabela">
    <table class= "table table-dark table-striped table-bordered">
        <thead>
            <tr>
                <th>id</th>
                <th>Status</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th>Data</th>
                <th>hora</th>
                <th>Editar</th>
                <th>Cancelar</th>
            </tr>
        </thead>
        <tbody>
            <?php // paginaçao da lista de agendamentos,
            // quantidade de itens por paginas, ternaria(if reduzido) para criar paginaçao apos 10 elementos.
            $quant =10;
            $pagina = (isset($_GET["pagina"]))?(int)$_GET['pagina']:1;
            $inicio = ($quant * $pagina) - $quant;// variavel da primeira pagina

            
            //trecho de busca no banco, formataçao e ordenamento na exibiçao//
            $sql = "SELECT id, UPPER(nome) AS nome, statuss, LOWER(email) AS email, telefone, DATE_FORMAT(dataa, '%d/%m/%y') AS dataa,
             DATE_FORMAT(hora , '%H:%i') AS hora FROM cliente 
            WHERE id ='{$pesquisa}' or nome LIKE '%{$pesquisa}%' ORDER BY statuss ASC LIMIT $inicio , $quant";
            $rs = mysqli_query($conexao,$sql) or die ("Erro na consulta ao Banco de dados" . mysqli_error($conexao));
            while($dados = mysqli_fetch_assoc($rs)){
            ?>

            <tr>
                <td class="text-norap"><?=$dados["id"]?></td>
                <td> <a class="btn btn-sm btn-secondary" href="index.php?escolha=agenda&pagina=<?=$pagina?>&id=<?=$dados['id']?>&statuss=<?=$dados['statuss']?>"><!--trecho do botao do status -->
                    <?php 
                    if($dados["statuss"]==0){
                        echo "<i class='bi bi-square'></i>";
                    } else{
                        echo "<i class='bi bi-check-square'></i>";
                    }
                    ?>
                    </td><!-- ate aqui-->

                <td class="text-norap"><?=$dados["nome"]?></td>
                <td class="text-norap"><?=$dados["telefone"]?></td>
                <td class="text-norap"><?=$dados["email"]?></td>
                <td class="text-norap"><?=$dados["dataa"]?></td>
                <td class="text-norap"><?=$dados["hora"]?></td>
                <td class="text-center"><a class="btn btn-outline-warning btn-sm" href="index.php?escolha=editar&id=<?=$dados["id"]?>"><i class="bi bi-pencil-square"></i></a></td>
                <td class="text-center"><a class="btn btn-outline-danger btn-sm" href="index.php?escolha=cancelar&id=<?=$dados["id"]?>"><i class="bi bi-trash"></i></a></td>
            </tr>
            <?php
            }
            ?>

        </tbody>
    </table>
    </div>

    <ul class="pagination justify-content-center">
    
    <br>
            
    <?php //consulta no banco os dados da tabela e armazena em cada variavel//
    $sqlinha = "SELECT id FROM cliente";
    $query_result = mysqli_query($conexao,$sqlinha) or die (mysqli_error($conexao));
    $numresult = mysqli_num_rows($query_result);
    $paginastotal = ceil($numresult/$quant);
            // paginaçao da exibiçao dos agendamentos//
    echo '<li class="page-item"><a class="page-link" href ="?escolha=agenda&pagina=1">Primeira Pagina</a></li>';

    if($pagina>3){
        ?>
           <li class="page-item"><a class="page-link" href="?escolha=agenda&pagina=<?php echo $pagina-1?>"> << </a></li>
        <?php

    }
    // condiçao para mostrar o total de paginas na barra de navegaçao//
    for($i=1;$i<=$paginastotal;$i++){

       if($i>=($pagina-2) && $i <= ($pagina +2)){
                if($i==$pagina){
                    echo "<li class='page-item active'><span class='page-link'>$i</span></li>";
                } else{
                    echo "<li class='page-item'><a class='page-link' href=\"?escolha=agenda&pagina={$i}\"> {$i} </a></li>";
                }
       }
    }

    if($pagina< ($paginastotal-2)){
        ?>
            <li class="page-item"><a class="page-link" href="?escolha=agenda&pagina=<?php echo $pagina +1?>"> >> </a></li>
        <?php
    
        }

    echo "<li class='page-item'><a class='page-link' href =\"?escolha=agenda&pagina=$paginastotal\">Ultima Pagina</a></li>";// navega direto para ultima pagina
    echo "<li class='page-item'><span class='page-link'>Total de Agendamentos: " . $numresult . "</span></li>";//mostra a quantidade total de agendamentos
    ?>
    </ul>