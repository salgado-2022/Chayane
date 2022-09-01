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