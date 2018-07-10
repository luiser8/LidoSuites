<?php 
require_once '../../models/auditoria.php';

$auditoria = new Auditoria();
$auditoria->delAuditoria($_GET['id']);
header('Location: ../../pages/config?auditoria');