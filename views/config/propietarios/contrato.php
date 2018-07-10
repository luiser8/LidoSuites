<div class="col-xs-4 col-md-4 text-right pull-right">
    <address>
        <strong>Fecha de inicio:</strong><br>
        <input class="form-control" type="date" id="fechaInicio">
        <strong>Fecha fin:</strong><br>
        
            <input class="form-control" type="date" id="fechaFin">
            <input type="hidden" id="id_propietario" value="<?php echo $_GET['id']; ?>"/>
    </address>
</div>
<div class="container">
    <div class="col-md-8">
        <div class="pull-right">
            <button type="button" class="btn btn-primary" data-target=".bs-example-modal-lg" onclick="selectApto();">Agregar apartamento</button>
        </div>
        <table class="table table-bordered" id="tablaContrato">        
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Apartamento</th>
                </tr>
            </thead>
                <tr id="aqui">
                
                </tr>
            <tbody>  
            </tbody>
        </table>
        <button type="button" class="btn btn-success pull-right" onclick="validarContrato();">Guardar</button>
        <a class="btn btn-primary" href="?propietarios">Volver</a>
    </div>
</div>