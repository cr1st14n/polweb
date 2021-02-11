$('#formLogin').submit(function (e) { 
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "login",
        data: $('#formLogin').serialize(),
        data: {nombre:'tomas',app:},
        // dataType: "dataType",
        success: function (res) {
            if (res) {
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

function (param) {
    $.ajax({
        type: "get",
        url: "primera",
        data: {nombre:'martin'},
        // dataType: "dataType",
        success: function (resp) {
            var html= resp.map(function (data) {
                return  e=`
                <tr>
                    <td>valor = ${data.usu_ci}<td>
                <tr>
                `;
              }).join(' ');
              $('#lista').html(html);
        }
    });
  }
  $('#pagina_2').click(function (e) { 
      e.preventDefault();
      $.ajax({
          type: "method",
          url: "url",
          data: "data",
          dataType: "dataType",
          success: function (response) {
              if (response) {
                  console.log(' se registro');
                  listar(); 
              } else {
                  
              }
          }
      });
  });