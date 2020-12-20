<?php
class Comment
{
	private $pdo;
    
    public $id;
    public $usuario_id;
    public $publicacion_id;
    public $texto;

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

			$stm = $this->pdo->prepare("SELECT * FROM comentarios INNER JOIN usuarios ON comentarios.usuario_id = usuarios.id WHERE publicacion_id = ?");
			$stm->execute();

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
			          ->prepare("SELECT * FROM comentarios WHERE id = ?");       

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
			            ->prepare("DELETE FROM comentarios WHERE id = ?");			          
            
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
			$sql = "UPDATE comentarios SET 
						usuario_id      = ?, 
						publicacion_id  = ?,
                        texto           = ?,
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->usuario_id,
                        $data->publicacion_id,
                        $data->texto,
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Comment $data)
	{
		try 
		{
		$sql = "INSERT INTO comentarios (usuario_id,publicacion_id,texto) 
		        VALUES (?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data->usuario_id,
                    $data->publicacion_id,
                    $data->texto
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}