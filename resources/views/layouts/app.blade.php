<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Beca Store</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    

	
	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/animate.css"/>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

    <style>
        /* Event create page */
    #event-create-container {
        padding: 30px;
        margin: 0 auto;
    }

    #event-create-container label {
        font-weight: bold;
    }

    .botao {
        width: 20%;
    }

    #event-create-container input,
    #event-create-container select,
    #event-create-container textarea {
        font-size: 18px;
    }

    .form-group {
        padding: 10px;
    }

            /* Event page */
#image-container,
#info-container {
    margin-top: 30px;
}

#image-container img {
    border-radius: 10px;
}

#info-container h1 {
    font-size: 36px;
    font-weight: 900;
}

#info-container p {
    margin: 0;
}

#info-container h3,
#description-container h3 {
    font-weight: bold;
}

#info-container ion-icon {
    color: #8A60FF;
    margin-right: 5px;
}

#info-container,
 #event-submit {
    margin: 20px 0;
 }

 #items-list {
    list-style: none;
    padding-left: 0;
 }

 #items-list li {
    display: flex;
 }

 .msg {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #C3E6BC;
    width: 100%;
    margin-bottom: 0;
    text-align: center;
    padding: 10px;
}

  .pi-meta a {
		text-decoration: none;
        color: white;
        padding: 0.5rem;
}

    .pi-meta a:hover {
        color: white;
    }

    </style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Beca Store
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                       

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item dropdown">
                        </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                    <a  class="nav-link dropdown" href="/" data-bs-toggle="dropdown">Home</a>
                                    <a class="nav-link dropdown" href="/events/carrinho" class="card-bag"><span>Carrinho</span></a>
                                    <a class="nav-link dropdown" href="/events/favoritos/mostrar" class="card-bag"><span>favoritos</span></a>
                                    @can('user')

				
                                    @elsecan('admin')
                                    <a class="nav-link dropdown"  href="/events/create">Cadastrar produto</a>
                                    <a class="nav-link dropdown" href="/events/dashboard">Painel</a>

                                    <a class="nav-link dropdown" href="/events/carrinho" class="card-bag"><span>Carrinho</span></a>
                                    <a class="nav-link dropdown" href="/events/favoritos/mostrar" class="card-bag"><span>favoritos</span></a>
                                    @endcan
                                </div>
                                
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
         <div class="row">
            @if(session('msg')) 
              <p class="msg">{{session('msg')}}</p>
            @endif
         </div>
      </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
	<!-- Footer section end -->

    	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/mixitup.min.js"></script>
	<script src="js/sly.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<script src="js/main.js"></script>

	 <!-- Icones -->
     <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>
