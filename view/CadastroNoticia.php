<?php include __DIR__.'/../view/inicio_fim_html/inicio-html.php';
?>
<?php if (isset($_SESSION['logado'])): ?>
<p xmlns="http://www.w3.org/1999/html">Você está logado</p>
<?php ;
    $id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
    if (isset($id)){
        $pdo = DatabaseConnection::connectionDatabase();

        $select = sprintf("select * from noticias where id = %d",$id);
        $query = $pdo->query($select);
        $query = $query->fetchAll();

        $pdo = DatabaseConnection::connectionDatabase();
        $select = sprintf("select * from noticias_temas where id_noticia = %d",$id);
        $queryTemasNoticias = $pdo->query($select);
        $queryTemasNoticias = $queryTemasNoticias->fetchAll();
        foreach ($queryTemasNoticias as $TemaNoticia){
            $temaNoticia[] = $TemaNoticia['id_tema'];
        }
    }
    $pdo = DatabaseConnection::connectionDatabase();
    $queryTemas = $pdo->query("select * from temas");
    $queryTemas = $queryTemas->fetchAll();





endif; ?>

<div class="container">
    <div class="jumbotron">
        <h1>Cadastro de notícia</h1>
    </div>


    <form action="/salvaManchete<?= isset($id) ? '?id= ' . $id : ''; ?>" method="post">
        <div class="form-group">
            <label for="manchete">Manchete</label>
            <input type="text" class="form-control" name="manchete" id="manchete" value="<?= isset($query) ? $query[0]['manchete'] : ''; ?>">
            <label for="noticia">Noticia</label>
            <textarea class="form-control" id="noticia" rows="3" name="noticia" ><?= isset($id) ? str_replace('<br />','',$query[0]['noticia']) : ''; ?></textarea>
        </div>
        <?php foreach ($queryTemas as $tema):?>
            <label for="<?php echo $tema['id']?>"><?= $tema['tema']?></label>
                <input type="checkbox" name="tema_<?php echo $tema['id']?>"  id="<?php echo $tema['id']?>" <?php if (isset($temaNoticia) and in_array($tema['id'],$temaNoticia)):?>checked<?php endif;?>>
        <?php endforeach;?>
        <br>
        <button class="btn btn-primary">Adicionar</button>
        <!-- Enviar o href para outro local em que será tratado com função do PHP para armazenar o post -->
    </form>

</div>
