<?php
include("../models/conexao.php");

$PostagemCodigo = $_POST["postagemCodigo"];
$NoticiaCodigo = $_POST["noticiaCodigo"];
$UsuarioCodigo = $_POST["postagemUsuarioCodigo"];
$ImagemCodigo = $_POST["imagemCodigo"];


if (!file_exists($_FILES['arquivo']['tmp_name']) || !is_uploaded_file($_FILES['arquivo']['tmp_name'])) {
    echo 'miau';
} else {
    $diretorio = "../imgs/";
    $file = $_POST['imagemNome'];
    unlink($diretorio . $file);

    $arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;
    $destino = $diretorio . "/" . $arquivo['name'];
    $extension = pathinfo($destino, PATHINFO_EXTENSION);
    $ImgName = $arquivo['name'];
    $ImgNameRandom = md5($ImgName) . "." . $extension;

    if ($extension == "png") {
        move_uploaded_file($arquivo['tmp_name'], $diretorio . "/" . $ImgNameRandom);
        mysqli_query($conexao, "UPDATE imgs SET imgNome = '$ImgName', 
        imgNomeAleatorio = '$ImgNameRandom' 
        WHERE imgId = '$ImagemCodigo'");
    }
}


$NoticiaTitulo = $_POST["noticiaTitulo"];
$NoticiaCorpo = $_POST["noticiaCorpo"];
/* $NoticiaData = strtotime($_POST["noticiaData"]);
$NoticiaData = date('Y-m-d H:i:s', $NoticiaData); */

mysqli_query($conexao, "UPDATE noticias SET noticiaUsuarioId = $UsuarioCodigo 
WHERE noticiaId='$PostagemCodigo'");



mysqli_query($conexao, "UPDATE infos SET infoTitulo = '$NoticiaTitulo',
infoCorpo = '$NoticiaCorpo'
WHERE infoId = '$NoticiaCodigo'");

header("location:../views/painel.php");

?>