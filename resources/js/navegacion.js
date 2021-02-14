$('#btn_userIndex').click(function (e) { 
    e.preventDefault();
    console.log('hola qu tal ');
    $.ajax({
        type: "get",
        url: "usuario/index",
        // data: "data",
        // dataType: "dataType",
        success: function (response) {
            $('#panelContenido').html(response);
        }
    });
});