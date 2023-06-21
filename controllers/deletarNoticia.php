<?php
include("../models/conexao.php");
$dir = "../imgs/";
$varPostagemCodigo = $_GET["postagemCodigo"];
$file = $_GET["imagemNome"];
$varNoticiaInfoCodigo = $_GET["noticiaInfoCodigo"];
unlink($dir . $file);
mysqli_query($conexao, "DELETE from noticias where noticiaId = $varPostagemCodigo");
mysqli_query($conexao, "DELETE from infos where infoId = $varNoticiaInfoCodigo");
mysqli_query($conexao, "DELETE from imgs where imgNomeAleatorio = '$file'");
header("location:../views/painel.php");

?>