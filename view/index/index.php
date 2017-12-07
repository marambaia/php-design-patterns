<html>
    <head>
        <title>PDO + Patterns</title>
    </head>
    <body>
        <h1>Guestbook</h1>
        <h3>Marque sua presença!</h3>
        <form action="?controller=index&action=add" method="post">
            <input type="text" name="first_name" placeholder="Seu nome">
            <input type="text" name="last_name" placeholder="Seu sobrenome">
            <input type="text" name="email" placeholder="Email">
            <select name="country_id">
                <option value="">País de origem</option>
                <?php
                foreach ($countries as $country):
                    echo '<option value="'.$country->getId().'">'.$country->getName_br().'</option>';
                endforeach;
                ?>
            </select>
            <select name="gender">
                <option value="">Gênero</option>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
                <option value="O">Outro</option>
            </select>
            <input type="submit" name="Enviar">
        </form>
        <table border="1">
            <tr><th>#</th><th>Nome</th><th>Email</th><th>País</th><th>Sexo</th><th>Visitou em</th><th colspan="2">Ações</th></tr>
            <?php
            foreach($guestbook as $guest):
                echo '<tr>'
                    . '<td>' . $guest->getId() . '</td>'
                    . '<td><a href="?controller=index&action=view&id='.$guest->getId().'">' . $guest->getFirst_name() . ' ' . $guest->getLast_name() . '</a></td>'
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