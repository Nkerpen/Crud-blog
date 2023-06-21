<?php
session_start();
if (empty($_SESSION)) {
    print "<script>location.href='../cms/index.php';</script>";
}
include("../models/conexao.php");
include("../views/blades/header.php");
?>
<style>
    <?php include '../css/style.css'; ?>
</style>

<div class="container p-5 mt-5 rounded text-white" id="painel">
    <h1 class="fw-bold">Painel</h1>
    <label class="form-label lbl-input mt-4 fs-5 text-white">Bem Vindo
        <?php echo $_SESSION["usuario"] ?>
    </label>
    <hr class="border border-light border-2 opacity-75">
    <br>
    <h3 class="fw-bold">Criar notícia</h3>
    <form name="criarNoticia" action="../controllers/criarNoticia.php" enctype="multipart/form-data" method="post">

        <label class="form-label lbl-input mt-2 text-white">Escolher Usuário:</label>
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
        <label class="form-label lbl-input mt-2 text-white">Título:</label>
        <input class="form-control" type="text" name="infoTitulo">

        <label class="form-label lbl-input mt-2 text-white">Notícia:</label>
        <textarea class="form-control" type="text" name="infoCorpo"></textarea>
        <br>
        <label class="form-label lbl-input mt-2 text-white">Data:</label>
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

<br><br><br>
<hr class="border border-dark border-2 opacity-100">
<br><br>
<div class="pct container">
<h3 class="fw-bold text-white">Gerenciar notícias</h3>
<table
    class="table table table-rounded border-secondary-emphasis table-striped table-hover shadow mt-5" id="tabela">
    <tr>
        <td class="fw-bold">Imagens</td>
        <td class="fw-bold">Postagens</td>
        <td class="fw-bold">Editar</td>
        <td class="fw-bold">Excluir</td>
    </tr>
    <?php
    $query = mysqli_query($conexao, "SELECT * FROM noticias 
        INNER JOIN imgs ON noticiaImgId = imgId
        INNER JOIN infos ON noticiaInfoId = infoId
        INNER JOIN usuarios ON noticiaUsuarioId = usuarioId");
    while ($exibe = mysqli_fetch_array($query)) {
        ?>
        <tr>
            <td class="text-center align-middle"><img src="../imgs/<?php echo $exibe[6] ?>" width="100px"></td>
            <td class="align-middle p-3">
                <h3>
                    <?php echo $exibe[8] ?>
                </h3>
                Criado por <b>
                    <?php echo $exibe[12] ?>
                </b><br>
                Data:
                <?php echo $exibe[10] ?>
                <hr>
                <?php echo wordwrap($exibe[9], 20, "<br/> ", true) ?>
            </td>
            <td class="text-center align-middle">
                <a class="btn btn-primary d-grid" href="alterarNoticia.php?postagemCodigo=<?php echo $exibe[0] ?>">Editar</a>
            </td>
            <td class="text-center align-middle">
                <a class="btn btn-danger d-grid"
                    href="../controllers/deletarNoticia.php?postagemCodigo=<?php echo $exibe[0] ?>&amp;imagemNome=<?php echo $exibe[6] ?>&amp;noticiaInfoCodigo=<?php echo $exibe[2] ?>">Excluir</a>
            </td>
        </tr>
    <?php } ?>
</table>
</div>
</div>
<?php include("../views/blades/footer.php"); ?>