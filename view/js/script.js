function cargar(urlMenu){
   
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
        url: "",
        data: {
            'Nombre': $('#nombre').val(),
            'Apellido': $('#apellido').val(),
            'Email': $('#email').val(),
            'metodo': "guardar"
        },
        success: function(data){
            alert(data);
            $('#nombre').val('');
            $('#apellido').val('');
            $('#email').val('');
        }
    });
}