<?php 
                $gasto = new Gasto();
                $gastos = $gasto->getGastos();
 ?>
<div class="modal fade bs-example-modal-lg" id="selectGasto">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" title="Cerrar">&times;</button>
                <h4 class="modal-title">Seleccionar gasto</h4>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <th>Id</th>
                        <th>Descripción</th>
                        <th>Monto</th>
                        <th>Cantidad</th>
                        <th>Opciones</th>
                    </tr>
                    <?php for($i=0; $i<count($gastos); $i++){ $rs = $gastos[$i]; ?>
                    <tr>
                        <td><?php echo $rs['id_gasto']; ?></td>
                        <td><?php echo $rs['descripcion']; ?></td>
                        <td><?php echo $rs['monto']; ?></td>
                        <td><input type="number" class="form-control" min="1" max="100" name="cantidad" id="cantidad" placeholder="Cantidad"></td>
                        <td>
                            <button type="button" class="btn btn-default glyphicon glyphicon-check" onclick="addGasto(this);"></button>
                            <button class=" btn btn-default glyphicon glyphicon-trash" onclick="quitar(this, <?php echo $rs['id_gasto']; ?>);"></button>
                        </td>
                    </tr>
                    <?php } ?>

                </table>
                
            </div>
            <div class="modal-footer">
                <div class="form-group">
                    <button type="button" class="btn btn-default" data-dismiss="modal" title="Aceptar">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
</div>