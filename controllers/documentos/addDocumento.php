<?php
require_once '../../controllers/usuarios/check.php';
require_once '../../models/documento.php';
require_once '../../models/auditoria.php';

$instanciaDoc = new Documento();
$auditoria = new Auditoria();

$mime_types = array(
    
    'txt' => 'text/plain',
    'htm' => 'text/html',
    'html' => 'text/html',
    'php' => 'text/html',
    'css' => 'text/css',
    'js' => 'application/javascript',
    'json' => 'application/json',
    'xml' => 'application/xml',
    'swf' => 'application/x-shockwave-flash',
    'flv' => 'video/x-flv',
    
    // images
    'png' => 'image/png',
    'jpe' => 'image/jpeg',
    'jpeg' => 'image/jpeg',
    'jpg' => 'image/jpeg',
    'gif' => 'image/gif',
    'bmp' => 'image/bmp',
    'ico' => 'image/vnd.microsoft.icon',
    'tiff' => 'image/tiff',
    'tif' => 'image/tiff',
    'svg' => 'image/svg+xml',
    'svgz' => 'image/svg+xml',
    
    // archives
    'zip' => 'application/zip',
    'rar' => 'application/x-rar-compressed',
    'exe' => 'application/x-msdownload',
    'msi' => 'application/x-msdownload',
    'cab' => 'application/vnd.ms-cab-compressed',
    
    // audio/video
    'mp3' => 'audio/mpeg',
    'qt' => 'video/quicktime',
    'mov' => 'video/quicktime',
    
    // adobe
    'pdf' => 'application/pdf',
    'psd' => 'image/vnd.adobe.photoshop',
    'ai' => 'application/postscript',
    'eps' => 'application/postscript',
    'ps' => 'application/postscript',
    
    // ms office
    'doc' => 'application/msword',
    'rtf' => 'application/rtf',
    'xls' => 'application/vnd.ms-excel',
    'ppt' => 'application/vnd.ms-powerpoint',
    
    // open office
    'odt' => 'application/vnd.oasis.opendocument.text',
    'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
);

if(!empty($_POST)){
    
    if(in_array($_FILES["archivo"]["type"],$mime_types)){
        $id_usuario = isset($_SESSION['idusuario']) ? $_SESSION['idusuario'] : '';
        $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
        $ubicacion = '../../public/docs/'.basename($_FILES['archivo']['name']);
        move_uploaded_file($_FILES['archivo']['tmp_name'], $ubicacion);
        $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
        
        $instanciaDoc->addDocumento($id_usuario, $fecha, $_FILES['archivo']['name'], $descripcion);
        
        //var_dump($_POST);
        //var_dump($_FILES);
        
        $auditoria->addAuditoria($_SESSION['idusuario'], 'Agregar un apartamento', 'apartamentos');
        header('Location: ../../pages/?documentos');
    }else{
        header('Location: ../../pages/?documentos');
    }
}