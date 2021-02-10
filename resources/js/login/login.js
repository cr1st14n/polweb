$('#formLogin').submit(function (e) { 
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "login",
        data: $('#formLogin').serialize(),
        // dataType: "dataType",
        success: function (res) {
            if (res) {
                window.location.href='inicio';
            } else {
                
            }
        }
    });
});