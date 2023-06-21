<?php
include("blades/header.php");
include("../models/conexao.php");
?>
<style>
    <?php include '../css/style.css'; ?>
</style>
<?php
$UsuarioCodigo = $_GET["usuario_codigo"];
$query = mysqli_query($conexao, "SELECT * FROM usuarios where usuarioId = $UsuarioCodigo ");
while ($exibe = mysqli_fetch_array($query)) {
    ?>
    <div class="container voltar" class="d-flex justify-content-center">
    <div id="menuLeft" class="d-flex justify-content-center">
        <a class="btn rounded lbl-button" id="btn-voltar" href="../index.php">Voltar</a>
    </div>
    </div>

    <div class="container" class="d-flex justify-content-center">
    <div id="lista-usuarios" class="mt-5">
        <h1>Editar Dados de <?php echo $exibe[1] ?><h1>

            </h1></h1>
        </i></b></h3>
        <form action="../controllers/novosDados.php" method="post">
            <input type="hidden" name="userCodigo" value="<?php echo $exibe[0] ?>">
            <label class="form-label">Nome</label>
            <input class="form-control" type="text" name="userName" value="<?php echo $exibe[1] ?>">
            <label class="form-label">Email:</label>
            <input class="form-control" type="text" name="userEmail" value="<?php echo $exibe[2] ?>">
            <label class="form-label">Senha:</label>
            <input class="form-control" type="text" name="userSenha" value="<?php echo $exibe[3] ?>">
            <br>

            <label class="form-label">Sexo:</label>
            <input type="radio" name="userSexo" value="m" <?php echo ($exibe[4] == 'm') ? 'checked' : "" ?>>Masculino
            <input type="radio" name="userSexo" value="f" <?php echo ($exibe[4] == 'f') ? 'checked' : "" ?>>Feminino
            <br>
            <input class="btn btn-success mt-3" type="submit" value="Atualizar">

        </form>
    </div>
    </div>
    <?php
}
include("blades/footer.php"); ?>