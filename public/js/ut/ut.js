//UT
//Llama modal nuevo
function nuevaUt(){
    $('#nuevaUt').modal('toggle');
}

//Llama modal para editar
function editUt(index) {
    //Modal edit
    $('#editUt').modal('toggle');

    //Nodos tabla
    var id_new_ut = index.parentNode.parentNode.cells[0].textContent;
    var new_ut = index.parentNode.parentNode.cells[1].textContent;
    var new_anio = index.parentNode.parentNode.cells[2].textContent;

    //Pego en el formulario
    document.getElementById('id_new_ut').value = id_new_ut;
    document.getElementById('new_ut').value = new_ut;
    document.getElementById('new_anio_ut').value = new_anio;
}

//Elimina el registro
function delUt(index) {
    var tabla = document.getElementById('tablaUt');
    var tr = index.parentNode.parentNode.rowIndex;
    //Nodos tabla
    var id = index.parentNode.parentNode.cells[0].textContent;

    var confirmacion = confirm(`Seguro eliminar la unidad tributaria ${id}`);
        if(confirmacion){
            window.location = "../controllers/ut/delUt?id="+id;
             tabla.deleteRow(tr);
        }
}