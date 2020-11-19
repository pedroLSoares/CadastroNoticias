<?php include __DIR__.'/../view/inicio_fim_html/inicio-html.php';

$pdo = DatabaseConnection::connectionDatabase();
$query = $pdo->query("select * from temas");
$query = $query->fetchAll();
?>


<div class="container">
    <div class="jumbotron">
        <h1>Cadastro de Assuntos</h1>
    </div>
    <a href="/Principal" class="btn btn-dark mb-2">Voltar</a>
    <form action="/Insere-Tema" method="post">
    <label for="tema">Novo Tema</label>
    <input id="tema" type="text" name="tema">
        <button class="btn btn-primary">Adicionar</button>
    </form>
    <ul class="list-group mt-4" id="lista">
        <?php foreach ($query as $tema):?>
            <li class="list-group-item d-flex justify-content-between" ><p><?= $tema['tema']?></p>
                <span>
                    <a href="/excluir-tema?id=<?php echo $tema['id']?>" class="btn btn-danger btn-sm">Excluir</a>
                 </span></li>
        <?php endforeach;?>
    </ul>
