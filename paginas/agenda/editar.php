<?php

$id = $_GET["id"];

$sql = "SELECT * FROM cliente WHERE id = {$id}";
$result = mysqli_query($conexao,$sql) or die("Erro ao recuperar dados" . mysqli_error($conexao));
$dados = mysqli_fetch_assoc($result);

?>

<header><h2>Editar</h2></header>

<div>
    <form class="needs-validation" action="index.php?escolha=atualizar" method="post" novalidate>
        <div class="mb-3 col-3">
            <label class="form-label" for="idagendar">ID</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
                <input class="form-control" type="text" name="id" value= "<?=$dados["id"]?>" readonly>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="nomealterar">Nome</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person-circle"></i></span>             
                <input class="form-control" type="text" name="nome" placeholder= "<?=$dados["nome"]?>"required>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label"  for="telagendar">Telefone</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-telephone-forward-fill"></i></span>
                <input class="form-control" type="tel" name="telefone" placeholder= "<?=$dados["telefone"]?>"required>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label"  for="emailagendar">E-mail</label>
            <div class="input-group">
                <span class="input-group-text">@</span> 
                <input class="form-control" type="email" name="email" placeholder= "<?=$dados["email"]?>"required>
            </div> 
        </div>
        <div class="mb-3">
            <label class="form-label"  for="dataagendar">Data</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-calendar-date-fill"></i></span>  
                <input class="form-control" type="date" name="dataa" placeholder= "<?=$dados["dataa"]?>"required>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label"  for="horaagendar">Horario</label>
            <div class="input-group">  
                    <input class="form-control" type="time" name="hora" placeholder= "<?=$dados["hora"]?>"required>
            </div>
        </div>
        <div class="mb-3">
            <input class="btn btn-warning" type="submit" value="Atualizar" name="atualizar">
        </div>

    </form>
</div>