<?php
include("../models/conexao.php");
session_start();
$usuario = $_POST["usuario"];
$senha = $_POST["senha"];
$query = mysqli_query($conexao, "SELECT * FROM usuarios where usuarioNome = '$usuario';");

if ($exibe = mysqli_fetch_array($query)){
    if($_POST["usuario"] == $exibe[1] && $_POST["senha"] == $exibe[2]){
    session_start();
    $_SESSION['usuario']= $exibe[1];
    $_SESSION['senha']= $exibe[2];
    header("location: ../views/painel.php");
    }
    }
    
    else{
        echo "<script>";
        echo "alert('Usuário e/ou senha inválidos !'); window.location='../cms/index.php'";
        echo "</script>";    
}
?>