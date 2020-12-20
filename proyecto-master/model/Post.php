<?php
class Post
{
	private $pdo;
    
    public $id;
    public $titulo;
    public $id_user;
    public $body;
    public $date;

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
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT publicaciones.id,publicaciones.usuario_id,publicaciones.titulo,publicaciones.texto,publicaciones.fecha,usuarios.nombre,usuarios.apellido FROM publicaciones inner join usuarios ON publicaciones.usuario_id=usuarios.id ORDER BY publicaciones.fecha DESC");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
    
    public function Comentarios($id)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT comentarios.id, comentarios.usuario_id, comentarios.publicacion_id, comentarios.texto, usuarios.nombre, usuarios.apellido FROM comentarios INNER JOIN usuarios ON comentarios.usuario_id = usuarios.id WHERE publicacion_id = ?");
			$stm->execute(array($id));

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM publicaciones WHERE id = ?");       

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
			            ->prepare("DELETE FROM publicaciones WHERE id = ?");			          

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
			$sql = "UPDATE publicaciones SET 
						titulo          = ?, 
						texto        = ?,
                        fecha        = ?,
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->titulo, 
                        $data->texto,
                        date('Y-m-d h:i:s'),
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Post $data)
	{
		try 
		{
		$sql = "INSERT INTO publicaciones (usuario_id,titulo,texto,fecha) 
		        VALUES (?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data->usuario_id,
                    $data->titulo,
                    $data->texto,
                    date('Y-m-d h:i:s')
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
