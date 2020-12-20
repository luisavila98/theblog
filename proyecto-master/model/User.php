<?php
class User
{
	private $pdo;
    
    public $id;
    public $nombre;
    public $apellido;
    public $direccion;
    public $email;
    public $password;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::Conection();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}

		if(!isset($_SESSION)){
			session_start();
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM publicaciones t1 inner join usuarios t2 ON t1.usuario_id=t2.id");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Verificar(User $data)
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = ?");

			$stm->execute(array($data->email));
			
			$user=$stm->fetch(PDO::FETCH_OBJ);
			
			if ($stm->rowCount() > 0) {
				if (password_verify($data->password, $user->password)) {
					$_SESSION['session'] = true;
					$_SESSION['user_id'] = $user->id;
					$_SESSION['user_name'] = $user->nombre.' '.$user->apellido;
					return true;
			    } else {
			    	return false;
			    }
				
			} else {
				return false;
			}
            
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM usuarios WHERE id = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM usuarios WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE usuarios SET 
						nombre          = ?, 
						apellido        = ?,
                        direccion       = ?,
                        nacionalidad    = ?,
                        email           = ?
				    WHERE id = ?";
            
            $password =  password_hash($data->password, PASSWORD_DEFAULT);
            var_dump($sql);
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombre,
                        $data->apellido,
                        $data->direccion,
                        $data->nacionalidad,
                        $data->email,
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(User $data)
	{
		try 
		{
		$sql = "INSERT INTO usuarios (nombre,apellido,direccion,nacionalidad,email,password) 
		        VALUES (?, ?, ?, ?, ?, ?)";

		$password =  password_hash($data->password, PASSWORD_DEFAULT);

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data->nombre,
                    $data->apellido,
                    $data->direccion,
                    $data->nacionalidad,
                    $data->email,
                    $password
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}