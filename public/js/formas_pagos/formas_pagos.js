//Alicuotas
//Llama modal nuevo
function nuevaFormaPago(){
    $('#nuevaFormaPago').modal('toggle');
}

//Llama modal para editar
function editFormaPago(index) {
    //Modal edit
    $('#editFormaPago').modal('toggle');

    //Nodos tabla
    var id_forma_pago = index.parentNode.parentNode.cells[0].textContent;
    var new_descripcion = index.parentNode.parentNode.cells[1].textContent;

    //Pego en el formulario
    document.getElementById('id_forma_pago').value = id_forma_pago;
    document.getElementById('new_descripcion_forma_pago').value = new_descripcion;
}

//Elimina el registro
function delFormaPago(index) {
    var tabla = document.getElementById('tablaFormasPagos');
    var tr = index.parentNode.parentNode.rowIndex;
    //Nodos tabla
    var id = index.parentNode.parentNode.cells[0].textContent;

    var confirmacion = confirm(`Seguro eliminar la forma de pago ${id}`);
        if(confirmacion){
            window.location = "../controllers/formas_pago/delFormaPago?id="+id;
             tabla.deleteRow(tr);
        }
}