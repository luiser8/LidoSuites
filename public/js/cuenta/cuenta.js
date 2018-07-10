// $(function(){
// 	var totalOk = 0;
// 	$('.monto').each(function(index){
// 		//totalOk += ($(this).html().substring(3, 25) * 1);
// 		//$('.total').eq( index ).html(totalOk.toFixed(2));
// 		//console.log($(this).html().substring(3, 25));
// 		$('#tablaCuenta .color').css('background-color', '#7FFFD4');
// 		//$('#tablaCuenta td:last').css('background-color', 'yellow');
// 	});
// });

//Formulario
$('#formNuevoPagoMensualidad').submit(function(e){
	e.preventDefault();
	var datos = {
		'id_cxc': $('#id_new_cxc').val(),
		'fecha': $('#new_fecha').val(),
		'apto': $('#new_idApto').val(),
		'forma_pago': $('#forma_pago_pagar').val(),
		'banco': $('#banco_pagar').val(),
		'monto': $('#new_monto_pago').val().substring(4, 55),
		'referencia': $('#referencia_pagar').val(),
		'descripcion': $('#descripcion_pagar').val(),
		'fecha': $('#fecha_pagar').val()
	};
	
	guardarPago(datos);
	cancelado($('#id_new_cxc').val());
	console.log(datos);
});

function pagarMensualidad(index){
    $('#pagarMensualidad').modal('toggle');

    var id_cxc = index.parentNode.parentNode.cells[0].textContent;
    var fecha = index.parentNode.parentNode.cells[1].textContent;
    var mes = index.parentNode.parentNode.cells[2].textContent;
    var apto = index.parentNode.parentNode.cells[3].textContent;
    var idApto = index.parentNode.parentNode.cells[3].lastChild.value;
    var monto = index.parentNode.parentNode.cells[4].textContent;

    //Pego en el formulario
    document.getElementById('id_new_cxc').value = id_cxc;
    document.getElementById('new_fecha').value = fecha;
    document.getElementById('new_idApto').value = idApto;
    document.getElementById('new_apto').value = apto;
    document.getElementById('new_monto_pago').value = monto;
}

function cancelado(index) {
    //Nodos tabla
    console.log(index);
        if(index != ''){
            window.location = "../controllers/cxc/cancelado?id="+index;
        }
}

function guardarPago(data){
    $.ajax({
        url: "../controllers/pagos/addPago.php",
        type: "post",
        data: data,
        success: function (data) {
           window.location = '?cuenta';  
           //console.log(data);           
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }

    });
}