<?php

function route()
{
    $route = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    $path = $route['path'];
    $path = explode('/', $path);
    $pagina = $path[3];
    $permission	= array('alterarAdm', 'listarAdm');

    if(empty($pagina)){
        return("pages/listarAdm.php");
    }elseif($pagina == 'alterarPages'){
        return("pages/alterarAdm.php");
    }elseif($pagina == 'gravar'){
        return("pages/gravar.php");
    }else{
        return("pages/listarAdm.php");
    }
}