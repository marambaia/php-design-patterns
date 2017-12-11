<?php
include_once('Registry.php');

/**
 * Description of Connection
 *
 * @author Bernardo Albuquerque
 */
class Connection
{
    // Database type
    private $type = 'mysql';
    
    // Server Environment
    private $env  = 'dev';
    
    // Database config
    private $config = array(
        'dev' => array(
            'host' => 'localhost',
            'db'   => 'pdo',
            'port' => '3306',
            'user' => 'root',
            'pass' => 'toor'
        ),
        'prod' => array(
            'host' => 'Server host',
            'db'   => 'DB Name',
            'port' => 'DB Port',
            'user' => 'DB User',
            'pass' => 'DB Password'
        ),
        'test' => array(
            'host' => 'Server host',
            'db'   => 'DB Name',
            'port' => 'DB Port',
            'user' => 'DB User',
            'pass' => 'DB Password'
        )
    );

    public function __construct()
    {
        $conn = $this->type();
        if ($conn) {
            try {
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Armazenar essa instância no Registry
                $registry = Registry::getInstance();
                $registry->set('Connection', $conn);
            }
            catch (PDOException $e) {
                echo 'Error connecting to the database [Code: ' . $e->getCode() . '] [Message: ' . $e->getMessage() . '][Hour: ' . date('H:i:s') . ']';
            }
        }
        else {
            echo 'Error in database PDO definition.';
            exit;
        }
    }

    private function type()
    {
        $pdo = false;
        try {
            switch ($this->type) {
                case 'mysql':
                    try {
                        $pdo = new PDO('mysql:host='.$this->config[$this->env]['host'].';port='.$this->config[$this->env]['port'].';dbname='.$this->config[$this->env]['db'], $this->config[$this->env]['user'], $this->config[$this->env]['pass']);
                    }
                    catch (Exception $e) {
                        echo 'Error connecting to MySQL database. '.$e->getTraceAsString();
                    }
                break;
                case 'pgsql':
                    $pdo = new PDO('pgsql:dbname={' . $this->config[$this->env]['db'] . '};user={' . $this->config[$this->env]['user'] . '}; password={' . $this->config[$this->env]['pass'] . '};host=' . $this->config[$this->env]['host']);
                break;
                case 'oci8':
                    $tns = '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=' . $this->config[$this->env]['host'] . ')(PORT=1521)))(CONNECT_DATA=(SID=' . $this->config[$this->env]['db'] . ')))';
                    $pdo = new PDO('oci:dbname=' . $tns, $this->config[$this->env]['user'], $this->config[$this->env]['pass'], array(PDO::ATTR_PERSISTENT => true));
                break;
                case 'mssql':
                    $pdo = new PDO('mssql:host={' . $this->config[$this->env]['host'] . '},1433;dbname={' . $this->config[$this->env]['db'] . '}', $this->config[$this->env]['user'], $this->config[$this->env]['pass']);
                break;
            }
        }
        catch (Exception $e) {
            echo $e->getTraceAsString();
            exit;
        }
        return $pdo;
    }
}