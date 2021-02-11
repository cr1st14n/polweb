<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bracket">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/bracket/img/bracket-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/bracket">
    <meta property="og:title" content="Bracket">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Bracket Responsive Bootstrap 4 Admin Template</title>

    <!-- vendor css -->
    <link href="{{ asset('resources/diseño/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{ asset('resources/diseño/lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">
    <!-- <link type="text/css" rel="stylesheet" href="{{ asset('Plantilla/assets/css/style.css')}}" /> -->



    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{ asset('resources/diseño/css/bracket.css')}}">
</head>

<body>

    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
            <form id="formLogin">
                @csrf
                <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> Sistema POlicial de salud <span class="tx-normal">]</span></div>
                <div class="tx-center mg-b-60">Sistema en desarrollo</div>

                <div class="form-group">
                    <input type="text" class="form-control" name="usu_ci" placeholder="Ingresa tu usuario" require>
                </div><!-- form-group -->
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Ingresa tu contraseña" require>
                    <a href="" class="tx-info tx-12 d-block mg-t-10">Recuperar Contraseña?</a>
                </div><!-- form-group -->
                <button type="submit" class="btn btn-info btn-block">Ingresar</button>
            </form>

            <!-- <div class="mg-t-60 tx-center">Not yet a member? <a href="" class="tx-info">Sign Up</a></div> -->
        </div><!-- login-wrapper -->
    </div><!-- d-flex -->

    <script src="{{ asset('resources/diseño/lib/jquery/jquery.js')}}"></script>
    <script src="{{ asset('resources/diseño/lib/popper.js/popper.js')}}"></script>
    <script src="{{ asset('resources/diseño/lib/bootstrap/bootstrap.js')}}"></script>
    <script src="{{ asset('resources/js/Auth/login.js')}}"></script>

</body>

</html>