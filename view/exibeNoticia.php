<?php
$id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
$pdo = DatabaseConnection::connectionDatabase();
$select = sprintf("select * from noticias where id = %d",$id);
$query = $pdo->query($select);
$query = $query->fetchAll();
?>


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
        <h1><?php echo $query[0]['manchete'] ?></h1>
    </div>
    <a href="/Principal" class="btn btn-dark mb-2">Voltar</a>
    <p>
        <?php echo $query[0]['noticia'] ?>
    </p>