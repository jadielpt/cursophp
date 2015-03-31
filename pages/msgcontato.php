
   <?php 
     
     
     $ncontato  =  $_POST["ncontato"]; 
     $econtato  =  $_POST["econtato"];
     $acontato  =  $_POST["acontato"];
     $mcontato  =  $_POST["mcontato"];
  
     echo "Dados enviados com sucesso, abaixo seguem os dados que você enviou: </br></br>";
     echo "Nome :$ncontato"."</br>"."Email :  $econtato"."</br>"."Assunto : $acontato"."</br>"."Mensagem : $mcontato"."</br></br>";
  
      require_once("footer.php"); 
   
 ?>
  