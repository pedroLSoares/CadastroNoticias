<?php include __DIR__.'/../view/inicio_fim_html/inicio-html.php';
?>
<?php if (isset($_SESSION['logado'])): ?>
<p>Você está logado</p>
<?php ;
    $id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);

endif; ?>

<div class="container">
    <div class="jumbotron">
        <h1>Cadastro de notícia</h1>
    </div>


    <form action="/salvaManchete<?= isset($id) ? '?id= ' . $id : ''; ?>" method="post">
        <div class="form-group">
            <label for="manchete">Manchete</label>
            <input type="text" class="form-control" name="manchete" id="manchete" value="<?= isset($id) ? $_SESSION['manchete'][$id] : ''; ?>">
            <label for="noticia">Noticia</label>
            <textarea class="form-control" id="noticia" rows="3" name="noticia" ><?= isset($id) ? str_replace('<br />','',$_SESSION['noticia'][$id]) : ''; ?></textarea>
        </div>
        <button class="btn btn-primary">Adicionar</button>
        <!-- Enviar o href para outro local em que será tratado com função do PHP para armazenar o post -->
    </form>

</div>
