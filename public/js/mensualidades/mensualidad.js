//Alicuotas
//Llama modal nuevo
function nuevaMensualidad(){
    $('#nuevaMensualidad').modal('toggle');
}

//Llama modal para editar
function editMensualidad(index) {
    //Modal edit
    $('#editMensualidad').modal('toggle');

    //Nodos tabla
    var id_new_mensualidad = index.parentNode.parentNode.cells[0].textContent;
    var new_mensualidad_descripcion = index.parentNode.parentNode.cells[1].textContent;
    var new_mensualidad_total = index.parentNode.parentNode.cells[2].textContent;
    var new_mensualidad_fecha = index.parentNode.parentNode.cells[3].textContent;
    var new_mensualidad_tipo = index.parentNode.parentNode.cells[4].textContent;

    //Pego en el formulario
    document.getElementById('id_new_mensualidad').value = id_new_mensualidad;
    document.getElementById('new_mensualidad_descripcion').value = new_mensualidad_descripcion;
    document.getElementById('new_mensualidad_total').value = new_mensualidad_total;
    document.getElementById('new_mensualidad_fecha').value = new_mensualidad_fecha;
    document.getElementById('new_mensualidad_tipo').value = new_mensualidad_tipo;
}

//Elimina el registro
function delMensualidad(index) {
    var tabla = document.getElementById('tablaMensualidad');
    var tr = index.parentNode.parentNode.rowIndex;
    //Nodos tabla
    var id = index.parentNode.parentNode.cells[0].textContent;

    var confirmacion = confirm(`Seguro eliminar mensualidad ${id}`);
        if(confirmacion){
            window.location = "../controllers/mensualidades/delMensualidad?id="+id;
             tabla.deleteRow(tr);
        }
}

function procesarMensualidad(index){
    var id = index.parentNode.parentNode.cells[0].textContent;
    var total = index.parentNode.parentNode.cells[2].textContent;
    var fecha = index.parentNode.parentNode.cells[3].textContent;

    if(confirm('Seguro desea procesar la mensualidad')){
        var data = {
            'id_mensualidad' : id,
            'total' : total,
            'fecha' : fecha,
            'cancelado' : 0
    };

    console.log(`${JSON.stringify(data)}`);

        $.ajax({
            url: "../controllers/cxc/addCxc.php",
            type: "post",
            data: data,
            success: function (data) {
               console.log(data); 
               window.location = '?mensualidad';             
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }
        });
    }
}