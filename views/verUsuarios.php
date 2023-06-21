<?php
include("blades/header.php");
include("../models/conexao.php");
?>
<style>
    <?php include '../css/style.css'; ?>
</style>
<div class="container voltar">
<div id="menuLeft" class="d-flex justify-content-center">
    <a class="btn rounded lbl-button" id="btn-voltar" href="../index.php">Voltar</a>
</div>
</div>

<div class="container" class="d-flex justify-content-center">
<div id="lista-usuarios" class="mt-5">
    <form action='verUsuarios.php' method="post">
        <div id="bloco-buscar">
            <input class="form-control" type="text" name="buscar" size="20">
            <input class="btn btn-warning" type="submit" value="Buscar">
        </div>
    </form>
    <hr>

    <?php

    if (empty($_POST { "buscar"})) {
        ?>
        <!-- Para mostrar a tabela complesta: -->
        <table width="500px" class="table table-striped table-hover">
            <tr>
                <td>Nome</td>
                <td>Editar</td>
                <td>Excluir</td>
            </tr>
            <?php
            $query = mysqli_query($conexao, "SELECT * FROM usuarios ");
            while (
                $exibe = mysqli_fetch_array($query)
            ) {
                $vogal = ($exibe[4] == 'm') ? 'o' : 'a'; 
                ?>
                <tr>
                    <td>
                        
                            <?php echo $exibe[1] ?>
                    
                    </td>
                    <td>
                        <a class="btn btn-success"
                            href="mudarUsuario.php?usuario_codigo=<?php echo $exibe[0] ?>">Editar</a>
                    </td>
                    <td><a class="btn btn-danger"
                            href="../controllers/deletarDados.php?usuario_codigo=<?php echo $exibe[0] ?>">Excluir</a>
                    </td>
                </tr>


            <?php } ?>
        </table>

        

        <?php
    } else {
        $varBuscar = $_POST["buscar"];
        ?>

        <table width="500px" class="table table-bordered table-striped table-hover">
            <tr>
                <td><b>Nome</b></td>
                <td><b>Editar</b></td>
                <td><b>Excluir</b></td>
            </tr>
            <?php
            $query = mysqli_query($conexao, "SELECT * FROM usuarios where usuarioNome LIKE '%$varBuscar%'");
            while (
                $exibe = mysqli_fetch_array($query)
            ) {
                $vogal = ($exibe[4] == 'm') ? 'o' : 'a'; 
                ?>

                <tr>
                    <td>
                        <b>
                            <?php echo strtoupper($vogal) . " Usuári$vogal <b>" . $exibe[1] . "</b> possui esse email: <b>" . $exibe[2] . "</b>" ?>
                        </b>
                    </td>
                    <td>
                        <a class="btn btn-success rounded-pill"
                            href="mudarUsuario.php?usuario_codigo=<?php echo $exibe[0] ?>">Editar</a>
                    </td>
                    <td><a class="btn btn-danger rounded-pill"
                            href="../controllers/deletarDados.php?usuario_codigo=<?php echo $exibe[0] ?>">Excluir</a>
                    </td>
                </tr>


            <?php } ?>
        </table>
        <?php
    }
    ?>
</div>
</div>
<?php
include("blades/footer.php");
?>