<?php
require_once 'db.php';

class Mensualidad{
	private $db;
	private $mensualidad;

	public function __construct(){
		$this->db=db::conexion();
		$this->mensualidad=array();
	}

	//Metodos CRUD
	public function addMensualidad($descripcion, $total, $fecha){
        $sql = "INSERT INTO mensualidad(id_mensualidad, descripcion, total, fecha)VALUES(
            NULL, '{$descripcion}', '{$total}', '{$fecha}')";
            return $this->db->query($sql);
    }

    public function getMensualidades(){
        $sql = $this->db->query("SELECT * FROM mensualidad");
        while($filas = $sql->fetch_assoc()){
            $this->mensualidad[] = $filas;
        }
        return $this->mensualidad;
    }

    public function getMensualidadPagada(){
        $sql = $this->db->query("SELECT mensualidad.*, cxc.id_cxc, cxc.id_apartamento AS idApto, apartamentos.nombre AS aptoNombre,
                                            cxc.id_alicuota, cxc.id_mensualidad AS mensualidad,
                                            cxc.monto, cxc.cancelado, cxc.fecha,
                                            contrato.id_apartamento AS idAptoContrato, contrato.id_propietario AS propietario
                                            FROM mensualidad
                                                INNER JOIN cxc on mensualidad.id_mensualidad = cxc.id_mensualidad
                                                INNER JOIN apartamentos on cxc.id_apartamento = apartamentos.id_apartamento
                                                INNER JOIN contrato on cxc.id_apartamento = contrato.id_apartamento
                                                WHERE contrato.id_propietario ='{$_SESSION['idusuario']}'
                                                AND cxc.cancelado = 0 ORDER BY cxc.id_cxc DESC");
        while($filas = $sql->fetch_assoc()){
            $this->mensualidad[] = $filas;
        }
        return $this->mensualidad;
    }

    public function getMensualidadesOk(){
        $sql = $this->db->query("SELECT * FROM mensualidad ORDER BY id_mensualidad DESC LIMIT 1");
        while($filas = $sql->fetch_assoc()){
            $this->mensualidad[] = $filas;
        }
        return $this->mensualidad;
    }

    public function getMensualidadId($id_mensualidad){
        $sql = $this->db->query("SELECT * FROM mensualidad WHERE id_mensualidad = '{$id_mensualidad}'");
        while($filas = $sql->fetch_assoc()){
            $this->mensualidad[] = $filas;
        }
        return $this->mensualidad;
    } 

    public function getMensualidadIdEditar($id_mensualidad){
        $sql = $this->db->query("SELECT mensualidad.*, detalle_mensualidad.*, gastos.*
                                            FROM mensualidad
                                                INNER JOIN detalle_mensualidad on mensualidad.id_mensualidad = detalle_mensualidad.id_mensualidad
                                                INNER JOIN gastos on detalle_mensualidad.id_gasto = gastos.id_gasto
                                                WHERE mensualidad.id_mensualidad ='{$id_mensualidad}'
                                                AND mensualidad.tipo = 0");
        while($filas = $sql->fetch_assoc()){
            $this->mensualidad[] = $filas;
        }
        return $this->mensualidad;
    } 
    
    public function editMensualidad($id_mensualidad ,$descripcion){
        $sql = "UPDATE mensualidad SET descripcion='{$descripcion}'
                  WHERE id_mensualidad='{$id_mensualidad}'";
        return $this->db->query($sql);
    }
    public function procesarMensualidad($id_mensualidad){
        $sql = "UPDATE mensualidad SET tipo=1
                  WHERE id_mensualidad='{$id_mensualidad}'";
        return $this->db->query($sql);
    }
    public function delMensualidad($id_mensualidad){
        $sql = "DELETE FROM mensualidad WHERE id_mensualidad={$id_mensualidad}";
        return $this->db->query($sql);
    }
}