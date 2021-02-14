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
        <a href="#" class="btn btn-primary btn-icon">
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
                <tbody>
                    @foreach($users as $usu)
                    <tr>
                        <th scope="row">{{$usu->id}}</th>
                        <td>{{$usu->usu_ci}}</td>
                        <td>{{$usu->usu_nombre}} {{$usu->usu_appaterno}} {{$usu->usu_apmaterno}}</td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div><!-- bd -->
    </div><!-- br-section-wrapper -->
</div><!-- br-pagebody -->