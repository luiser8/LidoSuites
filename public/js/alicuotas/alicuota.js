//Alicuotas
//Llama modal nuevo
function nuevaAlicuota(){
    $('#nuevaAlicuota').modal('toggle');
}

//Llama modal para editar
function editAlicuota(index) {
    //Modal edit
    $('#editAlicuota').modal('toggle');

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
function delAlicuota(index) {
    var tabla = document.getElementById('tablaAlicuota');
    var tr = index.parentNode.parentNode.rowIndex;
    //Nodos tabla
    var id = index.parentNode.parentNode.cells[0].textContent;

   
    var confirmacion = confirm(`Seguro eliminar la alicouta ${id}`);
        if(confirmacion){
            window.location = "../controllers/alicuotas/delAlicuota?id="+id;
             tabla.deleteRow(tr);
        }
}