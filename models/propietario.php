<?php
require_once 'db.php';

class Propietario{
	private $db;
	private $propietario;

	public function __construct(){
		$this->db=db::conexion();
		$this->propietario=array();
	}

	//Metodos CRUD
	public function addPropietario($cedula, $nombres, $apellidos, $telefono, $correo, $notas){
        $sql = "INSERT INTO propietarios(id_propietario, cedula, nombres, apellidos, telefono, correo, notas)VALUES(
            NULL, '{$cedula}', '{$nombres}', '{$apellidos}', '{$telefono}', '{$correo}', '{$notas}')";
            return $this->db->query($sql);
    }

    public function getPropietarios(){
        $sql = $this->db->query("SELECT propietarios.*, usuarios.id_usuario
                                        FROM propietarios
                                    INNER JOIN usuarios ON propietarios.correo = usuarios.correo");
        while($filas = $sql->fetch_assoc()){
            $this->propietario[] = $filas;
        }
        return $this->propietario;
    }

    public function getPropietariosContrato(){
        $sql = $this->db->query("SELECT usuarios.*, contrato.id_propietario AS contrato
                                        FROM usuarios
                                    INNER JOIN contrato ON usuarios.id_usuario = contrato.id_propietario
                                    WHERE usuarios.id_nivel = 3");
        while($filas = $sql->fetch_assoc()){
            $this->propietario[] = $filas;
        }
        return $this->propietario;
    }

    public function getPropietarioId($id_propietario){
        $sql = $this->db->query("SELECT * FROM propietarios WHERE id_propietario = '{$id_propietario}'");
        while($filas = $sql->fetch_assoc()){
            $this->propietario[] = $filas;
        }
        return $this->propietario;
    } 

    public function editPropietario($id_propietario, $cedula, $nombres, $apellidos, $telefono, $correo, $notas){
        $sql = "UPDATE propietarios SET cedula='{$cedula}', nombres='{$nombres}', apellidos='{$apellidos}',
                                telefono='{$telefono}', correo='{$correo}', notas='{$notas}'
                  WHERE id_propietario='{$id_propietario}'";
        return $this->db->query($sql);
    }
    
    public function contratoPropietario($cedula){
        $sql = "UPDATE propietarios SET contrato='1'
                  WHERE cedula='{$cedula}'";
        return $this->db->query($sql);
    }
    
    public function delPropietario($id_propietario){
        $sql = "DELETE FROM propietarios WHERE id_propietario='{$id_propietario}'";
        return $this->db->query($sql);
    }
}