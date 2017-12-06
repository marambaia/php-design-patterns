<?php
include_once('Controller.php');
include_once('./dao/PostDAO.php');
include_once('./model/Post.php');

/**
 * Description of IndexController
 *
 * @author Bernardo Albuquerque
 */
class IndexController extends Controller
{
    private $dao;
    
    public function __construct() {
        $this->dao = new PostDAO();
    }
    
    public function index()
    {
        // Resgatar todos os registros e retornar
        $posts = $this->dao->getAll();
        require_once('view/post/index.php');
    }
    
    public function view($params = null)
    {
        $post = $this->dao->get($params['id']);
        
        require_once('view/post/view.php');
    }
    
    public function add($params = null)
    {
        $title   = $params['title'];
        $content = $params['content'];

        // Instanciar um novo Post e setar informações
        $post = new Post();
        $post->setTitle($title);
        $post->setContent($content);

        $this->dao->insert($post);
        
        //carrega os posts
        $posts = $this->dao->getAll();
        
        // redireciona para a página
        header('Location:?controller=posts&action=index');
    }
    
    public function edit($params = null)
    {
        if ($this->request == 'post') {
            if ($this->dao->update($params)) {
                header('Location:?controller=posts&action=view&id='.$params['id']);
            }
        }
        
        $post = $this->dao->get($params['id']);
        
        require_once('view/post/edit.php');
    }
    
    public function remove($params = null)
    {
        $this->dao->delete($params['id']);
        
        //carrega os posts
        $posts = $this->dao->getAll();
        
        // redireciona para a página
        header('Location:?controller=posts&action=index');
    }
}