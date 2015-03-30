<?php

error_reporting(E_ALL);
ini_set("display_erros",1);
date_default_timezone_set('America/Sao_Paulo');
require_once './funcoes/funcConexaoDB.php';


function criarDB(){
    $pathDB = 'mysql:host=localhost';
    $user   = 'root';
    $senha  = '100731';
    $options = [PDO::MYSQL_ATTR_INIT_COMMAND=> 'SET NAMES UTF8'];
    $dbname = 'new';
    $table  = 'pages';
    
    try {
      $pdo = new PDO($pathDB,$user,$senha,$options);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $pdo->query("CREATE DATABASE IF NOT EXISTS $dbname");
      $pdo->query("use $dbname");
      print("Criado o banco de dados {$dbname}<br>");
      $tab = "CREATE table $table(
              id INT(10) AUTO_INCREMENT NOT NULL PRIMARY KEY,
              pages VARCHAR(250)NOT NULL,
              conteudo_titulo VARCHAR(250) NOT NULL,
              conteudo_principal VARCHAR(250) NOT NULL,
              conteudo_content VARCHAR(250) NOT NULL);";
      $pdo->exec($tab);
      print("Tabela foi criada {$table}<br>");
              
              
      
    } catch (Exception $e) {
        die("Error: Código: {$e->getCode()} | Mensagem: {$e->getMessage()}");
        
    }
    return $pdo;
}

criarDB();

$cadastarDados = array('home','Página Home', 'Todo conteúdo home', 'Descrição');
cadastrarDb('pages',$cadastarDados);
$cadastarDados = array('empresa','Página Empresa', 'Todo conteúdo principal sobre nossa empresa', 'Descrição');
cadastrarDb('pages',$cadastarDados);
$cadastarDados = array('produtos','Página Produtos', 'Todo conteúdo principal dos nossos produtos', 'Descrição do conteúdo da página produtos');
cadastrarDb('pages',$cadastarDados);
$cadastarDados = array('servicos','Página Serviços', 'Todo conteúdo principal dos nossos serviços', 'Descrição do conteúdo da página serviços');
cadastrarDb('pages',$cadastarDados);
$cadastarDados = array('404','Página 404', 'ERROR: Tente novamente!', 'A pagina não exixte!');
cadastrarDb('pages',$cadastarDados);


function criarDbAdmin() {
    $pathDB  = 'mysql:host=localhost';
    $dbname  = 'new';
    $user    = 'root';
    $pass    = '100731';
    $options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];
    $table   = 'admin';

    try {
        $pdo = new PDO($pathDB, $user, $pass, $options);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->query("CREATE DATABASE IF NOT EXISTS $dbname");
        $pdo->query("use $dbname");
        $tabl ="CREATE table $table(
        id INT( 10 ) AUTO_INCREMENT NOT NULL PRIMARY KEY,
        login VARCHAR( 15 ) NOT NULL, 
        email VARCHAR( 250 ) NOT NULL,
        senha VARCHAR( 250 ) NOT NULL);";
        $pdo->exec($tabl);
        print("A tabela {$table} foi criada com sucesso!<br>");
        
    } catch (PDOException $e) {
        die("Error: Código: {$e->getCode()} | Mensagem: {$e->getMessage()} |  Arquivo: {$e->getFile()} | linha: {$e->getLine()}");
    }
    return $pdo;
}

function passCrypt($senha)
{
    $senhaCrypt = password_hash($senha, PASSWORD_DEFAULT);
    return $senhaCrypt;
}
criarDbAdmin();
$cadastarDados = array('admin','admin@email.com', passCrypt('1007'));
$cadastrarDbAdmin = cadastrarDbAdmin('admin',$cadastarDados);