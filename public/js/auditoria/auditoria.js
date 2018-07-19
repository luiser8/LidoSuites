//Auditorias

//Llama modal para editar
function editAuditoria(index) {
    //Modal edit
    $('#editAuditoria').modal('toggle');

    //Nodos tabla
    var id_auditoria = index.parentNode.parentNode.cells[0].textContent;
    var new_user = index.parentNode.parentNode.cells[1].textContent;
    var new_nivel = index.parentNode.parentNode.cells[2].textContent;
    var new_tabla = index.parentNode.parentNode.cells[3].textContent;
    var new_accion = index.parentNode.parentNode.cells[4].textContent;
    var new_fecha = index.parentNode.parentNode.cells[5].textContent;

    //Pego en el formulario
    document.getElementById('id_auditoria').value = id_auditoria;
    document.getElementById('new_usuario').value = new_user;
    document.getElementById('new_nivel').value = new_nivel;
    document.getElementById('new_tabla').value = new_tabla;
    document.getElementById('new_accion').value = new_accion;
    document.getElementById('new_fecha_auditoria').value = new_fecha;
}

//Elimina el registro
function delAuditoria(index) {
    var tabla = document.getElementById('tablaAuditoria');
    var tr = index.parentNode.parentNode.rowIndex;
    //Nodos tabla
    var id = index.parentNode.parentNode.cells[0].textContent;

       var confirmacion = confirm(`Seguro eliminar la auditoria ${id}`);
        if(confirmacion){
            window.location = "../controllers/auditorias/delAuditoria?id="+id;
             tabla.deleteRow(tr);
        }
}
//Paginacion
$(document).ready(function() {
    $('#tablaAuditoria').DataTable();
} );
