<?php 

require_once '../../models/cxc.php';

$cxc = new CXC();

if(!empty($_GET['id_cxc'])){
	echo json_encode($cxc->getCxcIdForMonto($_GET['id_cxc']));
}