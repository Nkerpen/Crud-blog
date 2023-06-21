<?php
include("../models/conexao.php");

$UsuarioNome = $_POST["usuarioNome"];
$UsuarioEmail = $_POST["usuarioEmail"];
$UsuarioSenha = $_POST["usuarioSenha"];
$UsuarioSexo = $_POST["usuarioSexo"];

mysqli_query($conexao, "INSERT INTO usuarios (usuarioNome, usuarioSenha, usuarioEmail, usuarioSexo) VALUES ('$UsuarioNome', '$UsuarioSenha', '$UsuarioEmail', '$UsuarioSexo');");

header("location:../index.php");
?>