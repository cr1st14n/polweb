
function showModalMakeUser() {
    $("#modal_userNew").modal("show");
    console.log("show modal");
}

$("#form_createUser").submit(function (e) {
    e.preventDefault();
    console.log();
    $.ajax({
        type: "post",
        url: "usuario/store",
        data: $("#form_createUser").serialize(),
        // dataType: "dataType",
        success: function (response) {
            if (response) {
                console.log("usu creado");
                $("#modal_userNew").modal("hide");
                $("#form_createUser").trigger("reset");
                listUsuariosA();
            } else {
                console.log("error");
            }
        },
    });
});

function listUsuariosA() {
    $.ajax({
        type: "get",
        url: "usuario/listA",
        // data: "data",
        // dataType: "dataType",
        success: function (response) {
            html = response
                .map(function (usu) {
                    return (a = `
                        <tr>
                            <th scope="row">${usu.id}</th>
                            <td>${usu.usu_ci}</td>
                            <td>${usu.usu_nombre} ${usu.usu_appaterno}</td>
                            <td>
                                <a href="#" class="btn btn-primary btn-icon" onclick="deleteUsu(${usu.id})">
                                    <div><i class="fa fa-send"></i></div>
                                </a>
                            </td>
                        </tr>
                `);
                })
                .join(" ");
            $("#listUsuarios").html(html);
        },
    });
}
function deleteUsu(id) {
    $.ajax({
        type: "get",
        url: "usuario/delete",
        data: {
            _token: $("meta[name=csrf-token]").attr("content"),
            id_usu: id,
        },
        // dataType: "dataType",
        success: function (response) {
            if (response) {
                console.log("eliminaod");
                listUsuariosA();
            } else {
                console.log("error");
            }
        },
    });
}
