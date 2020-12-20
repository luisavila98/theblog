<?php
require_once 'model/User.php';

class LoginController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new User();

        if(!isset($_SESSION)){
            session_start();
        }
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/login.php';
        require_once 'view/footer.php';
    }

    public function Login(){
        $user = new User();

        $user->email = $_REQUEST['email'];
        $user->password = $_REQUEST['password'];

        $login=$this->model->Verificar($user);
        
        if($login){
            header('Location: index.php');
        }else{
            header('Location: index.php?c=Login&a=Index&error=true');
        }
    }

    public function Logout(){
        $_SESSION = array();
        session_destroy ();

        header('Location: index.php');
    }
}