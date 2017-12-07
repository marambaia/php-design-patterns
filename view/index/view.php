<html>
    <head>
        <title>PDO + Patterns</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Detalhes do visitante</h1>
        <p>Nome: <?= $guest[0]->getFirst_name() ?></p>
        <p>Sobrenome: <?= $guest[0]->getLast_name() ?></p>
        <p>Email: <?= $guest[0]->getEmail() ?></p>
        <p>Gênero: <?= $guest[0]->getGender() ?></p>
        <p>País: <?= $guest[0]->getName_br() ?></p>
        <p>Visitou em: <?= $guest[0]->getCreated() ?></p>
        <a href="?controller=index&action=index">Voltar</a>
    </body>
</html>