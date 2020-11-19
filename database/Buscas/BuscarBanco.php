<?php


class BuscarBanco
{

    public function __construct()
    {
        $this->pdo = DatabaseConnection::connectionDatabase();
    }

    public function BuscaTemasNoticia($idNoticia)
    {
        $select = sprintf("select tema from noticias_temas left join temas t on t.id = noticias_temas.id_tema where id_noticia = %d",$idNoticia);
        $queryTemasNoticias = $this->pdo->query($select);
        $queryTemasNoticias = $queryTemasNoticias->fetchAll();
        foreach ($queryTemasNoticias as $tema)
            $temas[] = $tema['tema'];
        return $temas;
    }

}