<?php
    require_once("templates/header.php");
?>

    <div id="main-container" class="container-fluid">
        <div class="col-md-12">
            <div class="row" id="auth-row">

                <div class="col-md-4" class="login-container">
                    <h2>Entrar</h2>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="email" class="form-control" placeholder="Digite seu E-mail" id="email" name="email" >
                        </div>
                        <div class="form-group">
                            <label for="password">Senha:</label>
                            <input type="password" class="form-control" placeholder="Digite sua senha" id="password" name="password" >
                        </div>
                        <input type="submit" class="btn card-btn" value="Entrar">
                    </form>
                </div>


                <div class="col-md-4" class="register-container">
                    <h2>Criar conta</h2>
                    <form action="" method="POST">

                    </form>
                </div>
                
            </div>
        </div>

    </div>

<?php
    require_once("templates/footer.php");
?>