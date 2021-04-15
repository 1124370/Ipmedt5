@extends('default')
@section('css')
<link rel="stylesheet" href="/css/decibel.css">
<link rel="stylesheet" href="css/vakkan.css">


@endsection
@section('js')
<script src="js/reload-time.js"> </script>

@endsection
@section('content')
    <main>
        <section class="heading">
            <article class="heading__article">
                <h1 class="heading__title">Planning</h1>
                <h3 class="heading__info">Aan welk vak moet je nog tijd besteden?</h3>
            </article>
        </section> 

        <section class="decibel">
        
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
                    <button class="u-margin" onclick="toggleModal()">Close</button>
                </div>
            </div>
        </div>
         <!-- Pop up vak aanmaken Eind -->

        <!-- Section huidige statatieken Begin -->
        <section class="charts">
            <article class="charts__article">
                <h2 class="charts__title">Vooruitgang van statatieken</h2>
                <ul>
                    @foreach ($vakken as $vak)
                        <li class="u-list-style-none">
                            <h3 class="charts__standard">{{ $vak->naam }} {{ $vak->id }}</h3>
                            <div class="vak__progressbar">
                                <div class="vak__progressbar_fill" id="procent{{ $vak->naam }}" style="height:36px;">
                                </div><span id='procent'></span>
                            </div>
                            <h4 class="charts__standard">Aan {{ $vak->naam }} heb je al {{ $vak->gewerktetijd }} minuten gewerkt nog <span id="benodigdetijd{{ $vak->naam }}"></span> minuten te gaan! </h4>
                            <script>
                                let gewerkt{{ $vak->naam }} = {{ $vak->gewerktetijd }};
                                let benodig{{ $vak->naam }} = {{ $vak->benodigetijd }};
                                document.getElementById("benodigdetijd{{ $vak->naam }}").innerHTML = benodig{{ $vak->naam }} - gewerkt{{ $vak->naam }};
                                let proce{{ $vak->naam }} = gewerkt{{ $vak->naam }} / benodig{{ $vak->naam }} *100;
                                document.getElementById("procent{{ $vak->naam }}").style.width= proce{{ $vak->naam }} +'%';
                            </script>
                            
                        </li>
                        <br>
                    @endforeach
                </ul>
                <button class="u-margin" onclick="toggleModal()">Nieuw vak aanmaken</button> 
                <button class="u-margin u-float-right" onclick="refresh()">Refresh</button><br><br><br>

            
            </article>
            <article class="charts__article">
                <h2 class="charts__title">Aan de slag met?</h2>   
                <form method="POST" action="/aanhetwerk">
                        @csrf
                        <label for="werkvak"><h3 class="charts__title">Ik ga aan de slag met het onderstaande vak:</h3></label>
                        <select class="charts__selects u-margin"name="werkvak" id="werkvak">
                            @foreach ($vakken as $vak)
                                <option value="{{ $vak->naam }}">{{ $vak->naam }}</option>
                            @endforeach
                        </select>

                        <button class="u-margin" type="submit">Aan de slag met dit vak</button>
                </form>
            </article>
        </section>
    </main>
    
@endsection