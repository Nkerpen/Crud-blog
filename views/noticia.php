<?php include("../models/conexao.php");
include("blades/header.php");
?>
<style>
    <?php include '../css/style.css'; ?>
</style>
<?php
?>
<div class="container voltar"class="d-flex justify-content-center">
<div id="menuLeft" class="d-flex justify-content-center">
    <a class="btn rounded lbl-button" id="btn-voltar" href="../index.php">Voltar</a>
</div>
</div>
<div class="container" class="d-flex justify-content-center">
<div id="lista-noticias-n" class="mt-5">
    <table class="table table-striped table-bordered border-2 table-hover">

        <?php
        $varPostagemCodigo = $_GET["postagemCodigo"];
        $query = mysqli_query($conexao, "SELECT * FROM noticias
        INNER JOIN imgs ON noticiaImgId = imgId
        INNER JOIN infos ON noticiaInfoId = infoId
        INNER JOIN usuarios ON noticiaUsuarioId = usuarioId
        where noticiaId = $varPostagemCodigo");
        while ($exibe = mysqli_fetch_array($query)) {
            ?>
            <h1>Notícias
            </h1>
            <tr>
                <td class="text-center align-middle p-5">
                    <img src="../imgs/<?php echo $exibe[6] ?>" width="200px">
                </td>
                <td class="p-5">
                    <h3>
                        <?php echo $exibe[8] ?>
                    </h3>
                    Criado por <b>
                        <?php echo wordwrap($exibe[12], 20, "<br/>", true) ?>
                    </b><br>
                    Data:
                    <?php echo $exibe[10] ?>
                    <hr>
                    <?php echo wordwrap($exibe[9], 20) ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <h4 class="text-center">Confira mais Notícias de
                        <i>
                            <?php echo $exibe[12] ?>:
                        </i>
                    </h4>
                </td>
            </tr>
            <?php
            $queryDois = mysqli_query($conexao, "SELECT * FROM noticias
                    INNER JOIN imgs ON noticiaImgId = imgId
                    INNER JOIN infos ON noticiaInfoId = infoId
                    INNER JOIN usuarios ON noticiaUsuarioId = usuarioId where noticiaUsuarioId = $exibe[3] and noticiaId != $exibe[0]");
            while ($exibe2 = mysqli_fetch_array($queryDois)) {
                ?>
                <tr>
                    <td class="text-center align-middle">
                        <img src="../imgs/<?php echo $exibe2[6] ?>" width="70px">
                    </td>
                    <td class="align-middle">
                        <p>
                            <?php echo $exibe2[8] ?>
                        </p>
                        <hr>
                        <p>
                            <?php echo substr($exibe2[9], 0, 30) . "..." ?>
                        </p>

                </tr>
                <?php
            }
        } ?>

    </table>
</div>
</div>
</body>

</html>