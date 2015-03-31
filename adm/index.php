<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
date_default_timezone_set('America/Sao_Paulo');
session_start();
require_once ('painel/funcoes/funcDb.php');

if(!empty($_SESSION['loginUser'])){
    header('Location: painel/');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SchoolOfNet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="painel/css/style.css" type="text/css" rel="stylesheet" />
    <link href="painel/css/bootstrap.css" type="text/css" rel="stylesheet" />
</head>
    <body>
        <div id="body-container">
            <div id="body-content">
                <section class="page container">
                    <div class="row">
                        <div class="page-header col-md-12">
                        <div class="col-md-10">
                            <h1>Configuração</h1>
                        </div>
                        <div class="col-md-2">
                                <a href="../home" class="btn btn-warning">Voltar para o Site</a>
                        </div>
                    </div>
                            <div class="col-md-6 col-md-offset-3">
                                <?php
                                if (isset($_POST['logar'])) {
                                    $login = $_POST['login'];
                                    $senha = $_POST['senha'];
                                    

                                    if(!$login || !$senha){
                                        echo '<div class="alert alert-danger">Todos os campos devem ser preenchidos!</div>';
                                    }else{
                                        $verificSenha = password_verify($senha, password());
                                        if(($verificSenha == true) && logarsistema($login)){
                                            $_SESSION['loginUser'] = $login;
                                            header('Location: '.$_SERVER['PHP_SELF']);
                                        }else{
                                            echo '<div class="alert alert-danger">Usuário ou senha inválida!</div>';
                                        }
                                    }
                                }
                                ?>
                                  <form action="" name="formAdmin" method="post" class="form-horizontal">
                                   
                                    <div class="control-group">
                                      <label>Login</label>
                                   <div class="controls">
                                      <input type="text" name="login" placeholder="login">
                                   </div>
                                   </div>
                                   
                                    <div class="control-group">
                                      <label>Senha</label>
                                   <div class="controls">
                                      <input type="password" name="senha" placeholder="Senha">
                                   </div>
                                   </div>
                                   
                                  
                                    <div class="controls">
                                      <button type="submit" class="btn btn-success" name="logar">Entrar</button>
                                    </div>
                                    
                                 
                                  </form>
                            </div>
                    </div>
                </section>
                <footer class="footer">
                  <p> Todos os direitos reservados @Jadiel Cordeiro Filho  | <?php echo date('Y');?></p>
                </footer>
         
            </div>
        </div>
    </body>
</html>