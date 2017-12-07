# PHP Design Patterns (php-design-patterns)

Neste pequeno projeto visei construir com PHP uma estrutura para desenvolvimento web com o modelo arquitetural MVC (Model2) usando padrões de projeto de mercado. Tais como:

•	FrontController
•	Command
•	DAO
•	Factory (ConnectionFactory)
•	Registry

Esta estrutura foi criada para fins acadêmicos, contudo, os próximos passos serão a implementação de processos de segurança da informação e validação, desta forma, habilitando este modelo a ser utilizado em pequenas aplicações e sistemas web.

Dentro do diretório “SQL” existem alguns scripts que criam as tabelas usadas nos exemplos com o banco de dados MySQL.

Neste projeto foi usado o PDO para conexão com o banco de dados, sendo requisito obrigatório a extensão “pdo_mysql” para a sua execução.

No diretório “class“ existe o arquivo Connection.php onde está a string de conexão com o banco de dados e deve ser alterada conforme a configuração de seu sistema.

Você pode vê-lo em ação nos links:

Guestbook: http://www.ceffsistemas.com.br/coding/php-design-patterns/ (Default route)
Blog posts: http://www.ceffsistemas.com.br/coding/php-design-patterns/?controller=posts&action=index (Others routes)

Este projeto foi testado com Apache Web Server 2.0, PHP 5.6 e MySQL Server 5.7, contudo, futuras adaptações para a versão 7 do PHP já estão sendo desenvolvidas.

Contribuições sempre são bem vindas!