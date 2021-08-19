<?php
include('includes/Messages.php');

if(isset($_SESSION['message'])){
  displayMessage();
}

?>
<div class="card" style="width: 100%;">
  <div class="card-body">
    <h5 class="card-title">Agregar nuevo Task</h5>
    
    <form action="Routes.php" method="POST">
        <div class="form-group">
            <input type="text" name="title" placeholder="Titulo" class="form-control" required>
            <textarea name="descripcion" rows="3" class="form-control mt-3" style="resize: none;" required></textarea>
        </div>
        <button class="btn btn-success btn-block" name="btnCrear" type="submit" value="1" >Agregar</button>
    </form>
  </div>
</div>