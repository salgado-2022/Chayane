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
    case 'cargarModal':
        CargarModal();
        break;
    case 'modificar':
        Modificar();
        break;
    case 'Eliminar':
        Eliminar();
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
                    <td><input type="button" value="Modificar" class="btn btn-warning" onclick="cargarModal('.$value['id'].');" ></td>
                    <td><input type="button" value="Eliminar" class="btn btn-danger" onclick="EliminarAncheta('.$value['id'].')"></td>
                </tr>';  
    }
    echo $tablaP;
}
function CargarModal(){
    
    $conexion = new PDODB();

    $conexion->connect();

    $ID_Ancheta= $_POST['idAncheta'];

    $consultaSQL = "SELECT * FROM anchetas WHERE id = ".$ID_Ancheta;

    $ConsultaModal = $conexion->getData($consultaSQL);

    $TablaModal = "";
    foreach ($ConsultaModal as $key => $value) {
            $TablaModal .= '<div class="col">
            <div class="form-group row">
            <div class="col">
                <label for="nombres">Nombre Ancheta</label>
                <input type="hidden" name="idAnchetaM" id="idAnchetaM" value="'.$value['id'].'">
                <input type="text" name="nombreA" class="form-control" value="'.$value['nombreA'].'" id="nombreA" required>
            </div>
            <div class="col">
                <label for="descripcion">Descripcion</label>
                <textarea id="descripcion" name="descripcion" rows="4" cols="50">
                '.$value['descripcion'].'
                </textarea>
            </div>
            </div>
            <div class="form-group row">
            <div class="col">
                <label for="precio">Precio</label>
                <input type="number" name="PrecioM" class="form-control" value="'.$value['precio'].'" id="PrecioM" required>
            </div>
            </div>
        </div>';  
    }
    echo $TablaModal;
}

function Modificar(){

    $ID_Ancheta = $_POST['id'];
    $NombreA = $_POST['nombreAncheta'];
    $descripcion = $_POST['Descrip'];
    $precio = $_POST['PrecioM'];
    
    if($NombreA == "" || $descripcion == "" || $precio == "" ){
        echo "Llena todos los campos del formulario";
    }else{

    $conexion = new PDODB();

    $conexion->connect();
    
    $consultaSQL = "UPDATE anchetas SET nombreA = '".$NombreA."', descripcion = '".$descripcion."', precio = '".$precio."' WHERE anchetas.id = ".$ID_Ancheta.";";

    $modificado = $conexion->executeInstruction($consultaSQL);
    
    if($modificado){
        echo "Modificado Correctamente";

    }else{
        echo "No fué posible modificar";
    }
    }
}


function Eliminar(){
    $id_Ancheta = $_POST['idancheta'];
    $conexion = new PDODB();

        $conexion->connect();

        $InstruccionSQL = "DELETE FROM `anchetas` WHERE `anchetas`.`id` = ".$id_Ancheta."";

        $resultado = $conexion->executeInstruction($InstruccionSQL);

    if($resultado == true){
        echo "Ancheta Eliminada Correctamente";
    }else{
        echo "No fué posible eliminar la ancheta";
    }
}



