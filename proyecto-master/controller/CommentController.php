<?php
require_once 'model/Comment.php';

class CommentController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Comment();
        
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
        $comment = new Comment();
        
        if(isset($_REQUEST['id'])){
            $comment = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/post/post-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $comment = new Comment();

        $comment->usuario_id = $_REQUEST['usuario_id'];
        $comment->publicacion_id = $_REQUEST['publicacion_id'];
        $comment->texto = $_REQUEST['texto'];

        $this->model->Registrar($comment);
        
        $_SESSION['success'] = 'Comentario guardado con éxito';
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        
        $_SESSION['success'] = 'Comentario eliminado con éxito';
        
        header('Location: index.php');
    }
}