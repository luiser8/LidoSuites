//Filtro factura
$("#searchFactura").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tablaPagos tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
//Filtro notificacion
$("#searchNotificacion").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tablaNotificacion tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
//Filtro novedades
$("#searchNovedad").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tablaNovedad tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
//Filtro Doc
$("#searchDoc").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tablaDoc tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
  //Filtro Mensualidad
$("#searchMensualidad").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tablaMensualidad tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
  //Filtro Propietario
$("#searchPropietario").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tablaPropietario tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  }); 
   //Filtro Proveedor
$("#searchProveedor").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tablaProveedor tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
   //Filtro Usuarios
$("#searchUsuario").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tablaUsuario tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  }); 
    //Filtro Auditorias
$("#searchAuditoria").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tablaAuditoria tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
    //Filtro Alicuotas
$("#searchAlicuota").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tablaAlicuota tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  }); 
     //Filtro Apartamentos
$("#searchApartamento").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tablaApartamento tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });   
    //Filtro Bancos
$("#searchBanco").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tablaBanco tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });    
  //Filtro formas de pagos
$("#searchFormasPagos").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tablaFormasPagos tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
  //Filtro Unidad Tributaria
$("#searchUt").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tablaUt tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  }); 
   //Filtro Estado de cuenta
$("#searchCuenta").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tablaCuenta tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });