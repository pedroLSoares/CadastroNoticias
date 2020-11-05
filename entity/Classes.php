<?php

namespace Noticia\entity;

class Classes
{
    private  $manchete;
    private $conteudo;
    private static array $array;
    private static $NumeroDeContas;



    public  function setManchete(string $manchete, string $noticia)
    {

        if (isset($_SESSION['manchete'][$_GET['id']])){
            $_SESSION['manchete'][$_GET['id']] = $manchete;

            header('Location: /Principal');
        }
        else{
              $_SESSION['manchete'][] = $manchete;
              $_SESSION['noticia'][] = $noticia;
              header('Location: /Principal');}

      //$_SESSION['mancheteGeral'] = $_SESSION['manchete'];
     // foreach ($_SESSION['novamanchete'] as $texto){
     //     echo $texto;
     // }



     }


    public function excluiManchete($id)
    {
        $id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
        unset($_SESSION['manchete'][$id]);

        header('Location: /Principal');
     }

    public function alteraManchete()
    {
        $id = $_GET['id'];
        require __DIR__.'/../view/CadastroNoticia.php';

     }


    public function fazLogin(string $email, string $senha)
    {
        if ($email === 'pedrohenrique4566@hotmail.com' && $senha === '123'){
        $_SESSION['logado'] = true;

        header('Location: /Principal');
        }
        else{
            echo 'Usuário ou senha inválidos';
        }
    }

    public function deslogar()
    {
        $manchetedepois = $_SESSION['manchete'];
        $noticiadepois = $_SESSION['noticia'];
        session_destroy();
        session_start();
        $_SESSION['manchete'] = $manchetedepois;
        $_SESSION['noticia'] = $noticiadepois;
        header('Location: /Principal');
    }


}