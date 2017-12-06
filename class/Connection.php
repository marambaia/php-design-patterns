<?php
/**
 * Description of Connection
 *
 * @author Bernardo Albuquerque
 */
include_once('Registry.php');

class Connection {

    public function __construct()
    {
        // Instanciar uma conexão com PDO
        $conn = new PDO(
            'mysql:host=localhost;port=3306;dbname=pdo', 'root', 'toor'
        );
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Armazenar essa instância no Registry
        $registry = Registry::getInstance();
        $registry->set('Connection', $conn);
    }

}