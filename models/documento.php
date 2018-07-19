<?php
require_once 'db.php';

class Documento{
	private $db;
	private $documento;

	public function __construct(){
		$this->db=db::conexion();
		$this->documento=array();
	}

	//Metodos CRUD
	public function addDocumento($id_usuario, $fecha, $ubicacion, $descripcion){
        $sql = "INSERT INTO documentos(id_documento, id_usuario, fecha, ubicacion, descripcion)VALUES(
            NULL, '{$id_usuario}', '{$fecha}', '{$ubicacion}', '{$descripcion}')";
            return $this->db->query($sql);
    }

    public function getDocumento(){
        $sql = $this->db->query("SELECT * FROM documentos");
        while($filas = $sql->fetch_assoc()){
            $this->documento[] = $filas;
        }
        return $this->documento;
    }

    public function getDocumentoId($id_documento){
        $sql = $this->db->query("SELECT * FROM documentos WHERE id_documento = '{$id_documento}'");
        while($filas = $sql->fetch_assoc()){
            $this->documento[] = $filas;
        }
        return $this->documento;
    } 

    public function editDocumento($id_documento, $fecha, $ubicacion, $descripcion){
        if(!empty($ubicacion)){
            $sql = "UPDATE documentos SET fecha='{$fecha}', ubicacion='{$ubicacion}', descripcion='{$descripcion}'
                  WHERE id_documento='{$id_documento}'";
        }else{
            $sql = "UPDATE documentos SET fecha='{$fecha}', descripcion='{$descripcion}'
                  WHERE id_documento='{$id_documento}'";
        }
        return $this->db->query($sql);
    }
    public function delDocumento($id_documento, $nombre){
        $sql = "DELETE FROM documentos WHERE id_documento={$id_documento}";
        unlink('../../public/docs/' . $nombre);
        return $this->db->query($sql);
    }
}