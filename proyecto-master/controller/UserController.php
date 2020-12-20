<?php
require_once 'model/User.php';

class UserController{
    
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
    
    public function Registrar(){        
        require_once 'view/header.php';
        require_once 'view/registrar.php';
        require_once 'view/footer.php';
    }

    public function Guardar(){
        $user = new User();

        $user->nombre = $_REQUEST['nombre'];
        $user->apellido = $_REQUEST['apellido'];
        $user->direccion = $_REQUEST['direccion'];
        $user->nacionalidad = $_REQUEST['nacionalidad'];
        $user->email = $_REQUEST['email'];
        $user->password = $_REQUEST['password'];

        $this->model->Registrar($user);
        
        $_SESSION['success'] = 'Usuario registrado con éxito';

        header('Location: index.php');
    }
    
    public function Actualizar(){
        $user = new User();

        $user->id = $_REQUEST['id'];
        $user->nombre = $_REQUEST['nombre'];
        $user->apellido = $_REQUEST['apellido'];
        $user->direccion = $_REQUEST['direccion'];
        $user->nacionalidad = $_REQUEST['nacionalidad'];
        $user->email = $_REQUEST['email'];

        $this->model->Actualizar($user);
        
        $_SESSION['success'] = 'Usuario actualizado con éxito';
        
        header('Location: index.php');
    }
    
    public function Editar(){
        $user = new User();

        if(isset($_REQUEST['id'])){
            $user = $this->model->Obtener($_REQUEST['id']);
        }

        require_once 'view/header.php';
        require_once 'view/editar.php';
        require_once 'view/footer.php';
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}