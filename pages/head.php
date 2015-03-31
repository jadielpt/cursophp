<?php
 error_reporting(E_ALL);
 ini_set("display_errors", 1);
 date_default_timezone_set('America/Sao_Paulo');
 
 require_once  ("funcoes/funcConexaoDB.php");
 require_once ("funcoes/funcBusca.php");
 require_once ("funcoes/funcRotaUrl.php")
 ?>
<!DOCTYPE html>
<head>
    <title>Schoolofnet</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css"  rel="stylesheet" href="css/bootstrap.css"/>
  </head>
  
<body>
    <div>
   
    <ul class="nav nav-pills ">
          <li><a href="home">Home</a></li>
          <li><a href="empresa">Empresa</a></li>
	  <li><a href="produtos">Produtos</a></li>
	  <li><a href="servicos">Serviços</a></li>
	  <li><a href="contato">Contato</a></li>
          <li><a href="adm/index.php">Configuração</a></li>
     </ul>  
        <div>
            <form class="form-inline" name="search" method="post" action="busca">
              <div class="form-group">
                  <input type="text" name="buscar" class="form-control" id="" placeholder="">
              </div>
                <input type="submit" name="submit" value="Buscar" class="btn">
            </form>
        </div>
        
        
</div>
    
  
