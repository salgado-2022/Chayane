function cargar_Registro(urlMenu){


    document.getElementById('ingreso').removeAttribute('class')
    document.getElementById('ingreso').setAttribute('class','nav-link')
    document.getElementById('registro').setAttribute('class','nav-link active')

    $.ajax({
        type: "POST",
        url:urlMenu,
        data:{},
        success: function(datos){
            $('#qCarga').html(datos);
        }
    });
}

function cargar_Ingreso(urlMenu){
    document.getElementById('registro').removeAttribute('class')
    document.getElementById('registro').setAttribute('class','nav-link')
    document.getElementById('ingreso').setAttribute('class','nav-link active')

    $.ajax({
        type: "POST",
        url:urlMenu,
        data:{},
        success: function(datos){
            $('#qCarga').html(datos);
        }
    });
}

function guardar(){
    $.ajax({
        type:"POST",
        url: "../Controller/control.php",
        data: {
            'nombre': $('#nombre').val(),
            'email': $('#email').val(),
            'pass': $('#password').val(),
            'metodo': "guardar"
        },
        success: function(data){
            alert(data);
            $('#nombre').val('');
            $('#email').val('');
            $('#password').val('');
        }
    });
}


function GuardarAncheta(){
    $.ajax({
        type:"POST",
        url: "../../Controller/control.php",
        data: {
            'ancheta': $('#NombreAncheta').val(),
            'descripcion': $('#Descrip').val(),
            'precio': $('#Precio').val(),
            'metodo': "GuardarAncheta"
        },
        success: function(data){
            alert(data);
            $('#NombreAncheta').val('');
            $('#Descrip').val('');
            $('#Precio').val('');
        }
    });
}

function ListarProductos(){
    $.ajax({
        type: "POST",
        url: "../../Controller/control.php",
        data: {
            'metodo': "listar"
        },
        datatype:"html",
        success: function(data){
            $('tbody').text("");
            $('tbody').html(data);
        }
    });
}

function cargarModal(id){
    $.ajax({
        data: {
            "idAncheta" : id,
            'metodo' : "cargarModal"
        },
        url: "../../Controller/control.php",
        type:"POST",
        success: function(data){
            $('#cuerpoModificar').text("");
            $('#cuerpoModificar').append(data);
            $("#modalMC").modal("show");
        }
    });
}


function ModificarAnchetas(){
    $.ajax({
        data: {
            "id" : $('#idAnchetaM').val(),
            "nombreAncheta" : $('#nombreA').val(),
            "Descrip" : $('#descripcion').val(),
            'PrecioM' : $('#PrecioM').val(),
            'metodo' : "modificar"
        },
        url: "../../Controller/control.php",
        type:"POST",
        success: function(data){
            alert(data);
            ListarProductos();
            $("#modalMC").modal("hide");
        }
    });
    
}

function EliminarAncheta(id){
    $.ajax({
        type:"POST",
        url: "../../Controller/control.php",
        data: {
            'idancheta': id,
            'metodo': "Eliminar"
        },
        success: function(data){
            alert(data);
            ListarProductos();
        }
    });
}