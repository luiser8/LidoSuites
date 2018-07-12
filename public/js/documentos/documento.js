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
    var id_alicuota = index.parentNode.parentNode.cells[0].textContent;
    var new_alicuota = index.parentNode.parentNode.cells[1].textContent;
    var new_monto = index.parentNode.parentNode.cells[2].textContent;

    //Pego en el formulario
    document.getElementById('id_alicuota').value = id_alicuota;
    document.getElementById('new_alicuota').value = new_alicuota;
    document.getElementById('new_monto').value = new_monto;
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