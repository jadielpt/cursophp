<!DOCTYPE html>
<html>
     <?php require_once("head.php");?>
  </body>
      
    <form method="POST" action="pages/msgcontato.php" class="well col-md-3">
        <fieldse>
              <legend>Formulário para contato</legend>
             
               
                                  
                     <label>
                         Nome:</br> <input type="text" class="span3"  name="ncontato"  required  autofocus maxlength="20" placeholder="Digite seu nome">
                     </label></br>
                    
                    
                    <label>
                        Email:</br> <input type="email" name="econtato" required placeholder="Digite seu Email">
                    </label></br>
                    
                    
                    <label>
                        Assunto:</br> <input type="tex" name="acontato" required  placeholder="Digite o Assunto">
                    </label></br>
                    
                    
                    <label></br>
                        Mensagem:</br> <textarea name="mcontato"></textarea> 
                    </label></br>
                    
                    <label>
                        <button class="btn btn-primary">Enviar</button>
                    </label>
                    
                    <label>
                        <input type="reset"  class="btn btn-primary">
                    </label>
             
          </fieldset>
      </form>
            <script src="css/js/bootstrap.js"></script>
            <?php require_once("footer.php");?>
</boby> 
     
    
  

</html>