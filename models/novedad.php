<?php
require_once 'db.php';

class Novedad{
	private $db;
	private $novedad;

	public function __construct(){
		$this->db=db::conexion();
		$this->novedad=array();
	}

	//Metodos CRUD
	public function addNovedad($id_usuario, $descripcion){
        $sql = "INSERT INTO novedades(id_novedad, id_usuario, descripcion)VALUES(
            NULL, '{$id_usuario}', '{$descripcion}')";
            return $this->db->query($sql);
    }

    public function getNovedad(){
        $sql = $this->db->query("SELECT usuarios.id_usuario, usuarios.correo,
                                        usuarios.nombres, usuarios.apellidos,
                                        concat(nombres,' ',apellidos) as nombre_completo, 
                                        usuarios.contrasena, usuarios.id_nivel, 
                                        usuarios.telefono, usuarios.created,
                                        novedades.id_novedad, novedades.descripcion, novedades.created
                                            FROM usuarios
                                                INNER JOIN novedades on usuarios.id_usuario = novedades.id_usuario");
        while($filas = $sql->fetch_assoc()){
            $this->novedad[] = $filas;
        }
        return $this->novedad;
    }

    public function getNovedadId($id_novedad){
        $sql = $this->db->query("SELECT * FROM novedades WHERE id_novedad = '{$id_novedad}'");
        while($filas = $sql->fetch_assoc()){
            $this->novedad[] = $filas;
        }
        return $this->novedad;
    } 

    public function editNovedad($id_novedad, $id_usuario, $descripcion){
        $sql = "UPDATE novedades SET id_usuario='{$id_usuario}', descripcion='{$descripcion}'
                  WHERE id_novedad='{$id_novedad}'";
        return $this->db->query($sql);
    }
    public function delNovedad($id_novedad){
        $sql = "DELETE FROM novedades WHERE id_novedad={$id_novedad}";
        return $this->db->query($sql);
    }
}