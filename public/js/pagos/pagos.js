function aprobarPago(index) {
    
    var tr = index.parentNode.parentNode.rowIndex;
    //Nodos tabla
    var id = index.parentNode.parentNode.cells[0].textContent;

   
    var confirmacion = confirm(`Seguro aprobar este pago ${id}`);
        if(confirmacion){
            window.location = "../controllers/pagos/aprobarPago?id="+id;
        }
}

//Llama modal para editar
function reciboPago(index) {
    //Modal edit
    $('#imprimir').modal('toggle');

    //Nodos tabla
    var fecha = index.parentNode.parentNode.cells[9].textContent;
    var nombre = index.parentNode.parentNode.cells[4].textContent;
    var monto = index.parentNode.parentNode.cells[5].textContent;
    var descripcion = index.parentNode.parentNode.cells[8].textContent;

    //Pego en el formulario
    document.getElementById('fecha').innerHTML = fecha;
    document.getElementById('nombre').innerHTML = nombre;
    document.getElementById('monto').innerHTML = monto;
    document.getElementById('descripcion').innerHTML = descripcion;
}
