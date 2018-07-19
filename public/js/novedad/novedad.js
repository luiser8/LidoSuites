//Alicuotas
//Llama modal nuevo
function nuevaNovedad(){
    $('#nuevaNovedad').modal('toggle');
}

//Llama modal para editar
function editNovedad(index) {
    //Modal edit
    $('#editNovedad').modal('toggle');

    //Nodos tabla
    var id_new_novedad = index.parentNode.parentNode.cells[0].textContent;
    // var id_new_id_usuario = index.parentNode.parentNode.cells[1].textContent;
    var new_descripcion_novedad = index.parentNode.parentNode.cells[2].textContent;

    //Pego en el formulario
    document.getElementById('id_new_novedad').value = id_new_novedad;
    // document.getElementById('id_new_id_usuario').value = id_new_id_usuario;
    document.getElementById('new_descripcion_novedad').value = new_descripcion_novedad;
}

//Elimina el registro
function delNovedad(index) {
    var tabla = document.getElementById('tablaNovedad');
    var tr = index.parentNode.parentNode.rowIndex;
    //Nodos tabla
    var id = index.parentNode.parentNode.cells[0].textContent;

    var confirmacion = confirm(`Seguro eliminar novedad ${id}`);
        if(confirmacion){
            window.location = "../controllers/novedad/delNovedad?id="+id;
             tabla.deleteRow(tr);
        }
}