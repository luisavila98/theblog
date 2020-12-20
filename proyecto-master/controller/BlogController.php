<?php
require_once 'model/Post.php';

class BlogController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Post();
        
        if(!isset($_SESSION)){
			session_start();
		}
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/post/post.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $post = new Post();
        
        require_once 'view/header.php';
        require_once 'view/post/post-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $post = new Post();

        $post->titulo = $_REQUEST['titulo'];
        $post->usuario_id = $_SESSION['user_id'];
        $post->texto = $_REQUEST['texto'];

        $this->model->Registrar($post);
        
        $_SESSION['success'] = 'Publicación guardada con éxito';
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        
        $_SESSION['success'] = 'Publicación eliminada con éxito';
        
        header('Location: index.php');
    }
}
