//Alicuotas
//Llama modal nuevo
function nuevoGasto(){
    $('#nuevoGasto').modal('toggle');
}

//Llama modal para editar
function editGasto(index) {
    //Modal edit
    $('#editGasto').modal('toggle');
    //Nodos tabla
    var id_gasto = index.parentNode.parentNode.cells[0].textContent;
    var new_descripcion_gasto = index.parentNode.parentNode.cells[1].textContent;    
    var new_monto = index.parentNode.parentNode.cells[2].textContent;
    var new_tipoGasto = index.parentNode.parentNode.cells[3].textContent;    
    var new_numeroUts = index.parentNode.parentNode.cells[4].textContent;
    var new_id_ut = index.parentNode.parentNode.cells[5].textContent;  
    //console.log(id_ut);
    
    //Pego en el formulario
    document.getElementById('new_id_gasto').value = id_gasto;
    document.getElementById('new_numeroUts').value = new_numeroUts;
    document.getElementById('new_descripcion_gasto').value = new_descripcion_gasto;

    var nivel=0;
        switch(new_tipoGasto) {
        case 'Ordinario':
            nivel=1;
            break;
        case 'Alquiler':
            nivel=2;
            break;
        default:
            nivel=3;
            }
    document.getElementById('new_tipoGasto').selectedIndex = nivel;
    
    if(nivel!=1)
    {
        $('#new_numeroUts').css('display', 'block');
        $('#new_montoGasto').val('');
        $('#new_montoGasto').attr("readonly","readonly");
        $('#new_id_utGasto').prop("disabled", false);      
        document.getElementById('new_id_utGasto').selectedIndex = new_id_ut;                
        var total = parseFloat(new_numeroUts) * parseFloat($("#new_id_utGasto option:selected").text());
        $('#new_montoGasto').val(total.toFixed(2));           
    }
    else
    {
        $('#new_numeroUts').css('display', 'none');
        $('#new_montoGasto').val('');
        $('#new_montoGasto').removeAttr("readonly");
        $('#new_id_utGasto').prop("disabled", true);  
        $('#new_montoGasto').val(new_monto);
     }

    
    

}
//Calculo Iva
function subTotalGasto(index){
    var subTotalCal = parseFloat(index.value) * 12 / 100;
    var totalOk = parseFloat(subTotalCal) + parseFloat(index.value);
    $('#montoGasto').each(function(){
       // if(!isNaN(index.value) && index.value.length != 0){
       //      totalOk += parseFloat(index.value);
       // }
    });

    $('#totalGasto').val(totalOk.toFixed(2));
}
function subTotalGastoEdit(index){
    var subTotalCal = parseFloat(index.value) * 12 / 100;
    var totalOk = parseFloat(subTotalCal) + parseFloat(index.value);
    $('#new_monto_gasto').each(function(){
       // if(!isNaN(index.value) && index.value.length != 0){
       //      totalOk += parseFloat(index.value);
       // }
    });

    $('#newTotalGasto').val(totalOk.toFixed(2));
}
//Elimina el registro
function delGasto(index) {
    var tabla = document.getElementById('tablaGastos');
    var tr = index.parentNode.parentNode.rowIndex;
    //Nodos tabla
    var id = index.parentNode.parentNode.cells[0].textContent;

    var confirmacion = confirm(`Seguro eliminar el gasto ${id}`);
        if(confirmacion){
            window.location = "../controllers/gastos/delGasto?id="+id;
             tabla.deleteRow(tr);
        }
}

//Agregar numero de ut si es multa o alquiler

$('#tipoGasto').change(function(){
    if($(this).val() != 1){
        $('#numeroUts').css('display', 'block');
        $('#montoGasto').val('');
        $('#montoGasto').attr("readonly","readonly");
        $('#id_utGasto').prop("disabled", false);
    }else if($(this).val() == 1){
        $('#numeroUts').css('display', 'none');
        $('#montoGasto').val('');
        $('#montoGasto').removeAttr("readonly");
        $('#id_utGasto').prop("disabled", true);
    }
});

//Calcular las cantidades por la ut
$('#numeroUts').change(function(){
    var monto = document.getElementById('id_utGasto').selectedOptions[0].text; 
    var total = parseFloat($(this).val()) * parseFloat($("#id_utGasto option:selected").html());
    console.log(total);
    //console.log($("#id_utGasto option:selected").html());
    $('#montoGasto').val(total.toFixed(2));
});

$('#id_utGasto').change(function(){
    $('#montoGasto').val($("#id_utGasto option:selected").html().trim());
});



//Para la ventana editar gastos al momento de cambiar
$('#new_tipoGasto').change(function(){
    if($(this).val() != 1){
        $('#new_numeroUts').css('display', 'block');
        $('#new_montoGasto').val('');
        $('#new_montoGasto').attr("readonly","readonly");
        $('#new_id_utGasto').prop("disabled", false);
    }else if($(this).val() == 1){
        $('#new_numeroUts').css('display', 'none');
        $('#new_montoGasto').val('');
        $('#new_montoGasto').removeAttr("readonly");
        $('#new_id_utGasto').prop("disabled", true);
    }
});

//Calcular las cantidades por la ut
$('#new_numeroUts').change(function(){
    var monto = document.getElementById('new_id_utGasto').selectedOptions[0].text; 
    var total = parseFloat($(this).val()) * parseFloat($("#new_id_utGasto option:selected").html());
    //console.log(total);
    //console.log($("#id_utGasto option:selected").html());
    $('#new_montoGasto').val(total.toFixed(2));
});

$('#new_id_utGasto').change(function(){
    $('#new_montoGasto').val($("#new_id_utGasto option:selected").html().trim());
});
