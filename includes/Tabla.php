<?php
    include_once('db.php');

    $conn = new Conexion;
    $conn->connect();
    $query = "SELECT * FROM task";
    $datos = mysqli_query($conn->lv_conexion, $query);
?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th class="text-center" scope="col">Titulo</th>
            <th class="text-center" scope="col">Descripción</th>
            <th class="text-center" scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php 
     foreach($datos as $lista){ 
        $obj = json_decode(json_encode($lista)); 
        ?>
        <tr>
            <td><?= $obj->titulo ?></td>
            <td><?= $obj->descripcion ?></td>
            <td class="text-center">
                
                <!-- 
                <a href="Views/editar.php?id=<?= $obj->id ?>" name="editID" class="btn btn-secondary">
                    <i class="fas fa-marker"></i>
                </a>
                -->
                <a href="Routes.php?id=<?= $obj->id ?>" name="editID" class="btn btn-secondary">
                    <i class="fas fa-marker"></i>
                </a>
                <button type="button" class="btn btn-danger trash" data-toggle="modal" data-id="<?= $obj->id?>"
                    data-target="#exampleModal">
                    <i class="far fa-trash-alt"></i>
                </button>
            </td>
        </tr>
        <?php
    }
    $conn->disconnect();
    ?>
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="lead text-center">¿Está seguro que desea eliminar este elemento?</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                <form action="Routes.php" method="POST" style="display: inline;">
                    <input type="hidden" name="btnHidden" id="btnHidden" value="">
                    <button type="submit" name="btnEliminar" value="1" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>

    $('.trash').click(function(){
    var id= $(this).data('id');
    $('#btnHidden').val(id);
})
</script>