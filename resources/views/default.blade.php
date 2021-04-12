<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> 
    <link rel="stylesheet" href="/css/main.css">
    <script src="/js/main.js" defer></script>
    <title>@yield('title')</title>
</head>
<body>
    <header class="header">
        <a href="/" class="header__logo">Fijne Werkplek</a>
            <input class="header__btn" type="checkbox" id="menu-btn" />
            <label class="header__icon" for="menu-btn"><span class="navicon"></span></label>
        <nav class="header__menu">
            <ul class="header__list">
                <li class="header__item"><a href="/register">Sign in / Register</a></li>
            </ul>
        </nav>
    </header>

    
    @yield('content')

    <footer class="footer">
        <p class="footer__text"> © Fijne Werkplek 2021</p>

    </footer>


</body>
</html>