<?php
function routeJ()
{
    $route = parse_url("http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    $path = $route['path'];
    $path = explode('/', $path);
    $pagina = $path[1];
    $rotaValidas= array('home', 'empresa', 'produtos', 'servicos', 'contato', '404', 'busca');
    
    
        if(empty($pagina)){
           return $dados = listarPages('pages','home' );
        }elseif(isset($pagina) && in_array ($pagina,$rotaValidas)!= $rotaValidas){
           return $dados = listarPages('pages','404');
        }elseif($pagina == 'busca'){
            require_once('pages/busca.php');
        }elseif($pagina == 'contato'){
            require_once('pages/contato.php');
        }else{
          return $dados = listarPages('pages',$pagina);
        }
}