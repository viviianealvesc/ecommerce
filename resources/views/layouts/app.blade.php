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

      /* Dashboard */
      .dashboard-events-container a, form {
        display: inline-block;
    }
 
 .dashboard-title-container {
    margin-bottom: 30px;
    margin-top: 30px;
 }

 .dashboard-events-container th {
    width: 25%;
 }

 .dashboard-events-container form {
    display: inline-block;
 }

 /*------------------
  Cart page
---------------------*/

.cart-table {
	margin-bottom: 54px;
	overflow-y: auto;
}

.cart-table table {
	width: 100%;
}

.cart-table thead {
	background: #ebebeb;
	margin-bottom: 55px;
}

.cart-table thead th {
	padding: 5px 25px;
	text-align: center;
	font-weight: 400;
	font-size: 14px;
}

.cart-table tbody td {
	margin-top: 37px;
}

.cart-table .product-th {
	text-align: left;
}

.cart-table .product-col {
	display: table;
}

.cart-table .product-col img {
	display: table-cell;
	max-width: 187px;
}

.cart-table .product-col .pc-title {
	padding-left: 35px;
	display: table-cell;
	vertical-align: middle;
}

.cart-table .product-col .pc-title h4 {
	font-size: 18px;
	font-weight: 400;
}

.cart-table .product-col .pc-title a {
	font-size: 12px;
	color: #9e9e9e;
}

.cart-table .quy-input {
	width: 147px;
	height: 60px;
	background: #ebebeb;
	overflow: hidden;
	padding-top: 17px;
	padding-left: 25px;
	padding-right: 3px;
	margin: 0 auto;
}

.cart-table .quy-input span {
	font-size: 16px;
}

.cart-table .quy-input input {
	font-size: 16px;
	float: right;
	width: 60px;
	background-color: transparent;
	border: none;
}

.cart-table .price-col {
	text-align: center;
}

.cart-table .total-col {
	text-align: right;
	width: 8%;
}

.cart-table .total-th {
	text-align: right;
}

.cart-buttons {
	margin-bottom: 50px;
}

.cart-buttons .btn-continue {
	background: #b09d81;
	padding: 21px 30px;
	min-width: 260px;
	font-size: 16px;
}

.cart-buttons .btn-clear {
	min-width: 180px;
	padding: 21px 30px;
	background: #ebebeb;
	color: #414141;
	margin-right: 17px;
	font-size: 16px;
}

.cart-buttons .btn-update {
	min-width: 178px;
	padding: 19px 30px;
	font-size: 16px;
}

.card-warp {
	max-width: 1284px;
	margin: 0 auto;
	background: #ebebeb;
	padding: 65px 0;
}

.shipping-info h4 {
	font-weight: 400;
}

.shipping-info p {
	margin-bottom: 40px;
}

.shipping-chooes {
	margin-bottom: 85px;
}

.shipping-chooes .sc-item {
	margin-bottom: 31px;
}

.shipping-chooes label {
	display: block;
	font-size: 14px;
	color: #414141;
	margin-bottom: 0;
	padding-left: 35px;
	position: relative;
	cursor: pointer;
}

.shipping-chooes label span {
	float: right;
}

.shipping-chooes label:after {
	position: absolute;
	content: "";
	width: 11px;
	height: 11px;
	left: 0;
	top: 5px;
	background: #fff;
	border: 2px solid #9f9f9f;
	border-radius: 40px;
	-webkit-transition: all 0.2s ease 0s;
	-o-transition: all 0.2s ease 0s;
	transition: all 0.2s ease 0s;
}

.shipping-chooes input[type=radio] {
	visibility: hidden;
	position: absolute;
}

.shipping-chooes input[type=radio]:checked+label:after {
	background: #e95a5a;
	border: 2px solid #e95a5a;
}

.cupon-input {
	position: relative;
}

.cupon-input input {
	width: 100%;
	height: 52px;
	border: none;
	background: #fff;
	padding: 10px 20px;
	padding-right: 135px;
}

.cupon-input .site-btn {
	position: absolute;
	right: 0;
	top: 0;
	height: 100%;
	min-width: 122px;
	background: #b09d81;
}

.cart-total-details h4 {
	font-weight: 400;
}

.cart-total-details p {
	margin-bottom: 40px;
}

.cart-total-details .btn-full {
	width: 100%;
	font-size: 16px;
	background: #b09d81;
	padding: 20px 30px;
}

.cart-total-card {
	background: #fff;
	list-style: none;
	padding: 15px 7px 77px;
}

.cart-total-card li {
	display: block;
	font-size: 14px;
	color: #414141;
	padding: 15px 36px;
	margin-bottom: 15px;
}

.cart-total-card li span {
	float: right;
}

.cart-total-card li.total {
	background: #f7f7f7;
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
                                    <a class="nav-link dropdown" href="/events/carrinho" class="card-bag"><span>Carrinho (2)</span></a>
                                    <a class="nav-link dropdown" href="/events/favoritos/mostrar" class="card-bag"><span>favoritos (4)</span></a>
									<a class="nav-link dropdown" href="/events/pag" class="card-bag"><span>PagSeguro</span></a>
                                    @can('user')

				
                                    @elsecan('admin')
                                    <a class="nav-link dropdown"  href="/events/create">Cadastrar produto</a>
                                    <a class="nav-link dropdown" href="/events/dashboard">Painel</a>
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
