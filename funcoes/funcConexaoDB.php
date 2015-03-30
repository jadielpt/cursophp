<?php


function conectarDB() {
      $pathDB =  'mysql:host=localhost;dbname=new';
      $user =  'root';
      $senha = '100731';
      $options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];
      
     try{
         $pdo = new PDO($pathDB,$user,$senha,$options);
         //$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRNODE_EXEPTION);
     } catch (PDOException $e) {
         die("Error: Código: {$e->getCode()} | Mensagem: {$e->getMessage()} | Arquivo: {$e->getFile()} | linha:{$e->getLine()}");
     }
     return $pdo;
  }
   
    function cadastrarDB($tabela,$dadosCadastrar){
        $pdo = conectarDB();
        $campos= count($dadosCadastrar);
        
        try {
            $cadastrar = $pdo->prepare("insert into {$tabela}(pages, conteudo_titulo,conteudo_principal,conteudo_content)values (?,?,?,?)");
            for ($i=0;$i<$campos;$i ++):
                 $cadastrar->bindValue($i+1,$dadosCadastrar[$i]);
            endfor;
             $cadastrar->execute();
            
        } catch (PDOException $e) {
           die("Erro:Código: {$e->getCode()}| Mensagem: {$e->getMessage()} | Arquivo:{$e->getFile()}|Linha:{$e->getFile()}");
        }
    }             
   
    function listarTb($tabela){
        $pdo = conectarDB();
        
        try {
            $listar = $pdo->prepare("select * from $tabela");
            $listar->execute();
            $dados = $listar->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (Exception $e) {
            echo $exc->getTraceAsString();
            die("Error: Código: {$e->getCode()} | Mensagem: {$e->getMessage()} | Arquivo:{$e->getFile()} | linha: {$e->getFile()}");

        }
        return $dados;
    }
    
    
    function listarPages($tabela, $pages)
{
    $pdo = conectarDb();
    
    try {
        $listarPeloId = $pdo->prepare("select * from {$tabela} where pages = :pages");
        $listarPeloId->bindValue(":pages", $pages);
        $listarPeloId->execute();
        $dados = $listarPeloId->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $exc->getTraceAsString();
        die("Error: Código: {$e->getCode()} | Mensagem: {$e->getMessage()} |  Arquivo: {$e->getFile()} | linha: {$e->getLine()}");
    }
    return $dados ;
     
} 

 function cadastrarDbAdmin($tabela, $dadosCadastrar)
{
    $pdo = conectarDb();
    $campos = count($dadosCadastrar);
    
    try {
        $cadastrar = $pdo->prepare("insert into {$tabela} (login, email, senha) values (?, ?, ?)");
        for ($i = 0; $i < $campos; $i ++):
            $cadastrar->bindValue($i+1, $dadosCadastrar[$i]);
        endfor;
        $cadastrar->execute();
    } catch (PDOException $e) {
        die("Error: Código: {$e->getCode()} | Mensagem: {$e->getMessage()} |  Arquivo: {$e->getFile()} | linha: {$e->getLine()}");
    }
}

function atualizarDb($tabela, $dadosAtualizar, $id)
{
    $pdo = conectarDb();
    
    try {
        $atualizar = $pdo->prepare("update {$tabela} set conteudo = ? where id = ?");
        $atualizar->bindValue(1, $dadosAtualizar['conteudo']);
        $atualizar->bindValue(2, $id);
        $atualizar->execute();
    } catch (PDOException $e) {
        die("Error: Código: {$e->getCode()} | Mensagem: {$e->getMessage()} |  Arquivo: {$e->getFile()} | linha: {$e->getLine()}");
    }
}
   function deletarDb($tabela, $id)
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

?>