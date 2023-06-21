<?php
include("blades/header.php");
include("../models/conexao.php");
?>
<style>
    <?php include '../css/style.css'; ?>
</style>
<div class="container voltar">
<div id="menuLeft" class="d-flex justify-content-center">
<a class="btn rounded lbl-button" id="btn-voltar" href="../index.php">Voltar</a>
</div>

<div class="container" class="d-flex justify-content-center">
<div id="bloco-novaNoticia" class="mt-5">
    <h1 class="mt-5">Nova Notícia</h1>
    <form name="criarNoticia" action="../controllers/criarNoticia.php" enctype="multipart/form-data" method="post">

        <label class="form-label lbl-input mt-2">Escolher Usuário:</label>
        <select id="postagemUsuario" name="postagemUsuarioCodigo" required="postagemUsuario" class="form-select">
            <?php
            $res = mysqli_query($conexao, "SELECT * FROM usuarios");
            while ($row = mysqli_fetch_array($res)) {
                $usuarioCodigo = $row['usuarioId'];
                $co_name = $row['usuarioNome'];
                ?>
                <option value="<?php echo $usuarioCodigo; ?>"><?php echo $co_name; ?></option>
            <?php } ?>
        </select>

        
        <br>
        <label class="form-label lbl-input mt-2">Título:</label>
        <input class="form-control" type="text" name="infoTitulo">

        <label class="form-label lbl-input mt-2">Notícia:</label>
        <textarea class="form-control" type="text" name="infoCorpo"></textarea>
        <br>
        <label class="form-label lbl-input mt-2">Data:</label>
        <input class="form-control" type="date" name="infoData">
        <br>
        <hr>

        <label class="form-label mt-3 text-white">Selecione a imagem da notícia:</label><br>
        
        <div>
            <input type="hidden" name="MAX_FILE_SIZE" value="99999999">
            <input type="file" name="arquivo[]" multiple="multiple" />
            
        </div>
        <input class="btn btn-success mt-5" type="submit" value="Criar Postagem">
</div>
</form>


</div>

</div>
</div>
</div>
<?php include("blades/footer.php"); ?>