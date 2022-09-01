<?php

require_once '../model/conexion.php';

$metodo = $_POST['metodo'];

switch ($metodo) {
    case 'guardar':
        guardar();
        break;
}


function guardar(){
    $nomCliente = $_POST['nombre'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    if($nomCliente == "" || $email == "" || $pass == ""){
        echo "Llena todos los campos del formulario";
    }else{
        $conexion = new PDODB();

        $conexion->connect();

        $InstruccionSQL = "INSERT INTO usuarios  
        (id, nombre, email, password)
        VALUES
        (null,'".$nomCliente."', '".$email."','".$pass."')";

        $resultado = $conexion->executeInstruction($InstruccionSQL);

    if($resultado == true){
        echo "Cliente Guardado Correctamente";
    }else{
        echo "No fué posible guardar el Cliente";
    }
    }
}