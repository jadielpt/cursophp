<?php
       
       
      
       
       $idCli = 2;
       $sql = "SELECT * FROM clientes where idCli=:idCli";
       $stmt = $conexao->prepare($sql);
       $stmt->bindValue("idCli", $idCli);
       $stmt->execute();
       $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
       
       foreach ($clientes as $cliente) {
           echo "nome:".$cliente['nome']."<br>". "celuar:".$cliente['celular']."<br>";
       }
?>