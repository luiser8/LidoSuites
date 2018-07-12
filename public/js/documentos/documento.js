//Alicuotas
//Llama modal nuevo
function nuevoDocumento(){
    $('#nuevoDocumento').modal('toggle');
}

//Llama modal para editar
function editDocumento(index) {
    //Modal edit
    $('#editDocumento').modal('toggle');

    //Nodos tabla
    var id_new_documento = index.parentNode.parentNode.cells[0].textContent;
    var new_fecha_doc = index.parentNode.parentNode.cells[1].textContent;
    var new_descripcion_doc = index.parentNode.parentNode.cells[2].textContent;
    //var new_descripcion_doc = index.parentNode.parentNode.cells[3].textContent;

    //Pego en el formulario
    document.getElementById('id_new_documento').value = id_new_documento;
    document.getElementById('new_fecha_doc').value = new_fecha_doc;
    document.getElementById('new_descripcion_doc').value = new_descripcion_doc;
}

//Elimina el registro
function delDocumento(index, nombre) {
    var tabla = document.getElementById('tablaDoc');
    var tr = index.parentNode.parentNode.rowIndex;
    //Nodos tabla
    var id = index.parentNode.parentNode.cells[0].textContent;

    var confirmacion = confirm(`Seguro eliminar el documento ${nombre}`);
        if(confirmacion){
            window.location = "../controllers/documentos/delDocumento?id="+id+"&name="+nombre;
             //tabla.deleteRow(tr);
        }
}