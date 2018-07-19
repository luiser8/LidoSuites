'use strict';

//SESSIONS
function login(/*user, pass*/) {
    var usuario = document.getElementById('usuario').value;
    var password = document.getElementById('password').value;

    var Form = new FormData();
    Form.append('usuario', usuario);
    Form.append('password', password);
    Form.append('session', 'session');

    var url = 'controllers/usuarios/usuario.php';

    if(window.XMLHttpRequest){
        var solicitud = new XMLHttpRequest();
    }else{
        solicitud = new ActiveXObject("Microsoft.XMLHTTP");
    }

    solicitud.onreadystatechange = function () {
        if(solicitud.readyState == 4 && solicitud.status == 200){
            document.getElementById('loginForm').reset();
        }
    }
    solicitud.open('POST', url, true);
    solicitud.send(Form);
    window.location.reload(true);
}

function logout() {
    var Form = new FormData();
    //Form.append('user', user);
    Form.append('logout', 'logout');

    var url = 'controllers/usuarios/usuario.php';

    if(window.XMLHttpRequest){
        var solicitud = new XMLHttpRequest();
    }else{
        solicitud = new ActiveXObject("Microsoft.XMLHTTP");
    }

    solicitud.onreadystatechange = function () {
        if(solicitud.readyState == 4 && solicitud.status == 200){
            //document.getElementById('loginForm').reset();
            window.location.reload(true);
        }
    }
    solicitud.open('POST', url, true);
    solicitud.send(Form);
}