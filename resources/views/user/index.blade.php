<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="index.html">Usuarios</a>
        <span class="breadcrumb-item active">Inicio</span>
    </nav>
</div><!-- br-pageheader -->
<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
    <h4 class="tx-gray-800 mg-b-5">Gestion de usuarios</h4>
    <p class="mg-b-0">Modulo para gestion de informacion de usuarios.</p>
</div>

<div class="br-pagebody">
    <div class="br-section-wrapper">
        <a href="#" class="btn btn-primary btn-icon" onclick="showModalMakeUser()">
            <div><i class="fa fa-user-plus"></i></div>
        </a>
        <div class="bd bd-gray-300 rounded table-responsive">
            <table class="table table-hover mg-b-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th># CI</th>
                        <th>Nombre</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="listUsuarios">
                    @foreach($users as $usu)
                    <tr>
                        <th scope="row">{{$usu->id}}</th>
                        <td>{{$usu->usu_ci}}</td>
                        <td>{{$usu->usu_nombre}} {{$usu->usu_appaterno}} {{$usu->usu_apmaterno}}</td>
                        <td>
                            <a href="#" class="btn btn-primary btn-icon" onclick="editUsuario({{$usu->id}})">
                                <div><i class="fa fa-edit"></i></div>
                            </a>
                            <a href="#" class="btn btn-primary btn-icon" onclick="deleteUsu({{$usu->id}})">
                                <div><i class="fa fa-user-times"></i></div>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div><!-- bd -->
    </div><!-- br-section-wrapper -->
</div><!-- br-pagebody -->
<div id="modal_userNew" class="modal fade">
    <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="modal-content bd-0 tx-14">
            <div class="modal-header pd-y-20 pd-x-25">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Message Preview</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pd-0">
                <div class="form-layout form-layout-4">
                    <form id="form_createUser" onsubmit="">
                        @csrf
                        <div class="row">
                            <label class="col-sm-4 form-control-label"># de carntet de identidad: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="number" class="form-control" placeholder="CI..." name="ci" required>
                            </div>
                        </div><!-- row -->
                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label">Nombre: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control" placeholder="Nombre..." name="nombre" required>
                            </div>
                        </div>
                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label">Apellido: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control" placeholder="Apellido..." name="apellido" required>
                            </div>
                        </div>
                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label">Correo electronico: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <textarea rows="2" class="form-control" placeholder="Correo..." name="mail"></textarea>
                            </div>
                        </div>
                        <div class="form-layout-footer mg-t-30">
                            <button type="submit" class="btn btn-info">Registrar usuario</button>
                            <button class="btn btn-secondary">Cancelar</button>
                        </div><!-- form-layout-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->
<div id="modal_useredit" class="modal fade">
    <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="modal-content bd-0 tx-14">
            <div class="modal-header pd-y-20 pd-x-25">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Message Preview</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pd-0">
                <div class="form-layout form-layout-4">
                    <form id="form_editUser" onsubmit="">
                        @csrf
                        <div class="row">
                            <label class="col-sm-4 form-control-label"># de carntet de identidad: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="number" class="form-control" placeholder="CI..." name="ci" id="usu_ci" required>
                            </div>
                        </div><!-- row -->
                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label">Nombre: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control" placeholder="Nombre..." name="nombre" id="usu_nombre" required>
                            </div>
                        </div>
                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label">Apellido: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control" placeholder="Apellido..." name="apellido" id="usu_app" required>
                            </div>
                        </div>
                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label">Correo electronico: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control" placeholder="Apellido..." name="mail" id="usu_email" required>
                            </div>
                        </div>
                        <div class="form-layout-footer mg-t-30">
                            <button type="submit" class="btn btn-danger">Actualizar datos</button>
                            <button class="btn btn-secondary">Cancelar</button>
                        </div><!-- form-layout-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->


<script src="{{ asset('resources/js/usuario.js')}}"></script>