<html>
    <head>
        <title>PDO + Patterns</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <form action="?controller=posts&action=add" method="post">
            <input type="text" name="title" placeholder="seu nome">
            <input type="text" name="content" placeholder="conteúdo">
            <input type="submit" name="Enviar">
        </form>
        <table border="1">
            <tr><th>Título</th><th>Conteúdo</th><th colspan="2">Ações</th></tr>
            <?php            
            foreach($posts as $post):
                echo '<tr>'
                    . '<td>' . $post->getTitle() . '</td>'
                    . '<td>' . $post->getContent() . '</td>'
                    . '<td><a href="?controller=posts&action=edit&id='.$post->getId().'">Editar</td>'
                    . '<td><a href="?controller=posts&action=remove&id='.$post->getId().'">Excluir</td>'
                    . '</tr>';
            endforeach;
            ?>
        </table>
    </body>
</html>