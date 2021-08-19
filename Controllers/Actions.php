<?php

include_once('db.php');
include_once('includes/Messages.php');

class Actions{

    public $datos;

    function __construct()
    {
        //
    }

    public function saveTask($request){
        //Establecemos conexion a la DB
        $conn = new Conexion;
        $conn->connect();
        
        $lv_request = json_decode(json_encode($request));
        $fecha = date('Y/m/d');
        $query = "INSERT
                  INTO task(titulo, descripcion, created_at) 
                  VALUES ('$lv_request->title', '$lv_request->descripcion', '$fecha')";
        
        $respuesta = mysqli_query($conn->lv_conexion, $query);

        if(!$respuesta){
            setMessage('Error al guardar datos',  'danger');
            return false;
        }

        setMessage('Task guardada correctamente',  'success');

        //Cierre de la conexion de la DB
        $conn->disconnect();
    }

    public function getTask($request){
        $conn = new Conexion;
        $conn->connect();
        $id = $request;
        $query = "SELECT * FROM task WHERE id = $id";
        $resultado = mysqli_query($conn->lv_conexion, $query);
   
        if($resultado->num_rows > 0){
            $row = mysqli_fetch_array($resultado);
            $datos = json_decode(json_encode($row));
            $this->datos = $datos;
            return $this->datos;
        }
        else{   
            setMessage('Registro no encontrado', 'danger');
            Redirect('index.php');
        }
    }

    public function updateTask($request){
        $conn = new Conexion;
        $conn->connect();
        $req = json_decode(json_encode($request));
        $query = "UPDATE task 
                  SET titulo = '$req->title', descripcion = '$req->descripcion'
                  WHERE id = '$req->updateID'";
        mysqli_query($conn->lv_conexion, $query);

        setMessage('Task modificada correctamente', 'success');
        $conn->disconnect();
    }
    
    public function deleteTask($request){
        //Establecemos conexion a la DB
        $conn = new Conexion;
        $conn->connect();

        $lv_request = json_decode(json_encode($request));
        $query = "DELETE
                  FROM task
                  WHERE id = $lv_request->btnHidden";
       
        
        $respuesta = mysqli_query($conn->lv_conexion, $query);

        if(!$respuesta){
            setMessage('Error al eliminar registro',  'danger');
            return false;
        }

        setMessage('Task eliminado correctamente',  'success');

        //Cierre de la conexion de la DB
        $conn->disconnect();
    }
}