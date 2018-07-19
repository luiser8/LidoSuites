//Alicuotas
//Llama modal nuevo
function nuevoPropietario(){
    $('#nuevoPropietario').modal('toggle');
}

//Llama modal para editar
function editPropietario(index) {
    //Modal edit
    $('#editPropietario').modal('toggle');

    //Nodos tabla
    var id_new_propietario = index.parentNode.parentNode.cells[0].textContent;
    var new_cedula_propietario = index.parentNode.parentNode.cells[1].textContent;
    var new_nombres_propietario = index.parentNode.parentNode.cells[2].textContent;
    var new_apellidos_propietario = index.parentNode.parentNode.cells[3].textContent;
    var new_telefono_propietario = index.parentNode.parentNode.cells[4].textContent;
    var new_correo_propietario = index.parentNode.parentNode.cells[5].textContent;
    var new_notas_propietario = index.parentNode.parentNode.cells[6].textContent;

    //Pego en el formulario
    document.getElementById('id_new_propietario').value = id_new_propietario;
    document.getElementById('new_cedula_propietario').value = new_cedula_propietario;
    document.getElementById('new_nombres_propietario').value = new_nombres_propietario;
    document.getElementById('new_apellidos_propietario').value = new_apellidos_propietario;
    document.getElementById('new_telefono_propietario').value = new_telefono_propietario;
    document.getElementById('new_correo_propietario').value = new_correo_propietario;
    document.getElementById('new_notas_propietario').value = new_notas_propietario;
}

//Elimina el registro
function delPropietario(index) {
    var tabla = document.getElementById('tablaPropietario');
    var tr = index.parentNode.parentNode.rowIndex;
    //Nodos tabla
    var id = index.parentNode.parentNode.cells[0].textContent;

    var confirmacion = confirm(`Seguro eliminar el propietario ${id}`);
        if(confirmacion){
            window.location = "../controllers/propietarios/delPropietario?id="+id;
             tabla.deleteRow(tr);
        }
}