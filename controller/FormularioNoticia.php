<?php
namespace Noticia\controller;

require_once __DIR__.'/../entity/Classes.php';

use Noticia\entity\Classes;

class FormularioNoticia
{
    public function processaRequesicao()
    {
        echo "tudo certo por enquanto!";
        //Aqui salvar os dados do post no arquivo txt ou outro banco
        $manchete = new Classes();





        //abaixo salvar informação

        return
        //inserir o header para retornar a página anterior
        header('Location: /Principal');
    }
}