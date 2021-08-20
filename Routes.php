<?php

include_once("Controllers/Actions.php");
session_start();

if( isset($_GET['id']) ){
    $action = new Actions;
    $id = $_GET['id'];
    $action->getTask($id);
}

if( isset($_POST['btnCrear']) ){
    $action = new Actions;
    $action->saveTask($_POST);
    Redirect('index.php');
}

if( isset($_POST['btnEliminar']) ){
    $action = new Actions;
    $action->deleteTask($_POST);
    Redirect('index.php');
}

if( isset($_POST['updateID']) )
{
    $action = new Actions;
    $action->updateTask($_POST);
    Redirect('index.php');
}


function Redirect($url){
    header('Location:' . $url);
}


?>