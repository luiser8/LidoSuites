lidosuites.controller('usuariosctrl', ['$http', '$scope', '$location','$routeParams', function($http, $scope, $location, $routeParams){
	 getUsuarios();

	$scope.message = 'Opciones usuarios';

	$scope.opciones = [
	{
		id:1,
		name:'Ir a ver'
	},
	{
		id:2,
		name:'Ir a ver de nuevo'
	}];

  function getUsuarios(){
        $http({
          method: 'GET',
        url:'controllers/usuarios/usuario.php',
          //url: 'api/Producto/allProductos.php',       
        }).then( function(response) {
            $scope.usuarios = response.data;
            console.log(response.data);
        });
  }

  $scope.setUsuarios = function(){
     $http({
            method: "POST",
            url: 'controllers/usuarios/add.php',  
            data: {
              'nombres' : $scope.nombres,
              'apellidos' : $scope.apellidos,              
              'correo' : $scope.correo,         
              'contrasena' : $scope.contrasena,         
              'telefono' : $scope.telefono,         
              'nivel' : $scope.nivel,        
              'AddUsuario' : 'AddUsuario'        
            },
        }).then(function(data) {
              console.log('Ok');
             
              $('#nuevoUsuario').modal('toggle');
               getUsuarios();
        }, function(data) { 
              console.log('No');
              getUsuarios();
        });
        getUsuarios();
  }

 $scope.delUsuario = function(usuario){
        if(confirm('Esta seguro que desea eliminar?')){
          $http({
          method: 'POST',
          url:'controllers/usuarios/delete.php',
          data: {
            'id_usuario' : usuario,
            'delete' : 'delete',
          },     
        }).then( function(response) {
            console.log(response.data);
            getUsuarios();
        });
      }
  }
}]);