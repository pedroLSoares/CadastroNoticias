<?php
require_once __DIR__.'/../controller/FormularioNoticia.php';


use Noticia\controller\FormularioNoticia;
use Noticia\entity\Classes;

session_start();


switch ($_SERVER['PATH_INFO']){

    case '/Principal':
        require __DIR__.'/../view/Principal.php';
        break;

    case '/exibe-noticia':
        require __DIR__.'/../view/exibeNoticia.php';
        break;

    case '/Cadastro':
        require __DIR__.'/../view/CadastroNoticia.php';
        break;

    case '/login':
        require __DIR__.'/../view/login.php';
        break;

    case '/realiza-login':
        $controlador = new Classes();
        $controlador ->fazLogin($_POST['email'],$_POST['senha']);
        break;

    case '/logout':
        $controlador = new Classes();
        $controlador->deslogar();
        break;


    case '/salvaManchete':
        $controlador = new Classes();
        $controlador->setManchete($_POST['manchete'], nl2br($_POST['noticia']));
        break;

    case '/excluir-noticia':
        $controlador = new Classes();
        $controlador->excluiManchete($_GET['id']);
        break;


    case '/alterar-noticia':
        $controlador = new Classes();
        $controlador->alteraManchete();
        break;


    }

