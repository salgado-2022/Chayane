<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hola</title>

    <!-- jQuery library -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/boostrap.js"></script>

    <!-- Script para acciones personalizadas -->
    <script src="../js/script.js"></script>  

   

    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

	<!-- Popper JS -->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


</head>
<body>
    
  <div class="container-fluid">
		<h3 class="text-center py-3">LOGO</h3>
	</div>

<!--Contenido-->

   <div class="container-fluid">
    <div class="container">
        <ul class="nav nav-justified py-2 nav-pills">
            <li class="nav-item">
                <a id="registro" class="nav-link" href="#" onclick="cargar_Registro('./pages/registro.php')" >Registrar Producto</a>
                <li class="nav-item">
                <a id="ingreso" class="nav-link " href="#" onclick="cargar_Ingreso('./pages/ingreso.php')" >Lista de productos</a>  
                <li class="nav-item">
                <a href="#" class="nav-link" data-toggle="modal" data-target="#cerrarSesion">cerrarSesion</a>
            </li>
   
        </ul>
    </div>
</div>
<div class="container-fluid">
    <div class="container py-5">


        </div> 
    </div>




    <div class="d-flex justify-content-center text-center" id="qCarga">
        
    

    </div> 

<!-- Modal Cerrar sesión -->
<div class="modal fade" id="cerrarSesion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmación Cierre de Sesión</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Esta seguro que desea cerrar la sesión?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      <form action="../../controlador/close.php" method="post"><input type="submit" class="btn btn-primary" value="Cerrar sesión" ></form>
        
      </div>
    </div>
  </div>
</div>
    
</body>
</html>