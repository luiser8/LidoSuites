<?php
require_once 'db.php';

class CXC{
	private $db;
	private $cxc;

	public function __construct(){
		$this->db=db::conexion();
		$this->cxc=array();
	}

	//Metodos CRUD
	public function addCxc($id_apartamento, $id_alicuota, $id_mensualidad, $monto, $cancelado, $fecha){
        $sql = "INSERT INTO cxc(id_cxc, id_apartamento, id_alicuota, id_mensualidad, monto, cancelado, fecha)VALUES(
            NULL, '{$id_apartamento}', '{$id_alicuota}', '{$id_mensualidad}', '{$monto}', '{$cancelado}', '{$fecha}')";
            return $this->db->query($sql);
    }

    public function getCxc(){
        $sql = $this->db->query("SELECT cxc.*, mensualidad.descripcion AS mes, apartamentos.nombre AS apto,
                                                contrato.id_apartamento AS idApto, contrato.id_propietario AS propietario
                                            FROM cxc
                                                INNER JOIN mensualidad on cxc.id_mensualidad = mensualidad.id_mensualidad
                                                INNER JOIN apartamentos on cxc.id_apartamento = apartamentos.id_apartamento
                                                INNER JOIN contrato on cxc.id_apartamento = contrato.id_apartamento
                                                WHERE contrato.id_propietario ='{$_SESSION['idusuario']}' ORDER BY cxc.id_cxc DESC");
        while($filas = $sql->fetch_assoc()){
            $this->cxc[] = $filas;
        }
        return $this->cxc;
    }

    //Impresion
    public function getCxcId($id){
        $sql = $this->db->query("SELECT cxc.*, mensualidad.descripcion AS mes, apartamentos.nombre AS apto,
                                                contrato.id_apartamento AS idApto, contrato.id_propietario AS propietario
                                            FROM cxc
                                                INNER JOIN mensualidad on cxc.id_mensualidad = mensualidad.id_mensualidad
                                                INNER JOIN apartamentos on cxc.id_apartamento = apartamentos.id_apartamento
                                                INNER JOIN contrato on cxc.id_apartamento = contrato.id_apartamento
                                                WHERE contrato.id_propietario =".$_SESSION['idusuario']);
        while($filas = $sql->fetch_assoc()){
            $this->cxc[] = $filas;
        }
        return $this->cxc;
    }

    public function getCxcIdImpresion($id){
        $sql = $this->db->query("SELECT cxc.*, gastos.id_gasto AS idGasto, gastos.monto AS montoGasto, gastos.descripcion AS descripcionGasto,
                                                mensualidad.descripcion AS mes, apartamentos.nombre AS apto,
                                                detalle_mensualidad.id_mensualidad AS id_mensualidad_detalle,
                                                detalle_mensualidad.id_gasto AS id_gasto_detalle,
                                                detalle_mensualidad.cantidad AS cantidad,
                                                alicuotas.id_alicuota, alicuotas.monto AS montoAlicouta
                                            FROM cxc
                                                INNER JOIN mensualidad on cxc.id_mensualidad = mensualidad.id_mensualidad
                                                INNER JOIN apartamentos on cxc.id_apartamento = apartamentos.id_apartamento
                                                INNER JOIN alicuotas on apartamentos.id_alicuota = alicuotas.id_alicuota
                                                INNER JOIN detalle_mensualidad on mensualidad.id_mensualidad = detalle_mensualidad.id_mensualidad
                                                INNER JOIN gastos on detalle_mensualidad.id_gasto = gastos.id_gasto
                                                WHERE cxc.id_cxc ='{$id}'");
        while($filas = $sql->fetch_assoc()){
            $this->cxc[] = $filas;
        }
        return $this->cxc;
    }

    public function getCxcIdForMonto($id){
        $sql = $this->db->query("SELECT * FROM cxc WHERE id_cxc='{$id}' LIMIT 1");
        while($filas = $sql->fetch_assoc()){
            $this->cxc[] = $filas;
        }
        return $this->cxc;
    }

    public function editCxc($id_cxc){
        $sql = "UPDATE cxc SET cancelado=1
                  WHERE id_cxc='{$id_cxc}'";
        return $this->db->query($sql);
    }

    public function addCxcHasPago($id_cxc, $cancelado){
        $sql = "INSERT INTO cxc_has_pago(id_cxc_has_pago, id_cxc, cancelado)VALUES(
            NULL, '{$id_cxc}', '{$cancelado}')";
            return $this->db->query($sql);
    }

    public function editCxcHasPago($id_cxc_has_pago, $id_cxc, $cancelado){
        $sql = "UPDATE cxc_has_pago SET cancelado='{$cancelado}'
                  WHERE id_cxc_has_pago='{$id_cxc_has_pago}'";
        return $this->db->query($sql);
    }

}