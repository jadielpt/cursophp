<?php

function busca(){
    $pdo = conectarDB();
    $palavra = addslashes(trim($_POST['buscar']));
    
    try {
       $query = $pdo->prepare("SELECT * FROM pages WHERE conteudo_titulo LIKE :busca");
       $query->bindValue(":busca","%{$palavra}%");
       $query->execute();
    } catch (Exception $e) {
       echo "Error: Código: {$e->getCode()} | Mensagem: {$e->getMessage()} | Arquivo:{$e->getFile()} | Linha:{$e->getFile()}";
        
    }
    if($query->rowCount()>= 1){
        echo '<h3>A palavra ' .$palavra . 'retornou: '.$query->rowCount().' resultados</h3>';
        $listar = $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach($listar as $value):
            echo "<h4><a href=\"{$value["pages"]}\">".strip_tags($value["conteudo_titulo"])."</a></h4>";
        endforeach;
    }else {
       echo 'Nenhuma página encontrada <h3>'.$palavra.'</h3>'; 
    }
    return $query;
}