<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
date_default_timezone_set('America/Sao_Paulo');
session_start();
require_once 'funcoes/funcDb.php';
require_once 'funcoes/funcRota.php';

if(!($_SESSION['loginUser'])){
    header('Location: ../index.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Schoolofnet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" type="text/css" rel="stylesheet" />
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" />
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
                            <a href="logoff.php"><button class="btn btn-warning" type="submit" name="alterar" >SAIR</button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <ul class="nav list-group">
                            <li class="list-group-item active">Paginas</a></li>
                            <li><a href="../index.php">Listar</a></li>
                        </ul>
                    </div>
                   
                    <?php require_once(route());?> 
                    
                </div>
            </section>
            <footer class="footer">
                <p>Configuração</p>
                <p> Todos os direitos reservados@Jadiel Cordeiro Filho <?php echo date('Y'); ?></p>
            </footer>
        </div>
    </div>
    <script src="ckeditor/ckeditor.js"></script>
    <script>
            CKEDITOR.replace( 'editor1' );
    </script>
</body>
</html>