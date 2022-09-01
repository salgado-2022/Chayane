<?php   
require_once '../model/conexion.php';

$CorreoLogin = $_POST['txtEmail'];
$Contrasena = $_POST['txtPassword'];

$conexion = new PDODB();
$conexion->connect();

$consultaSQL = "SELECT * FROM usuarios WHERE email ='".$CorreoLogin."' and password ='".$Contrasena."'";
 
$resultado = $conexion->login($consultaSQL);

if($resultado != false){
    session_start();
    foreach ($resultado as $key => $value) {
       $_SESSION['id'] = $value['id'];
       $_SESSION['nombre'] = $value['nombre'];
       $_SESSION['email'] = $value['email'];
    }
    header("location: ../view/pages/inicio.php");
}

