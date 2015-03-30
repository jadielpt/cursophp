<?php

function conectarDb()
{
    $pathDb    = 'mysql:host=localhost;dbname=new';
    $user   = 'root';
    $pass   = '100731';
    $options= [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8' ];

    try {
        $pdo = new PDO($pathDb, $user, $pass, $options);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Error: Código: {$e->getCode()} <br> Mensagem: {$e->getMessage()} <br> Arquivo: {$e->getFile()} <br> linha: {$e->getLine()}");
    }

    return $pdo;
}

function listar($tabela)
{
    $pdo = conectarDb();
    
    try {
        $listar = $pdo->prepare("select * from $tabela");
        $listar->execute();
        $dados = $listar->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error: Código: {$e->getCode()} | Mensagem: {$e->getMessage()} |  Arquivo: {$e->getFile()} | linha: {$e->getLine()}");
    }
    return $dados ;

}


function deletar($tabela, $id)
{
    $pdo = conectarDb();
    
    try {
        $deletar = $pdo->prepare("delete from {$tabela} where id = :id");
        $deletar->bindValue(":id", $id);
        $deletar->execute();
    } catch (PDOException $e) {
        die("Error: Código: {$e->getCode()} | Mensagem: {$e->getMessage()} |  Arquivo: {$e->getFile()} | linha: {$e->getLine()}");
    }
}



function listarId($tabela, $id)
{
    $pdo = conectarDb();
    
    try {
        $listarPeloId = $pdo->prepare("select * from {$tabela} where id = :id");
        $listarPeloId->bindValue(":id", $id);
        $listarPeloId->execute();
        $dados = $listarPeloId->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $exc->getTraceAsString();
        die("Error: Código: {$e->getCode()} | Mensagem: {$e->getMessage()} |  Arquivo: {$e->getFile()} | linha: {$e->getLine()}");
    }
    return $dados ;
}

function atualizar()
{
    if(isset($_POST['alterar'])){
        $id = addslashes(trim($_POST['id']));
        $pagina = addslashes(trim($_POST['pages']));
        $titulo = addslashes(trim($_POST['titulo']));
        $contPrinc = addslashes(trim($_POST['principal']));
        $conteudo = addslashes(trim( $_POST['editor1']));
        
        try {
            $pdo = conectarDb();

            $atualizar = $pdo->prepare("UPDATE pages SET pages = :pages, conteudo_titulo = :conteudo_titulo, "
                . "conteudo_principal = :conteudo_principal, conteudo_content = :conteudo_content where id = :id");
            $atualizar->bindValue(":pages", $pagina);
            $atualizar->bindValue(":conteudo_titulo", $titulo);
            $atualizar->bindValue(":conteudo_principal", $contPrinc);
            $atualizar->bindValue(":conteudo_content", $conteudo);
            $atualizar->bindValue(":id", $id);
            $atualizar->execute();
        } catch (PDOException $e) {
            die("Error: Código: {$e->getCode()} <br> Mensagem: {$e->getMessage()} <br>  Arquivo: {$e->getFile()} <br> linha: {$e->getLine()}");
        }

    }else{
        echo "ERROR: Erro ao alterar!";
    }
}


function cadastrar($tabela, $dadosCadastrar)
{
    $pdo = conectarDb();
    $campos = count($dadosCadastrar);
    
    try {
        $cadastrar = $pdo->prepare("insert into {$tabela} (nome, email, senha) values (?, ?, ?)");
        for ($i = 0; $i < $campos; $i ++):
            $cadastrar->bindValue($i+1, $dadosCadastrar[$i]);
        endfor;
        $cadastrar->execute();
    } catch (PDOException $e) {
        die("Error: Código: {$e->getCode()} | Mensagem: {$e->getMessage()} |  Arquivo: {$e->getFile()} | linha: {$e->getLine()}");
    }
}


function passCrypt($senha)
{
    $senhaCrypt = password_hash($senha, PASSWORD_DEFAULT);
    return $senhaCrypt;
}


function password()
{
    $dados = listar('admin');
    foreach ($dados as $key => $value) {
        return $value['senha'];
    }
}


function logarsistema($user)
{
    $pdo = conectarDb();


    try {
        $login = $pdo->prepare("select * from admin where login = :login");
        $login->bindValue(":login", $user);
        $login->execute();

            return ($login->rowCount() == 1) ? true : false;
    } catch (PDOException $e) {
        die("Error: Código: {$e->getCode()} <br> Mensagem: {$e->getMessage()} <br>  Arquivo: {$e->getFile()} <br> linha: {$e->getLine()}");
    }   

}

