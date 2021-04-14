@extends('Telefoon.default')

@section('titel')
    Noodgeval
@endsection

@section('content')
    <main class="main">
        <section class="main__titleWrapper">
            <h1 class="main__title">Stop</h1>
        </section>

        <section class="main__cardWrapper">
            <article class="main__card main__card--stop">
                <h3 class="main__tekst">Stopfunctie staat</h3>
                <h3 class="main__tekst main__tekst--stop">{{$stop}}</h3>
                <p class="main__ondertekst">U kunt uw telefoon van de sensor afhalen</p>

                <section class="main__buttonContainer--stop">
                    <a href="/telefoon"><button class="main__button main__button--terug">Hoofdpagina</button></a>             
                </section>             
            </article> 
        </section>
    </main>
@endsection
