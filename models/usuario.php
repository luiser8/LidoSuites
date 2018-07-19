<?php
require_once 'db.php';

class Usuario{
	private $db;
	private $usuario;

	public function __construct(){
		$this->db=db::conexion();
		$this->usuario=array();
	}

	//Metodos de Sesiones
	public function getSession($usuario, $password){
		$password = md5($password);
		$sql = $this->db->query("SELECT *
                                     FROM usuarios 
                                     WHERE correo='{$usuario}' AND contrasena='{$password}' LIMIT 1");
        
		if($sql->num_rows > 0){
			$usuario = $sql->fetch_assoc();
			$this->setSession($usuario);
		}else if($sql->num_rows != 1){
			//Error
			//die();
			header('Location: ../../pages/login');
		}else{
			//Al home
			die();
			echo 'A home';
		}

		if (isset($usuario)) {
            return $this->usuario;
        }
    }

    public function setSession($data = '')
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!empty($data)) {
            $_SESSION['idusuario'] = $data['id_usuario'];
            $_SESSION['login'] = $data['correo'];
            $_SESSION['nivel'] = $data['id_nivel'];
            $_SESSION['nomape'] = $data['nombres'] . " " . $data['apellidos'];
        }
        header("Location: ../../pages/");
    }

    public function delSession()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        unset($_SESSION['idusuario']);
        unset($_SESSION['login']);
        unset($_SESSION['nivel']);
        session_destroy();
        header("Location: ../pages/login");
    }
	//Metodos CRUD
	public function addUsuario($nombres, $apellidos, $correo, $contrasena, $telefono, $nivel){
        $hash = MD5($contrasena);
        $sql = "INSERT INTO usuarios(id_usuario, nombres, apellidos, correo, contrasena, telefono, id_nivel)VALUES(
            NULL, '{$nombres}', '{$apellidos}', '{$correo}', '{$hash}', '{$telefono}', '{$nivel}')";
            return $this->db->query($sql);
    }

    public function getUsuarios(){
        $sql = $this->db->query("SELECT usuarios.id_usuario, usuarios.correo,
                                        usuarios.nombres, usuarios.apellidos, 
                                        usuarios.contrasena, usuarios.id_nivel, 
                                        usuarios.telefono, usuarios.created,
                                        niveles.id_nivel, niveles.nivel, niveles.created
                                            FROM usuarios
                                                INNER JOIN niveles on usuarios.id_nivel = niveles.id_nivel");
        while($filas = $sql->fetch_assoc()){
            $this->usuario[] = $filas;
        }
        return $this->usuario;
    }

    public function getUsuarioId($id_usuario){
        $sql = $this->db->query("SELECT usuarios.id_usuario, usuarios.correo,
                                        usuarios.nombres, usuarios.apellidos, 
                                        usuarios.contrasena, usuarios.id_nivel, 
                                        usuarios.telefono, usuarios.created,
                                        niveles.id_nivel, niveles.nivel, niveles.created
                                            FROM usuarios
                                                INNER JOIN niveles on usuarios.id_nivel = niveles.id_nivel
                                                WHERE usuarios.id_usuario = '{$id_usuario}'");
        while($filas = $sql->fetch_assoc()){
            $this->usuario[] = $filas;
        }
        return $this->usuario;
    } 

   public function editPerfil($id_usuario, $nombres, $apellidos, $correo, $telefono, $clave){
        $hash = MD5($clave);

            $sqlUpdate = "UPDATE usuarios SET nombres='{$nombres}', apellidos='{$apellidos}',
                                    correo='{$correo}', telefono='{$telefono}', contrasena='{$hash}'
                  WHERE id_usuario='{$id_usuario}'";
            return $this->db->query($sqlUpdate);

        //$this->getSession($cuenta, $clave);
    }

    public function editUsuario($id_usuario, $nombres, $apellidos, $correo, $contrasena, $telefono, $nivel){
        $hash = MD5($contrasena);
        $sql = "UPDATE usuarios SET nombres='{$nombres}', apellidos='{$apellidos}', 
                  correo='{$correo}', contrasena='{$hash}', telefono='{$telefono}', id_nivel='{$nivel}'
                  WHERE id_usuario='{$id_usuario}'";
        return $this->db->query($sql);
    }
    public function deleteUsuario($id_usuario){
        $sql = "DELETE FROM usuarios WHERE id_usuario={$id_usuario}";
        return $this->db->query($sql);
    }
}