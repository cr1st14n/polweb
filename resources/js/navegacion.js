$('#btn_userIndex').click(function (e) { 
    e.preventDefault();
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