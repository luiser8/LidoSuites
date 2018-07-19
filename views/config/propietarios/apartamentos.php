<?php 
    $apto = new Apartamento();
    $aptos = $apto->getApartamentosAsignado();
 ?>
<div class="modal fade bs-example-modal-lg" id="selectApto">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" title="Cerrar">&times;</button>
                <h4 class="modal-title">Seleccionar apartamento</h4>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <th>Id</th>
                        <th>Apartamento</th>
                        <th>Opciones</th>
                    </tr>
                    <?php for($i=0; $i<count($aptos); $i++){ $rs = $aptos[$i]; ?>
                    <tr>
                        <td><?php echo $rs['id_apartamento']; ?></td>
                        <td><?php echo $rs['nombre']; ?></td>
                    
                        <td>
                            <button type="button" class="btn btn-default glyphicon glyphicon-check" onclick="addApto(this);"></button>
                            <button class=" btn btn-default glyphicon glyphicon-trash" onclick="quitar(this, <?php echo $rs['id_apartamento']; ?>);"></button>
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