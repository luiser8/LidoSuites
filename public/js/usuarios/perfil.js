//Perfil

//Llama modal para editar
function editPerfil(index) {
    //Modal edit
    $('#editPerfil').modal('toggle');

    //Nodos tabla
    var id_usuario = index.parentNode.parentNode.cells[0].textContent;
    var new_nombre = index.parentNode.parentNode.cells[1].textContent;
    var new_apellido = index.parentNode.parentNode.cells[2].textContent;
    var new_email = index.parentNode.parentNode.cells[3].textContent;
    var new_telefono = index.parentNode.parentNode.cells[4].textContent;

    //Pego en el formulario
    document.getElementById('id_usuario').value = id_usuario;
    document.getElementById('new_nombre').value = new_nombre;
    document.getElementById('new_apellido').value = new_apellido;
    document.getElementById('new_email').value = new_email;
    document.getElementById('new_telefono').value = new_telefono;
}