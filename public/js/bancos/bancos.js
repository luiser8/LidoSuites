//Alicuotas
//Llama modal nuevo
function nuevoBanco(){
    $('#nuevoBanco').modal('toggle');
}

//Llama modal para editar
function editBanco(index) {
    //Modal edit
    $('#editBanco').modal('toggle');

    //Nodos tabla
    var id_banco = index.parentNode.parentNode.cells[0].textContent;
    var new_descripcion = index.parentNode.parentNode.cells[1].textContent;

    //Pego en el formulario
    document.getElementById('id_banco').value = id_banco;
    document.getElementById('new_descripcion').value = new_descripcion;
}

//Elimina el registro
function delBanco(index) {
    var tabla = document.getElementById('tablaBancos');
    var tr = index.parentNode.parentNode.rowIndex;
    //Nodos tabla
    var id = index.parentNode.parentNode.cells[0].textContent;

    var confirmacion = confirm(`Seguro eliminar el banco ${id}`);
        if(confirmacion){
            window.location = "../controllers/bancos/delBanco?id="+id;
             tabla.deleteRow(tr);
        }
}