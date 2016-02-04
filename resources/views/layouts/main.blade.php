
<!doctype html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hola</title>

</head>
<body>

<header>

    @if(Auth::user())
        <nav class="top-bar" data-topbar role="navigation">
            <ul class="title-area">
                <li class="name">
                    <h1><a href="#">Todo Url</a></h1>
                </li>
                <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
            </ul>

            <section class="top-bar-section">
                <!-- Right Nav Section -->
                <ul class="right">
                    <li><a href="{{route('admin.users.index')}}">Usuarios</a></li>
                    <li><a href="{{route('admin.sites.index')}}">Sitios</a></li>
                    <li><a href="{{route('admin.categories.index')}}">Categorias</a></li>
                    <li class="has-dropdown">

                        <a href="#">{{Auth::user()->name}}</a>
                            <ul class="dropdown">
                                <li><a href="{{route('logout')}}">Salir</a></li>
                            </ul>

                    </li>
                    <li><a href="{{route('logout')}}">Salir</a></li>

                </ul>
            </section>
        </nav>
    @endif
</header>

@if(Session::get('message'))
    <div class="row">
        <div class="columns">
            <div class="alert-box success">
                {{Session::get('message')}}
                <a href="#" class="close">&times;</a>
            </div>
        </div>

    </div>
@endif


@yield('content')

<div class="row">
    <div class="columns">
        @if($errors->has())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>

</div>


<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/modernizr.js')}}"></script>
<script src="{{asset('js/foundation.js')}}"></script>
<script src="{{asset('js/foundation.topbar.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>

<script>
    $(document).foundation();
</script>

</body>
</html>