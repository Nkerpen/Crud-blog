<?php
include("blades/header.php");
?>
<style>
    <?php include '../css/style.css'; ?>
</style>
<div class="container voltar" class="d-flex justify-content-center">
<div id="menuLeft" class="d-flex justify-content-center">
    <a class="btn rounded lbl-button" id="btn-voltar" href="../index.php">Voltar</a>
</div>
</div>

<div class="container" class="d-flex justify-content-center">
<div id="formulario" class="mt-5">
    <form action="../controllers/cadastrarUsuario.php" method="post">
        <label class="form-label lbl-input">Nome</label> 
        <input class="form-control" type="text" name="usuarioNome">
        <label class="form-label lbl-input mt-4">Email:</label>
        <input class="form-control" type="text" name="usuarioEmail">
        <label class="form-label lbl-input mt-4">Senha:</label>
        <input class="form-control" type="text" name="usuarioSenha">
        <br>
        <div id="containerBtnSexo">
            <label class="form-label lbl-input">Sexo:</label>
            <div>
                <input type="radio" name="usuarioSexo" value="m">Masculino
                <input type="radio" name="usuarioSexo" value="f">Feminino<br>
            </div>
        </div>
        <input class="btn btn-success mt-5 " type="submit" value="Cadastrar Usuário">

    </form>
</div>
</div>
<?php include("blades/footer.php"); ?>