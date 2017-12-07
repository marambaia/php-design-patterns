<html>
    <head>
        <title>PDO + Patterns</title>
    </head>
    <body>
        <form action="?controller=index&action=edit" method="post">
            <input type="hidden" name="id" value="<?= $guest[0]->getId() ?>">
            <input type="text" name="first_name" value="<?= $guest[0]->getFirst_name() ?>" placeholder="Seu nome">
            <input type="text" name="last_name" value="<?= $guest[0]->getLast_name() ?>" placeholder="Seu sobrenome">
            <input type="email" name="email" value="<?= $guest[0]->getEmail() ?>" placeholder="Email">
            <select name="country_id">
                <option value="">País de origem</option>
                <?php
                // (($guest[0]->getCountry_id() == $country->getId())?"selected":"")
                foreach ($countries as $country):
                    echo '<option value="'.$country->getId().'" '.(($guest[0]->getCountry_id() == $country->getId())?"selected":"").'>'.$country->getName_br().'</option>';
                endforeach;
                ?>
            </select>
            <select name="gender">
                <option value="">Gênero</option>
                <option value="M" <?=($guest[0]->getGender() == 'M')?'selected':''?> >Masculino</option>
                <option value="F" <?=($guest[0]->getGender() == 'F')?'selected':''?> >Feminino</option>
                <option value="O" <?=($guest[0]->getGender() == 'O')?'selected':''?> >Outro</option>
            </select>
            <a href="?controller=index&action=index">Voltar</a>
            <input type="submit" name="Enviar">
        </form>
    </body>
</html>