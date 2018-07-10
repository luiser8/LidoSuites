<?php
require_once 'db.php';

class Auditoria{
	private $db;
	private $auditoria;

	public function __construct(){
		$this->db=db::conexion();
		$this->auditoria=array();
	}

	//Metodos CRUD
	public function addAuditoria($id_usuario, $evento, $tabla){
        $sql = "INSERT INTO auditorias(id_auditoria, id_usuario, evento, tabla)VALUES(
            NULL, '{$id_usuario}', '{$evento}', '{$tabla}')";
            return $this->db->query($sql);
    }

    public function getAuditoria(){
        $sql = $this->db->query("SELECT usuarios.id_usuario, usuarios.correo,
                                        usuarios.nombres, usuarios.apellidos, 
                                        usuarios.contrasena, usuarios.id_nivel, 
                                        usuarios.telefono, usuarios.created,
                                        auditorias.id_auditoria, auditorias.id_usuario,
                                        auditorias.evento, auditorias.tabla, auditorias.created
                                            FROM usuarios
                                                INNER JOIN auditorias on usuarios.id_usuario = auditorias.id_usuario 
                                                ORDER BY auditorias.id_auditoria DESC");
        while($filas = $sql->fetch_assoc()){
            $this->auditoria[] = $filas;
        }
        return $this->auditoria;
    }

    public function getAuditoriaId($id_auditoria){
        $sql = $this->db->query("SELECT * FROM auditorias WHERE id_auditoria = '{$id_auditoria}'");
        while($filas = $sql->fetch_assoc()){
            $this->auditoria[] = $filas;
        }
        return $this->auditoria;
    } 

    public function editAuditoria($id_auditoria, $id_usuario, $evento, $tabla){
        $sql = "UPDATE auditorias SET id_usuario='{$id_usuario}', evento='{$evento}', tabla='{$tabla}'
                  WHERE id_auditoria='{$id_auditoria}'";
        return $this->db->query($sql);
    }
    public function delAuditoria($id_auditoria){
        $sql = "DELETE FROM auditorias WHERE id_auditoria={$id_auditoria}";
        return $this->db->query($sql);
    }
}