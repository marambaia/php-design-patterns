<html>
    <head>
        <title>PDO + Patterns</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Editar Post</h1>
        <p>Título: <?= $post[0]->getTitle() ?></p>
        <p>Conteúdo: <?= $post[0]->getContent() ?></p>
        <a href="?controller=posts&action=index">Voltar</a>
    </body>
</html>