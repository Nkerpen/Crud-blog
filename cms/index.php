<?php
include("../models/conexao.php");
include("../views/blades/header.php");
?>
<style>
    <?php include '../css/style.css'; ?>
</style>
<div class="container p-5 mt-5 rounded" id="login">
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="card bg-dark text-white">
            <h3 class="p-3">Login</h3>
                <div class="card-body">
                    <form action="../controllers/login.php" method="POST">
                        <div class="mb-3">
                            <label>Usuario</label>
                            <input type="text" name="usuario" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Senha</label>
                            <input type="password" name="senha" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Confirmar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("../views/blades/footer.php")?>