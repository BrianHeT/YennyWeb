<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta http-equiv="X-UA-Compatible" content="ie=edge">

<title> {{ $title ?? '' }} :: Libreria Yenny</title>


<link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">

<link rel="stylesheet" href="{{ url('css/style.css') }}">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">



</head>

<body>
    <div id=”app”>
        <nav class="navbar navbar-expand-lg navbar-blur" id="navegador">
    <div class="container-fluid position-relative">
        <a class="navbar-brand nav fw-bold fs-3 d-none d-lg-block" href="#">Yenny</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar menú de navegación">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 nav-card">
                <li class="nav-item">
                    <x-nav-link route="home">
                        <span class="item-nav">Home</span>
                    </x-nav-link>
                </li>
                <li class="nav-item">
                    <x-nav-link route="about">
                        <span class="item-nav"> Quienes somos</span>
                    </x-nav-link>
                </li>
                <li class="nav-item">
                    <x-nav-link route="books.index">
                        <span class="item-nav">Listado de Libros </span>
                    </x-nav-link>
                </li>
                <li class="nav-item">
                    <x-nav-link route="articles.index">
                        <span class="item-nav"> Novedades/Noticias</span>
                    </x-nav-link>
                </li>
                @auth
                    @if(auth()->user()->role === 'admin')
                        <li class="nav-item">
                            <x-nav-link route="admin.users.index">
                                <span class="item-nav">Dashboard</span>
                            </x-nav-link>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('auth.logout') }}" method="post">
                                @csrf
                                <button type="submit" class="nav-link">
                                    <span class="item-nav">{{ auth()->user()->email }} (Cerrar Sesion)</span>
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <form action="{{ route('auth.logout') }}" method="post">
                                @csrf
                                <button type="submit" class="nav-link">
                                    <span class="item-nav">{{ auth()->user()->email }} (Cerrar Sesion)</span>
                                </button>
                            </form>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <x-nav-link route="auth.login">
                            <span class="item-nav">Iniciar Sesion</span>
                        </x-nav-link>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

@auth
    @if(auth()->user()->role !== 'admin')
        <a href="#" class=" btn position-fixed top-0 end-0 mt-2 me-3" style="z-index: 9999;" title="Carrito">
            <i class="fas fa-shopping-cart fa-lg"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.7rem;">
                0
            </span>
        </a>
    @endif
@else
    <a href="#" class="btn position-fixed top-0 end-0 mt-2 me-3" style="z-index: 9999;" title="Carrito">
        <i class="fas fa-shopping-cart fa-lg"></i>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.7rem;">
            0
        </span>
    </a>
@endauth
            </div>
        </nav>
        <main class="p-4">
            @if (session()->has('feedback.message'))
                <div class="alert alert-{{ session()->get('feedback.type', 'success') }}">
                    {!! session()->get('feedback.message') !!}
                </div>
            @endif

            {{ $slot }}
        </main>

        
        <footer class="footer text-bg-dark text-center ">
            <p>Copyright &copy; Da Vinci 2025</p>
        </footer>
    </div>
    <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
