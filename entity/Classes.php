<?php

namespace Noticia\entity;

require_once __DIR__."/../database/DatabaseConnection.php";
use PDO;

class Classes
{
    private  $manchete;
    private $conteudo;
    private static array $array;
    private static $NumeroDeContas;
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = \DatabaseConnection::connectionDatabase();
    }


    public  function setManchete(string $manchete, string $noticia)
    {

        if (isset($_GET['id'])){

             $update = $this->pdo->prepare("UPDATE noticias SET noticia = :noticia,manchete = :manchete WHERE id = :id");
             $update->bindValue(':manchete',$manchete);
             $update->bindValue(':noticia',$noticia);
             $update->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
             $update->execute();
             $idNoticia = $_GET['id'];

        }else{
            $insert = $this->pdo->prepare("insert into noticias(manchete, noticia)values(:manchete,:noticia);");
            $insert->bindValue(':manchete',$manchete);
            $insert->bindValue(':noticia',$noticia);
            $insert->execute();
            $idNoticia = $this->pdo->lastInsertId();
        }

        $queryTemas = $this->pdo->query("select * from temas");
        $queryTemas = $queryTemas->fetchAll();
        foreach ($queryTemas as $temas){
            $idTema = $temas['id'];

            $query = sprintf("select * from noticias_temas where id_noticia = %d",$idNoticia);
            $queryTemasNoticia = $this->pdo->query($query);
            $queryTemasNoticia = $queryTemasNoticia->fetchAll();


            if (isset($_POST["tema_$idTema"]) and $_POST["tema_$idTema"] === 'on'){
                $insert = $this->pdo->prepare("insert or ignore into noticias_temas(id_noticia, id_tema)values(:id_noticia,:id_tema);");
                $insert->bindValue(':id_noticia',$idNoticia);
                $insert->bindValue(':id_tema',$idTema);
                $insert->execute();
            }else{
                $delete = $this->pdo->prepare("delete from noticias_temas where id_tema = :idTema and id_noticia = :idNoticia");
                $delete->bindValue(':idTema',$idTema);
                $delete->bindValue(':idNoticia',$idNoticia);
                $delete->execute();
            }
        }
        header('Location: /Principal');
     }


    public function excluiManchete($id)
    {
        $id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);


        $delete = $this->pdo->prepare("delete from noticias where ID = :id");
        $delete->bindValue(':id',$id,PDO::PARAM_INT);
        $delete->execute();

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

    public function insereTema(string $tema)
    {
        $insert = $this->pdo->prepare("insert into temas(tema)values(:tema);");
        $insert->bindValue(':tema',$tema);
        $insert->execute();

        header('Location: /Cadastro-Tema');
    }

    public function excluiTema($id)
    {


        $delete = $this->pdo->prepare("delete from temas where ID = :id");
        $delete->bindValue(':id',$id,PDO::PARAM_INT);
        $delete->execute();

        header('Location: /Cadastro-Tema');
        
    }

}