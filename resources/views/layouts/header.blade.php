<!doctype html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Test DevIt</title>
        <link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="{{asset('styles/style.css')}}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
<header id="headerId">
  <div class="container">
     @csrf

     <nav  class="navbar navbar-expand-lg navbar-dark bg-dark-blue">
         <div  class="logo">
             <img src="{{asset('assets/images/logo.png')}}"
                  alt="logoIcon">
         </div>
         <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav mx-auto">
                 <li class="nav-item">
                       <a class="nav-link active" href="/">Главная</a>
                 </li>
                 @auth
                    @if(Auth::user()->isAdmin())
                        <li class="nav-item">
                            <a class="nav-link" href="/users">Пользователи</a>
                        </li>
                    @endif
                 @endauth
                 @guest
                 <li class="nav-item">
                     <a class="nav-link {!!Request::is('register') ? 'active' : '' !!}" href="/register">Регистрация</a>
                 </li>

                 <li class="nav-item">
                    <a  href="{{ route('login') }}" class="sign-in ml-lg-auto nav-link"><i class="fa fa-sign-in" aria-hidden="true"></i>Вход</a>
                 </li>
                 @else

                  <li class="nav-item">
                      <a class="nav-link {!!Request::is('profile') ? 'active' : '' !!}" href="/profile">Личный кабинет</a>
                  </li>
                 <li class="nav-item">
                    <a  href="{{ route('logout') }}" class="sign-out ml-lg-auto nav-link"><i class="fa fa-sign-out" aria-hidden="true"></i>Выход</a>
                 </li>
                 @endguest
             </ul>
          </div>
    </nav>

</header>
