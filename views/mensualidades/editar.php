<div class="col-xs-4 col-md-4 text-right pull-right">
    <address>
        <strong>Fecha de Factura:</strong><br>
        
            <input class="form-control" type="date" id="fecha">
            
    </address>
</div>
<div class="container">
    <div class="col-md-8">
        <div class="col-xs-8 col-md-8">                 
                 <address>
                    <strong>Descripción</strong><br>
                        <input type="text" class="form-control" id="descripcionMensualidad" placeholder="Descripción del mes">
                    </address>
        </div>
        <div class="pull-right">
            <button type="button" class="btn btn-primary" data-target=".bs-example-modal-lg" onclick="selectGasto();">Agregar gastos</button>
        </div>
        <?php for($i=0; $i<count($mensualidadEditar); $i++){ $rsEditar = $mensualidadEditar[$i];} ?>
        <table class="table table-bordered" id="tabla">        
            <thead>
                <tr>
                    <th>Gasto</th>
                    <th>Precio unitario</th>
                    <th>Cantidad</th>
                    <th>Monto</th>
                </tr>
            </thead>
            
            <tbody>  
            <div class="col-md-4">
            <tr id="aqui">
                <td></td>
                <td></td>
                <td class="text-right"><strong>Sub Total</strong></td>
                <td><input class="form-control" type="text" id="sub_total" readonly="off" placeholder="0.00"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td class="text-right"><!-- <strong>IVA</strong> --></td>
                <td><!-- <input class="form-control" id="iva" value="0" type="text"> --></td>
            </tr>
            </div>
            <tr>
                <td>
                </td>
                <td></td>
                <td class="text-right"><strong>Total</strong></td>
                <td><input type="text" readonly="off" class="form-control" id="totalGastoOk" placeholder="0.00"></td>
            </tr>
            </tbody>
        </table>
        <button type="button" class="btn btn-success pull-right" onclick="validarFactura();" id="btnCreaMensualidad">Guardar</button>
        <a class="btn btn-primary" href="?mensualidad">Volver</a>
    </div>
</div>