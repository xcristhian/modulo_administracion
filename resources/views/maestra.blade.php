
<!DOCTYPE html>
<html>

<head>
    @include('partials.error')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("titulo")</title>
    <link rel="stylesheet" href="{{url("/css/estilos.css")}}">
    <link rel="stylesheet" href="{{url("/css/all.min.css")}}">
    <link rel="stylesheet" href="{{url("/css/bulma.min.css")}}"/>
    <script type="text/javascript">
        const URL_BASE = "{{url("/")}}",
            URL_BASE_API = "{{url("/api")}}",
            TOKEN_CSRF = "{{csrf_token()}}";
    </script>
    <script src="{{url("/js/principal.js?q=") . time()}}"></script>
    <script src="{{url("/js/wireframe.js?q=") . time()}}"></script>
    <script src="{{url("/js/utiles.js")}}"></script>
    <script src="{{url("/js/vue.js")}}"></script>
</head>

<body>
@if(Auth::check())
    <nav class="navbar is-transparent has-shadow is-spaced">
        <div class="navbar-brand">
            <a class="navbar-item" href="#">
                <img class="logo" style="max-height: 100%;" src="{{url("/img/logo_principal.png") }}"
                     alt="Aquí el logotipo de la empresa"
                     width="150" height="20">
            </a>
            <div id="intercambiarMenu" class="navbar-burger burger" data-target="menuPrincipal">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div id="menuPrincipal" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="{{ route("categoria") }}">
                    <span class="icon has-text-danger">
                        <i class="fa fa-home"></i>
                    </span>&nbsp;Categorías
                </a>
                <a class="navbar-item" href="{{ route("empleados") }}">
                    <span class="icon has-text-success">
                        <i class="fa fa-users"></i>
                    </span>&nbsp;Empleados
                </a>
                <a class="navbar-item" href="{{route('producto_1')}}">
                    <span class="icon has-text-info">
                        <i class="fa fa-box"></i>
                    </span>&nbsp;Inventario
                </a>
                <a class="navbar-item" href="{{ route("vista_mostrar_cliente") }}">
                    <span class="icon has-text-info">
                        <i class="fa fa-user"></i>
                       
                    </span>&nbsp;Cliente
                </a>
                <a class="navbar-item" href="{{ route("vista_mostrar_proveedor") }}">
                    <span class="icon has-text-info">
                        <i class="fa fa-building"></i>
                       
                    </span>&nbsp;Proveedor
                </a>
                <a class="navbar-item" href="{{ route("vista_mostrar_venta") }}">
                    <span class="icon has-text-info">
                        <i class="fa fa-credit-card"></i>
                       
                    </span>&nbsp;Ventas
                </a>
                <a class="navbar-item" href="{{ route("vista_mostrar_compra") }}">
                    <span class="icon has-text-info">
                        <i class="fa fa-shopping-cart"></i>
                    </span>&nbsp;Compras
                </a>
                <a class="navbar-item" href="{{ route("guias") }}">
                    <span class="icon has-text-info">
                        <i class="fa fa-book fa-fw"></i>
                    </span>&nbsp;Guías de remisión
                </a>
                <a class="navbar-item" href="{{ route("mantenimiento") }}">
                    <span class="icon has-text-info">
                        <i class="fa fa-cog fa-spin"></i>
                    </span>&nbsp;Mantenimientos
                </a>
                <a class="navbar-item" href="{{ route("serie") }}">
                    <span class="icon has-text-info">
                        <i class="fa fa-cog fa-spin"></i>
                    </span>&nbsp;Bodega
                </a>
                
            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="field is-grouped">
                        <a class="button"
                           href="{{route("logout")}}">
                            <strong>Salir</strong>&nbsp;({{Auth::user()->nombre}})
                            <span class="icon has-text-danger">
                                <i class="fa fa-sign-out-alt"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
@endif
<section class="section" style="padding-top: 0.3rem;">
    @yield("contenido")
</section>
</body>

</html>
