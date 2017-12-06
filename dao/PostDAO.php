<?php
/**
 * Description of PostDAO
 *
 * @author Bernardo Albuquerque
 */
include_once('DAO.php');
include_once('./model/Post.php');

class PostDAO extends DAO
{
    public function __construct() {
        parent::__construct();
    }

    public function insert(Post $post)
    {
        $this->conn->beginTransaction();

        try {
            $stmt = $this->conn->prepare(
                'INSERT INTO posts (title, content) VALUES (:title, :content)'
            );

            $stmt->bindValue(':title', $post->getTitle());
            $stmt->bindValue(':content', $post->getContent());
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
            'SELECT * FROM posts WHERE id = ?'
        );
        
        $stmt->execute( array($id) );
        
        return $stmt->fetchAll(PDO::FETCH_CLASS,'Post');
    }

    public function getAll()
    {
        $stmt = $this->conn->query(
            'SELECT * FROM posts'
        );
 
        // PDO:fetchAll retorna um array com todas as linhas da consulta.
        // Quando usado com o argumento PDO::FETCH_CLASS seta os valores na 
        // classe que é passada no próximo parâmetro. Ex.: Post
        // PS: O nome dos atributos da classe devem ser identicos aos campos da tabela do BD.
        return $stmt->fetchAll(PDO::FETCH_CLASS,'Post');
    }
    
    public function update($params) {
        $sql = "UPDATE posts SET title = :title, 
                                content = :content
                                WHERE id = :id";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':title', $params['title'], PDO::PARAM_STR);
        $stmt->bindParam(':content', $params['content'], PDO::PARAM_STR);
        $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
        
        return $stmt->execute();
    }
    
    public function delete($id)
    {
        $sql  = "DELETE FROM posts WHERE id =  :id";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        return  $stmt->execute();
    }

}