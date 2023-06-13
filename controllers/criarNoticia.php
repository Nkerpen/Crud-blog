<?php
include("../models/conexao.php");

$diretorio = "../imgs/";
$arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;
$destino = $diretorio . "/" . $arquivo['name'][0];
$extension = pathinfo($destino, PATHINFO_EXTENSION);
$ImgName = $arquivo['name'][0];

$ImgNameRandom = md5($ImgName) . "." . $extension;

if ($extension == "png") {
    move_uploaded_file($arquivo['tmp_name'][0], $diretorio . "/" . $ImgNameRandom);
} else {
    die("Arquivo não é compatível com o tipo 'PNG'");
}

mysqli_query($conexao, "INSERT INTO imgs(imgNome, imgNomeAleatorio) VALUES ('$ImgName', '$ImgNameRandom')");

$id_imgTable_last = mysqli_insert_id($conexao);




$PostagemUsuarioCodigo = $_POST["postagemUsuarioCodigo"];

$NoticiaTitulo = $_POST["infoTitulo"];
$NoticiaCorpo = $_POST["infoCorpo"];
$NoticiaData = strtotime($_POST["infoData"]);
$NoticiaData = date('Y-m-d H:i:s', $NoticiaData);

mysqli_query($conexao, "INSERT INTO infos (infoTitulo, infoCorpo, infoData) VALUES ('$NoticiaTitulo', '$NoticiaCorpo', '$NoticiaData');");

$id_noticiaInfo_last = mysqli_insert_id($conexao);


mysqli_query($conexao, "INSERT INTO noticias (noticiaImgId, noticiaInfoId, noticiaUsuarioId) 
VALUES ('$id_imgTable_last', '$id_noticiaInfo_last' , '$PostagemUsuarioCodigo');");

header("location:../index.php");

?>