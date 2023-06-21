<?php
include("../models/conexao.php");

$UsuarioCodigo = $_POST["userCodigo"];

$UsuarioNome = $_POST["userName"];
$UsuarioEmail = $_POST["userEmail"];
$UsuarioSenha = $_POST["userSenha"];
$UsuarioSexo = $_POST["userSexo"];

mysqli_query($conexao, "UPDATE usuarios SET usuarioNome='$UsuarioNome', 
                                        usuarioEmail='$UsuarioEmail',
                                        usuarioSenha='$UsuarioSenha',
                                        usuarioSexo='$UsuarioSexo'
                                        WHERE usuarioId= $UsuarioCodigo");

header("location:../views/verUsuarios.php")
    ?>