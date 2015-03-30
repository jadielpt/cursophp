<?php

$pagina = routeJ();
?>
<section>
  <div class="row">
        <div class ="jumbotron">
        <h1><?php echo $pagina['conteudo_titulo'];?></h1>
             <div class="page-header">
            <h2><?php echo $pagina['conteudo_principal'];?></h2>
            <small><?php echo $pagina['conteudo_content']?>;</small>
             </div>
        </div>
  </div>
</section>