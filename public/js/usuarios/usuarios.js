//Llama modal nuevo usuario
function nuevoUsuario(){
    $('#nuevoUsuario').modal('toggle');
}

//Add user
// document.getElementById('formNuevoUsuario').addEventListener('submit', function (e) {
//     e.preventDefault();
//     //Campos
//     // var nombres = document.getElementById('nombres').value;
//     // var apellidos = document.getElementById('apellidos').value;
//     // var correo = document.getElementById('correo').value;
//     // var contrasena = document.getElementById('contrasena').value;
//     // var telefono = document.getElementById('telefono').value;
//     // var nivel = document.getElementById('nivel').value;

//     var usuario = {
//         'nombres': document.getElementById('nombres').value,
//         'apellidos': document.getElementById('apellidos').value,
//         'correo': document.getElementById('correo').value,
//         'contrasena': document.getElementById('contrasena').value,
//         'telefono': document.getElementById('telefono').value,
//         'nivel': document.getElementById('nivel').value
//     };
//     addUsuario(usuario);
// });

function addUsuario(usuario) {
    var Form = new FormData();
    Form.append('nombres', usuario.nombres);
    Form.append('apellidos', usuario.apellidos);
    Form.append('correo', usuario.correo);
    Form.append('contrasena', usuario.contrasena);
    Form.append('telefono', usuario.telefono);
    Form.append('nivel', usuario.nivel);
    Form.append('AddUser', 'AddUser');
          // data: {
          //     'nombres' : $scope.nombres,
          //     'apellidos' : $scope.apellidos,         
          //     'apellidos' : $scope.apellidos,         
          //     'correo' : $scope.correo,         
          //     'contrasena' : $scope.contrasena,         
          //     'telefono' : $scope.telefono,         
          //     'nivel' : $scope.nivel,        
          //     'AddUsuario' : 'AddUsuario' 

    var url = '../controllers/usuarios/add.php';

    if(window.XMLHttpRequest){
        var solicitud = new XMLHttpRequest();
    }else{
        solicitud = new ActiveXObject("Microsoft.XMLHTTP");
    }

    solicitud.onreadystatechange = function () {
        if(solicitud.readyState == 4 && solicitud.status == 200){
            //document.getElementById('formNuevoUsuario').reset();
            //nuevoUsuario();
            //console.log(`La solicitud es ${solicitud.responseText}`);
            if(solicitud.responseText == 'false'){
                console.log(`La solicitud es ${solicitud.responseText}`);
            }
        }
    }
    //console.log('Fuera');
    solicitud.open('POST', url, true);
    solicitud.send(Form);
    toastr.success('Guardado!!!');
    //window.location.reload(true);
}

//Llama modal para editar
function editUsuario(index) {
    //Modal edit
    $('#editUsuario').modal('toggle');

    //Nodos tabla
    var id_new_usuario = index.parentNode.parentNode.cells[0].textContent;
    var new_nombres = index.parentNode.parentNode.cells[1].textContent;
    var new_apellidos = index.parentNode.parentNode.cells[2].textContent;
    var new_correo = index.parentNode.parentNode.cells[3].textContent;
    var new_telefono = index.parentNode.parentNode.cells[4].textContent;
    var new_nivel = index.parentNode.parentNode.cells[5].textContent;

    //Pego en el formulario
    document.getElementById('id_new_usuario').value = id_new_usuario;
    document.getElementById('new_nombres').value = new_nombres;
    document.getElementById('new_apellidos').value = new_apellidos;
    document.getElementById('new_correo').value = new_correo;
    document.getElementById('new_telefono').value = new_telefono;
        
    var nivel=0;
    switch(new_nivel) {
    case 'Administrador del sistema':
        nivel=1;
        break;
    case 'Administrador del condominio':
        nivel=2;
        break;
    default:
        nivel=3;
    }
    document.getElementById('new_nivel').selectedIndex = nivel;
}

//Elimina el registro
function delUsuario(index) {
    console.log(index);
    if(confirm('Seguro desea eliminar')){
        var tabla = document.getElementById('tablaUsuarios');
        var tr = index.parentNode.parentNode.rowIndex;
                //Nodos tabla
        var id = index.parentNode.parentNode.cells[0].textContent;
        var confirmacion = confirm(`Seguro eliminar usuario ${id}`);
        if(confirmacion){
            window.location = "../controllers/usuarios/delUsuario?id="+id;
             tabla.deleteRow(tr);
        }
    }
}