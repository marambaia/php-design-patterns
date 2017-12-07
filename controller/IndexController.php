<?php
include_once('Controller.php');
include_once('./dao/IndexDAO.php');
include_once('./model/Index.php');

/**
 * Description of IndexController
 *
 * @author Bernardo Albuquerque
 */
class IndexController extends Controller
{
    private $dao;
    
    public function __construct() {
        $this->dao = new IndexDAO();
    }
    
    public function index()
    {
        // Resgatar registros e disponibilizá-los na view
        $guestbook = $this->dao->getAll();
        $countries = $this->dao->getCountries();
        
        require_once('view/index/index.php');
    }
    
    public function view($params = null)
    {
        $guest = $this->dao->get($params['id']);
        
        require_once('view/index/view.php');
    }
    
    public function add($params = null)
    {
        $first_name = $params['first_name'];
        $last_name  = $params['last_name'];
        $email      = $params['email'];
        $country_id = $params['country_id'];
        $gender     = $params['gender'];
        $created    = date("Y-m-d H:i:s");

        // Instanciar um novo objeto Index
        $index = new Index();
        $index->setFirst_name($first_name);
        $index->setLast_name($last_name);
        $index->setEmail($email);
        $index->setCountry_id($country_id);
        $index->setGender($gender);
        $index->setCreated($created);

        $this->dao->insert($index);
        
        $guestbook = $this->dao->getAll();
        
        // redireciona para a página
        header('Location:?controller=index&action=index');
    }
    
    public function edit($params = null)
    {
        if ($this->request == 'post') {
            if ($this->dao->update($params)) {
                header('Location:?controller=index&action=view&id='.$params['id']);
            }
        }
        
        $countries = $this->dao->getCountries();
        $guest     = $this->dao->get($params['id']);
        
        require_once('view/index/edit.php');
    }
    
    public function remove($params = null)
    {
        $this->dao->delete($params['id']);
        
        $guestbook = $this->dao->getAll();
        
        // redireciona para a página
        header('Location:?controller=index&action=index');
    }
}