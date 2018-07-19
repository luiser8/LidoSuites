var Gasto = [];

function gastoArray(gasto){
    Gasto.push(gasto);
    console.log(Gasto);
}

function selectGasto(){
    $('#selectGasto').modal('toggle');
}

//Calculo IVA
$('#iva').keyup(function(){
    //var precio_unitarioXcantidad = $('#precio_unitario').val() * $('#cantidad').val();
    var subtotal = $('#sub_total').val();
    var iva = subtotal * $(this).val() / 100;
    //var total = precio_unitarioXcantidad + iva;
    console.log(iva);
    var total = parseFloat(iva) + parseFloat(subtotal);
        $('#totalGastoOk').val(parseFloat(total).toFixed(2));
    //$('#total').val(total);
})

//ajax
function validarFactura(){
    var fecha =  $('#fecha').val();
    var descripcion = $('#descripcionMensualidad').val();
    var tbody = $('#tabla > tbody > .suma').length;

    if(fecha == ''){
         $('#fecha').css("background", "yellow");
    }
    if(descripcion == ''){
         $('#descripcionMensualidad').css("background", "yellow");
    }
    if(tbody == ''){
         $('#tabla > thead').css("background", "yellow");
    }    

    if(fecha != '' && descripcion != '' && tbody != 0){
        creaMensualidad();
    }

}
function creaMensualidad(){
    //Calculo iva
    var subtotal = $('#sub_total').val();
        // var iva = subtotal * $('#iva').val() / 100;
        // var total = parseFloat(iva) + parseFloat(subtotal);

    if($('#descripcionMensualidad').val() != '' && $('#totalGastoOk').val() != '' && $('#fecha').val() != ''){
        var data = {
        'descripcion' : $('#descripcionMensualidad').val(),
        'total' : $('#totalGastoOk').val(),
        'fecha' : $('#fecha').val(),
        'gastos' : Gasto
    };

        $.ajax({
            url: "../controllers/mensualidades/addMensualidad.php",
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
    }else{
        alert('Debes tener campos obligatorios vacios, chequa y vuelve a generar la mensualidad!');
    }
}

//Insertar repuesto en la Tabla
function addGasto(index){
            var idGasto = index.parentNode.parentNode.cells[0].textContent;
            var descripcion = index.parentNode.parentNode.cells[1].textContent;
            var precio_unitario = index.parentNode.parentNode.cells[2].textContent;
            var cantidad = index.parentNode.parentNode.cells[3].lastChild.value;
            var botonAdd = index.parentNode.parentNode.cells[4].childNodes[1];
            var botonQuitar = index.parentNode.parentNode.cells[4].childNodes[2];

        if(cantidad != ''){
            //if($('input[type=button]:checked').length >= 1){
                var tbody = $('#tabla > tbody #aqui'); //.item-row:last
                var monto = parseFloat(precio_unitario) * parseFloat(cantidad);

                tbody.before('\
                    <tr class="suma">\
                      <td><input type="hidden" id="'+idGasto+'" value="'+idGasto+'"/><input type="text" class="form-control" readonly="off" value="'+ descripcion +'"/></td>\
                      <td><input type="text" class="form-control" readonly="off" value="'+ precio_unitario +'"/></td>\
                      <td><input type="text" class="form-control" readonly="off" value="'+ cantidad +'"/></td>\
                      <td>\
                        <div class="row">\
                            <div class="col-xs-12 col-sm-12 col-md-12">\
                                <input type="number" class="form-control monto" readonly="off" value="'+ monto.toFixed(2) +'"/>\
                            </div>\
                        </div>\
                      </td>\
                      </tr>\
                  ');

                botonAdd.setAttribute('disabled', 'on');
                index.parentNode.parentNode.style.backgroundColor = "yellow";

                subTotal(monto, index);

                //Enviar repuesto
                var gasto = {
                    'idGasto':idGasto,
                    'Monto':precio_unitario,
                    'Cantidad': cantidad
                };
                gastoArray(gasto);
            //}
        }
}

//Quitar Repuesto
function quitar(index, id){
    index.parentNode.parentNode.style.backgroundColor = "white";
    var botonAdd = index.parentNode.parentNode.cells[4].childNodes[1];
    botonAdd.removeAttribute('disabled'); 
    $(`#${id}`).closest('tr').remove();
    index.parentNode.parentNode.cells[3].lastChild.value = '';

    var precio_unitario = index.parentNode.parentNode.cells[2].textContent;
    var cantidad = index.parentNode.parentNode.cells[3].lastChild.value;
    var monto = parseFloat(precio_unitario) * parseFloat(cantidad);
    subTotal(monto, id);
}

//Calcular subTotal
function subTotal(calculo, index){
    var totalOk = 0;
    $('.monto').each(function(){
       if(!isNaN(this.value) && this.value.length != 0){
            totalOk += parseFloat(this.value);
       }
    });

    $('#sub_total').val(totalOk.toFixed(2));      
    $('#totalGastoOk').val(totalOk.toFixed(2));
}

//Impedir insertar manualmente la cantidad
    $('.key').keypress(function(event){
        if(event.which){
            event.preventDefault();
        }
    })