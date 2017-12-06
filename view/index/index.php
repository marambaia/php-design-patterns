<html>
    <head>
        <title>PDO + Patterns</title>
    </head>
    <body>
        <h1>Guestbook</h1>
        <h3>Marque sua presença!</h3>
        <form action="?controller=posts&action=add" method="post">
            <input type="text" name="title" placeholder="seu nome">
            <input type="text" name="content" placeholder="conteúdo">
            <input type="submit" name="Enviar">
        </form>
        <table border="1">
            <tr><th>#</th><th>Nome</th><th>Email</th><th>País</th><th>Sexo</th><th>Visitou em</th><th colspan="2">Ações</th></tr>
            <?php            
            foreach($guestbook as $guest):
                echo '<tr>'
                    . '<td>' . $guest->getId() . '</td>'
                    . '<td>' . $guest->getFirst_name() . ' ' . $guest->getLast_name() . '</td>'
                    . '<td>' . $guest->getEmail() . '</td>'
                    . '<td>' . $guest->getName_br() . '</td>' 
                    . '<td>' . $guest->getGender() . '</td>' 
                    . '<td>' . $guest->getCreated() . '</td>' 
                    . '<td><a href="?controller=index&action=edit&id='.$guest->getId().'">Editar</td>'
                    . '<td><a href="?controller=index&action=remove&id='.$guest->getId().'">Excluir</td>'
                    . '</tr>';
            endforeach;
            ?>
        </table>
    </body>
</html>