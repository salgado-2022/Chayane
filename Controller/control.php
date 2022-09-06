<?php

require_once '../model/conexion.php';

$metodo = $_POST['metodo'];

switch ($metodo) {
    case 'guardar':
        guardar();
        break;
    case 'GuardarAncheta':
        GuardarAncheta();
        break;
    case 'listar':
        ListarProductos();
        break;
}


// Funcion para guardar un usuario en el sistema
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
        (id, nombre, email, pass)
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

// Fin funcion guardar usuario



// Funcion para guardar una ancheta en el sistema

function GuardarAncheta(){
    $ancheta = $_POST['ancheta'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    if($ancheta == "" || $descripcion == "" || $precio == ""){
        echo "Llena todos los campos del formulario";
    }else{
        $conexion = new PDODB();

        $conexion->connect();

        $InstruccionSQL = "INSERT INTO anchetas  
        (id, nombreA, descripcion, precio)
        VALUES
        (null,'".$ancheta."', '".$descripcion."','".$precio."')";

        $resultado = $conexion->executeInstruction($InstruccionSQL);

    if($resultado == true){
        echo "Producto Guardado Correctamente";
    }else{
        echo "No fué posible guardar eel Producto";
    }
    }
}
// FIn funcion guardar anchetas

// Funcion Listar anchetas

function ListarProductos(){
    
    $conexion = new PDODB();

    $conexion->connect();

    $consultaSQL = 'SELECT * FROM anchetas ORDER BY id DESC';

    $lista = $conexion->getData($consultaSQL);

    $tablaP = "";

    foreach ($lista as $key => $value) {
        $tablaP .= '<tr>
                    <th scope="row">'.$value['id'].'</th>
                    <td>'.$value['nombreA'].'</td>
                    <td>'.$value['descripcion'].'</td>
                    <td>'.number_format($value['precio']).'</td>
                    <td><input type="button" value="Eliminar" class="btn btn-danger" onclick="eliminarProducto('.$value['id'].')"></td>
                </tr>';  
    }
    echo $tablaP;
}