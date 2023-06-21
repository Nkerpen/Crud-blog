<?php
include("blades/header.php");
include("../models/conexao.php");
?>
<style>
    <?php include '../css/style.css'; ?>
</style>
<div class="container voltar" class="d-flex justify-content-center">
<div id="menuLeft" class="d-flex justify-content-center">
    <a class="btn rounded lbl-button" id="btn-voltar" href="../index.php">Voltar</a>
</div>
</div>
<div class="container" class="d-flex justify-content-center" >
<div id="lista-noticias-editar" class="mt-5">
    <table class="table table-white table-bordered table-striped table-hover shadow mt-5 ">

        <tr>
            <td>Imagens</td>
            <td>Postagens</td>
            <td>Editar</td>
            <td>Excluir</td>
        </tr>
        <?php
        $query = mysqli_query($conexao, "SELECT * FROM noticias 
        INNER JOIN imgs ON noticiaImgId = imgId
        INNER JOIN infos ON noticiaInfoId = infoId
        INNER JOIN usuarios ON noticiaUsuarioId = usuarioId
        ORDER BY noticiaInfoId");
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
                    <?php echo wordwrap($exibe[9], 20) ?>


                </td>
                <td class="text-center align-middle">
                    <a class="btn btn-primary"
                        href="alterarNoticia.php?postagemCodigo=<?php echo $exibe[0]?>">Editar</a>
                </td>
                <td class="text-center align-middle">
                    <a class="btn btn-danger"
                        href="../controllers/deletarNoticia.php?postagemCodigo=<?php echo $exibe[0] ?>&amp;imagemNome=<?php echo $exibe[6] ?>&amp;noticiaInfoCodigo=<?php echo $exibe[2] ?>">Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
</div>
<?php include("blades/footer.php"); ?>