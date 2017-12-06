<?php
/**
 * Description of DAO
 *
 * @author Bernardo Albuquerque
 */
include_once('./class/Connection.php');

class DAO extends Connection
{
    protected $conn;

    public function __construct()
    {
        parent::__construct();
        $registry = Registry::getInstance();
        $this->conn = $registry->get('Connection');
    }
}
