<?php
include("models/conexao.php");
include("views/blades/header.php");
session_start();
?>
<style>
    <?php include 'css/style.css'; ?>
</style>
<div class="container" class="d-flex justify-content-center">
</div>
<div id="mainContent" class="text-center d-flex justify-content-center">
<div class="text-white">

</div>
    <div id="lista-noticias" class="mt-5">
        <h1>Notícias</h1>

        <table width="700px" class="table table-white table-striped table-hover shadow mt-5 ">
            <tr>
                <td>Imagens</td>
                <td>Posts</td>
            </tr>
            <?php
            $query = mysqli_query($conexao, "SELECT * FROM noticias 
            INNER JOIN imgs ON noticiaImgId = imgId
            INNER JOIN infos ON noticiaInfoId = infoId
            INNER JOIN usuarios ON noticiaUsuarioId = usuarioId");
            while ($exibe = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td class="text-center align-middle">
                        <a class="text-primary" href="views/noticia.php?postagemCodigo=<?php echo $exibe[0] ?>">
                            <img src="imgs/<?php echo $exibe[6] ?>" width="150px">
                    </td>
                    <td class="align-middle p-3">
                        <a class="text-primary" href="views/noticia.php?postagemCodigo=<?php echo $exibe[0] ?>">
                            <!-- Coloco um id chamado blog_codigo no href  -->
                            <h4 class="site btn">
                                <?php echo $exibe[8] ?>
                            </h4>
                        </a>
                        <br>
                        Criado por
                            <?php echo $exibe[12] ?>
                        </br>
                        
                        <?php echo $exibe[10] ?>
                        <hr style="border-width:3px; color:black">
                        <?php echo substr($exibe[9], 0, 70) . "..." ?>

                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <?php include("views/blades/footer.php"); ?>