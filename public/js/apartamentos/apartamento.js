//Alicuotas
//Llama modal nuevo
function nuevoApartamento(){
    $('#nuevoApartamento').modal('toggle');
}

//Llama modal para editar
function editApartamento(index) {
    //Modal edit
    $('#editApartamento').modal('toggle');

    //Nodos tabla
    var id_new_apartamento = index.parentNode.parentNode.cells[0].textContent;
    var new_alicuota_apartamento = index.parentNode.parentNode.cells[1].textContent;
    var new_nombre_apartamento = index.parentNode.parentNode.cells[2].textContent;
    var new_saldo_apartamento = index.parentNode.parentNode.cells[3].textContent;

    //Pego en el formulario
    document.getElementById('id_new_apartamento').value = id_new_apartamento;
    document.getElementById('new_alicuota_apartamento').options[0].innerHTML = 'Alicuota actual |' + new_alicuota_apartamento;
    document.getElementById('new_nombre_apartamento').value = new_nombre_apartamento;
    document.getElementById('new_saldo_apartamento').value = new_saldo_apartamento;
}

//Elimina el registro
function delApartamento(index) {
    var tabla = document.getElementById('tablaApartamento');
    var tr = index.parentNode.parentNode.rowIndex;
    //Nodos tabla
    var id = index.parentNode.parentNode.cells[0].textContent;

   
    var confirmacion = confirm(`Seguro eliminar el apartamento ${id}`);
        if(confirmacion){
            window.location = "../controllers/apartamentos/delApartamento?id="+id;
             tabla.deleteRow(tr);
        }
}