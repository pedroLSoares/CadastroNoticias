<?php ;


//if (isset($_SESSION['logado'])){
//$mancheteGeral = $_SESSION['manchete'];}


;?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Notícias</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="jumbotron">
        <h1>Notícias</h1>
    </div>
    <?php if (isset($_SESSION['logado'])): ?>
    <p>Você está logado</p>
        <a href="/logout" class="btn btn-dark mb-2">Sair</a>
        <a href="/Cadastro" class="btn btn-dark mb-2">Adicionar</a>

    <?php endif; ?>

    <?php if (!isset($_SESSION['logado'])): ?>
    <a href="/login" class="btn btn-dark mb-2">Login</a>
    <?php endif; ?>

    <?php if (isset($_SESSION['manchete'])): ?>
    <ul class="list-group" id="lista">
    <?php foreach ($_SESSION['manchete'] as $idNoticia => $tituloNoticia):?>
        <li class="list-group-item d-flex justify-content-between" ><a href="/exibe-noticia?id=<?php echo $idNoticia?>"><?= $tituloNoticia ?></a>
                <span>
                <?php if (isset($_SESSION['logado'])): ?>
                <a href="/alterar-noticia?id=<?php echo $idNoticia?>" class="btn btn-info btn-sm">Alterar</a>
                <a href="/excluir-noticia?id=<?php echo $idNoticia?>" class="btn btn-danger btn-sm">Excluir</a>
                <?php endif; ?>
                 </span></li>
    <?php endforeach;?>
    </ul>
    <?php endif; ?>

</div>
</body>
</html>