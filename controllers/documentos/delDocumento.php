<?php
require_once '../../controllers/usuarios/check.php';
require_once '../../models/documento.php';
require_once '../../models/auditoria.php';

$instanciaDoc = new Documento();
$auditoria = new Auditoria();
$instanciaDoc->delDocumento($_GET['id'], $_GET['name']);

$auditoria->addAuditoria($_SESSION['idusuario'], 'Eliminar un documento', 'documentos');
header('Location: ../../pages/?documentos');