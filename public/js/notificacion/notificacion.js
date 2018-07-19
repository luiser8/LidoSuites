//Alicuotas
//Llama modal nuevo
function nuevaNotificacion(){
    $('#nuevaNotificacion').modal('toggle');
}

//Llama modal para editar
function editNotificacion(index) {
    //Modal edit
    $('#editNotificacion').modal('toggle');

    //Nodos tabla
    var id_new_notificacion_pago = index.parentNode.parentNode.cells[0].textContent;
    var new_monto = index.parentNode.parentNode.cells[4].textContent;
    var new_referencia = index.parentNode.parentNode.cells[5].textContent;
    var new_descripcion = index.parentNode.parentNode.cells[7].textContent;
    //Pego en el formulario
    document.getElementById('id_new_notificacion_pago').value = id_new_notificacion_pago;
    document.getElementById('new_total_notificacion').value = new_monto;
    document.getElementById('new_referencia_notificacion').value = new_referencia;
    document.getElementById('new_descripcion_notificacion').value = new_descripcion;
}

//Calculo Iva
function subTotal(index){
    var subTotalCal = parseFloat(index.value) * 12 / 100;
    var totalOk = parseFloat(subTotalCal) + parseFloat(index.value);
    $('#monto').each(function(){
       // if(!isNaN(index.value) && index.value.length != 0){
       //      totalOk += parseFloat(index.value);
       // }
    });

    $('#total').val(totalOk.toFixed(2));      
}
function subTotalEdit(index){
    var subTotalCal = parseFloat(index.value) * 12 / 100;
    var totalOk = parseFloat(subTotalCal) + parseFloat(index.value);
    $('#new_monto_notificacion').each(function(){
       // if(!isNaN(index.value) && index.value.length != 0){
       //      totalOk += parseFloat(index.value);
       // }
    });

    $('#new_total_notificacion').val(totalOk.toFixed(2));      
}

function getMonto(id){
  $.ajax({
        url: "../controllers/cxc/getCxc.php?id_cxc="+id.value,
        type: "GET",
        success: function (response) {
           //window.location = '?cuenta';  
           console.log(response);
           var cxc = [];
           var data = JSON.parse(response);
           for(var i=0; i<data.length; i++){
            cxc.push(data[i].monto);
            console.log(data[i].monto);
            $('#monto').val(data[i].monto);
           }       
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });
}