var Apto = [];

function aptoArray(apto){
    Apto.push(apto);
    console.log(Apto);
}

function selectApto(){
    $('#selectApto').modal('toggle');
}

//ajax
function validarContrato(){
    var fechaInicio =  $('#fechaInicio').val();
    var fechaFin =  $('#fechaFin').val();
    var tbody = $('#tablaContrato > tbody > .suma').length;

    if(fechaInicio == ''){
         $('#fechaInicio').css("background", "yellow");
    }
    if(fechaFin == ''){
         $('#fechaFin').css("background", "yellow");
    }
    if(tbody == ''){
         $('#tablaContrato > thead').css("background", "yellow");
    }    
    if(fechaInicio != '' && fechaFin != '' && tbody != 0){
        creaContrato();
    }
}

function creaContrato(){
    var data = {
        'id_propietario' : $('#id_propietario').val(),
        'Apto' : Apto,
        'fechaInicio' : $('#fechaInicio').val(),
        'fechaFin' : $('#fechaFin').val()
    };

    $.ajax({
        url: "../controllers/propietarios/addContrato.php",
        type: "post",
        data: data,
        success: function (data) {
           console.log(data); 
           window.location = '?propietarios';             
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }

    });
}

//Insertar repuesto en la Tabla
function addApto(index){
            var idApto = index.parentNode.parentNode.cells[0].textContent;
            var nombre = index.parentNode.parentNode.cells[1].textContent;
            var botonAdd = index.parentNode.parentNode.cells[2].childNodes[1];
            var botonQuitar = index.parentNode.parentNode.cells[2].childNodes[2];

            //if($('input[type=button]:checked').length >= 1){
                var tbody = $('#tablaContrato > tbody #aqui'); //.item-row:last

                tbody.before('\
                    <tr class="suma">\
                      <td><input type="hidden" id="'+idApto+'" value="'+idApto+'"/><input type="text" class="form-control" readonly="off" value="'+ idApto +'"/></td>\
                        <td><input type="text" class="form-control" readonly="off" value="'+ nombre +'"/></td>\
                      </tr>\
                  ');

                botonAdd.setAttribute('disabled', 'on');
                index.parentNode.parentNode.style.backgroundColor = "yellow";

                //Enviar repuesto
                var apto = {
                    'idApto':idApto,
                    'Nombre':nombre
                };
                aptoArray(apto);
            //}
}

//Quitar Repuesto
// function quitar(index, id){
//     index.parentNode.parentNode.style.backgroundColor = "white";
//     var botonAdd = index.parentNode.parentNode.cells[2].childNodes[1];
//     botonAdd.removeAttribute('disabled'); 
//     $(`#${id}`).closest('tr').remove();
// }