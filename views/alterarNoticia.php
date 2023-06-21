<?php
include("blades/header.php");
include("../models/conexao.php");
?>
<style>
    <?php include '../css/style.css'; ?>
</style>

<div class="container voltar"class="d-flex justify-content-center">
<div id="menuLeft" class="d-flex justify-content-center">
    <a class="btn rounded lbl-button" id="btn-voltar" href="painel.php">Voltar</a>
</div>
</div>

<?php
$PostagemCodigo = $_GET["postagemCodigo"];
$query = mysqli_query($conexao, "SELECT * FROM noticias
INNER JOIN imgs ON noticiaImgId = imgId
INNER JOIN infos ON noticiaInfoId = infoId
INNER JOIN usuarios ON noticiaUsuarioId = usuarioId
where noticiaId = $PostagemCodigo");
?>
<div class="container p-5 rounded shadow mt-5" id="attPost">
    <table border='1' width="800px" class="table  ">
        <?php

        while ($exibe = mysqli_fetch_array($query)) {
            ?>
            <form name="atualizar" action="../controllers/editarNovaNoticia.php" method="post"
                enctype="multipart/form-data">
                <input type="hidden" name="postagemCodigo" value="<?php echo $exibe[0] ?>">
                <input type="hidden" name="imagemCodigo" value="<?php echo $exibe[1] ?>">
                <input type="hidden" name="imagemNome" value="<?php echo $exibe[6] ?>">
                <input type="hidden" name="noticiaCodigo" value="<?php echo $exibe[2] ?>">
                <tr>
                    <td class="text-center align-middle"><img src="../imgs/<?php echo $exibe[6] ?>" width="100px"></td>
                    <td class="align-middle p-3">
                        <!-- Coloco um id chamado blog_codigo no href  -->

                        <label class="form-label lbl-input">Título <b></label>
                        <?php echo $exibe[1] ?>
                        <input class="form-control" type="text" name="noticiaTitulo" value="<?php echo $exibe[8] ?>">
                        <br>
                        <label class="form-label lbl-input">Criado Por <b></label>
                        <select id="postagemUsuario" name="postagemUsuarioCodigo" required="postagemUsuario"
                            class="form-select">
                            <option selected value="<?php echo $exibe[3] ?>"><?php echo $exibe[12] ?></option>
                            <?php
                            $res = mysqli_query($conexao, "SELECT * FROM usuarios 
                                WHERE usuarioId != '$exibe[3]' ");
                            while ($row = mysqli_fetch_array($res)) {
                                $usuarioCodigo = $row['usuarioId'];
                                $co_name = $row['usuarioNome'];
                                ?>
                                <option value="<?php echo $usuarioCodigo; ?>"><?php echo $co_name; ?></option>
                            <?php } ?>
                        </select>

                        </b>
                        <hr>
                        <textarea class="form-control" type="text" name="noticiaCorpo" ><?php echo $exibe[9] ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td class="align-middle">
                        <label class="form-label lbl-input" id="textAlt">Alterar Imagem</label><br>
                        <input type="hidden" name="MAX_FILE_SIZE" value="99999999">
                        <input type="file" name="arquivo" class="mt-5"/>
                    </td>
                    <td class="text-center">
                        <input class="btn btn-danger mt-5 w-50" id="alt" type="submit" value="Atualizar">
                    </td>
                </tr>
            </form>
        <?php } ?>
    </table>
</div>

<?php include("blades/footer.php"); ?>