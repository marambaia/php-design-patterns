<html>
    <head>
        <title>PDO + Patterns</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <form action="?controller=posts&action=edit" method="post">
            <input type="hidden" name="id" value="<?= $post[0]->getId() ?>">
            <input type="text" name="title" value="<?= $post[0]->getTitle() ?>" placeholder="Título">
            <input type="text" name="content" value="<?= $post[0]->getContent() ?>" placeholder="Conteúdo">
            <a href="?controller=posts&action=index">Voltar</a>
            <input type="submit" name="Enviar">
        </form>
    </body>
</html>