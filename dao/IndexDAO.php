<?php
/**
 * Description of IndexDAO
 *
 * @author Bernardo Albuquerque
 */
include_once('DAO.php');
include_once('./model/Index.php');
include_once('./model/Countries.php');

class IndexDAO extends DAO
{
    public function __construct() {
        parent::__construct();
    }

    public function insert(Index $index)
    {
        $this->conn->beginTransaction();

        try {
            $stmt = $this->conn->prepare(
                'INSERT INTO guestbook (first_name, last_name, email, gender, country_id, created) VALUES (:first_name, :last_name, :email, :gender, :country_id, :created)'
            );

            $stmt->bindValue(':first_name', $index->getFirst_name());
            $stmt->bindValue(':last_name', $index->getLast_name());
            $stmt->bindValue(':email', $index->getEmail());
            $stmt->bindValue(':gender', $index->getGender());
            $stmt->bindValue(':country_id', $index->getCountry_id());
            $stmt->bindValue(':created', $index->getCreated());
            $stmt->execute();

            $this->conn->commit();
        }
        catch(Exception $e) {
            $this->conn->rollback();
        }
    }
    
    public function get($id)
    {
        $stmt = $this->conn->prepare(
            'SELECT g.id, g.first_name, g.last_name, g.email, g.gender, g.country_id, c.name_br, date_format(g.created, \'%d/%m/%Y às %H:%ih\') as created, g.modified 
             FROM guestbook g 
             INNER JOIN countries c 
             ON g.country_id = c.id WHERE g.id = ?'
        );
        
        $stmt->execute( array($id) );
        
        return $stmt->fetchAll(PDO::FETCH_CLASS,'Index');
    }

    public function getAll()
    {
        $stmt = $this->conn->query(
            'SELECT g.id, g.first_name, g.last_name, g.email, g.gender, g.country_id, c.name_br, date_format(g.created, \'%d/%m/%Y às %H:%ih\') as created, g.modified 
             FROM guestbook g 
             INNER JOIN countries c 
             ON g.country_id = c.id'
        );
 
        // PDO:fetchAll retorna um array com todas as linhas da consulta.
        // Quando usado com o argumento PDO::FETCH_CLASS seta os valores na 
        // classe que é passada no próximo parâmetro. Ex.: Post
        // PS: O nome dos atributos da classe devem ser identicos aos campos da tabela do BD.
        return $stmt->fetchAll(PDO::FETCH_CLASS,'Index');
    }
    
    public function getCountries()
    {
        $stmt = $this->conn->query(
            'SELECT id, name_br FROM countries'
        );
 
        return $stmt->fetchAll(PDO::FETCH_CLASS,'Countries');
    }
    
    public function update($params) {
        $sql = "UPDATE guestbook SET 
                                first_name = :first_name,
                                last_name = :last_name,
                                email = :email,
                                gender = :gender,
                                country_id = :country_id,
                                modified = :modified 
                                WHERE id = :id";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':first_name', $params['first_name'], PDO::PARAM_STR);
        $stmt->bindParam(':last_name', $params['last_name'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $params['email'], PDO::PARAM_STR);
        $stmt->bindParam(':gender', $params['gender'], PDO::PARAM_STR);
        $stmt->bindParam(':country_id', $params['country_id'], PDO::PARAM_STR);
        $stmt->bindParam(':modified', date("Y-m-d H:i:s"), PDO::PARAM_STR);
        $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
        
        return $stmt->execute();
    }
    
    public function delete($id)
    {
        $sql  = "DELETE FROM guestbook WHERE id =  :id";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        return  $stmt->execute();
    }

}