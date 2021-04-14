!<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"> 
    <meta name="author" content="Daniek de Groot">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Geluid</title>
	<link rel="stylesheet" href="css/vakkan.css">
    <script src="js/reload-time.js"> </script>
</head>
<body>
	<header class="header">
        <a href="/" class="header__logo">FijneWerkplek</a>
            <input class="header__btn" type="checkbox" id="menu-btn" />
            <label class="header__icon" for="menu-btn"><span class="navicon"></span></label>
        <nav class="header__menu">
            <ul class="header__list">
            	<li class="header__item"><a href="/product">Dashboard</a></li>
                <li class="header__item"><a href="/register">Geluid</a></li>
                <li class="header__item"><a href="/product">To do list</a></li>
                <li class="header__item"><a href="/register">Idealen werk houding</a></li>
                <li class="header__item"><a href="/register">Tempratuur</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="heading">
            <article class="heading__article">
                <h1 class="heading__title">Dashboard</h1>
                <h3 class="heading__info">Het aantal decibel</h3>
            </article>
        </section> 

        <section class="geluid">
        
        <!-- Pop up vak aanmaken begin -->
        <div id="modalVak"  class="modal">
            <div class="wrapper popup">
                <div class="header">Header here</div>
                <form class="body d-flex flex-column" method="POST" action="/vakken">
                    @csrf
                    <div>
                        <label for="naam">Naam</label>
                        <input name="naam" id="naam" type="text">
                    </div>

                    <div>
                        <label for="benodigetijd">benodigetijd</label>
                        <input name="benodigetijd" id="benodigetijd" type="number">
                    </div>

                    <button type="submit">Create vak</button>

                </form>
                <div class="footer">
                    <button onclick="toggleModal()">Close</button>
                </div>
            </div>
        </div>
         <!-- Pop up vak aanmaken Eind -->

        <!-- Section huidige statatieken Begin -->
        <section class="vooruitgang-dashboard u-section-dashboard u-float-left">
            <h2>Vooruitgang van statatieken</h2>
            
                
            <ul>
                @foreach ($vakken as $vak)
                    <li class="u-list-style-none">
                        {{ $vak->naam }} {{ $vak->id }}

                    </li>
                    <div class="vak__progressbar">
                        <div class="vak__progressbar_fill" width="%" style="height:24px;width:{{ $vak->gewerktetijd }}%;">
                            {{ $vak->gewerktetijd }}%</div>
                    </div><br>
                @endforeach
            </ul>
            <button onclick="toggleModal()">Maak een nieuw vak aan</button>
        </section>
        <!-- Section huidige statatieken Eind -->

        <!-- Section werkvak kiezen Begin -->
        <section class="u-section-dashboard">
            <h2>Aan de slag met?</h2>   
            <form method="POST" action="/vakken">
                    <label for="werkvak">Naam</label>
                    <select name="werkvak" id="werkvak">
                        @foreach ($vakken as $vak)
                            <option value="{{ $vak->naam }}">{{ $vak->naam }}</option>
                        @endforeach
                    </select>

                    <button type="submit">Create vak</button>
            </form>
            
        </section>

    </main>
    
</body>

</html>