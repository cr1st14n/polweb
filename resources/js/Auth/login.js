$('#formLogin').submit(function (e) { 
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "login",
        data: $('#formLogin').serialize(),
        // dataType: "dataType",
        success: function (res) {
            if (res) {
                console.log(res);
                window.location.href='inicio';
            } else {
                
            }
        }
    });
});
$('#btn-exitsis').click(function (e) { 
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "logout",
        data: {_token:$('meta[name=csrf-token]').attr('content')},
        // dataType: "dataType",
        success: function (resp) {
            window.location.href='';
        }
    });
});

