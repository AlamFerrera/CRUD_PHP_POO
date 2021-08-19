<?php
 include_once('../db.php');
 include_once('includes/Messages.php');
 include_once('../Routes.php');
 include_once('Controllers/Actions.php');
 session_start();

 $action = new Actions;
 $action->getTask($_SESSION['id']);
 $datos = json_decode(json_encode($action->datos));
 session_unset();

  /*if( isset($_GET['id']) ){
    $id = $_GET['id'];
   $conn = new Conexion;
    $conn->connect();
    $query = "SELECT * FROM task WHERE id = $id";
    $resultado = mysqli_query($conn->lv_conexion, $query);

   
    if($resultado->num_rows > 0){
        $row = mysqli_fetch_array($resultado);
        $datos = json_decode(json_encode($row));
    }
    else{   
        setMessage('Registro no encontrado', 'danger');
        Redirect('index.php');
    }
}*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <?php include('../includes/navbar.php')?>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body ">
                    <form action="../Routes.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="Task Title" 
                                    value="<?= $datos->titulo ?>" required>
                        </div>

                        <div class="form-group">
                            <textarea name="descripcion" rows="2" placeholder="task description" class="form-control" style="resize: none;" required><?=$datos->descripcion?></textarea>
                        </div>

                        <button type="submit" class="btn btn-success btn-block" name="updateID" value="<?= $datos->id ?>">
                            Modificar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>