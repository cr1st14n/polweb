// * variables temporales
var idusuario_seleccionado = "";

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
                                <a href="#" class="btn btn-primary btn-icon" onclick="editUsuario(${usu.id})">
                                    <div><i class="fa fa-edit"></i></div>
                                </a>
                                <a href="#" class="btn btn-primary btn-icon" onclick="deleteUsu(${usu.id})">
                                    <div><i class="fa fa-user-times"></i></div>
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
function editUsuario(id) {
    idusuario_seleccionado = id;
    $.ajax({
        type: "get",
        url: "usuario/edit/",
        data: { usu: id },
        // dataType: "dataType",
        success: function (response) {
            $("#form_editUser").trigger("reset");
            $("#usu_ci").val(response.usu_ci);
            $("#usu_nombre").val(response.usu_nombre);
            $("#usu_app").val(response.usu_appaterno);
            $("#usu_email").val(response.email);
            $("#modal_useredit").modal("show");
        },
    });
}
$("#form_editUser").submit(function (e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "usuario/update/" + idusuario_seleccionado,
        data: $("#form_editUser").serialize(),
        //   dataType: "dataType",
        success: function (response) {
            if (response) {
                $("#modal_useredit").modal("hide");
                listUsuariosA();
                console.log("actualizado");
            } else {
                console.log("error");
            }
        },
    });
});
