<?php
include("../models/conexao.php");

$UsuarioCodigo = $_GET["usuario_codigo"];

mysqli_query($conexao, "DELETE from noticias where noticiaUsuarioId = $UsuarioCodigo");
mysqli_query($conexao, "DELETE from usuarios where usuarioId = $UsuarioCodigo");

header("location:../views/verUsuarios.php");
?>