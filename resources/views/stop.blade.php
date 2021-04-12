@extends('default')

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

                <section class="main__buttonContainer--stop">
                    <a href="/"><button class="main__button main__button--terug">Hoofdpagina</button></a>     
                    <a href="{{ url('stop') }}" class="main__a">Stopfunctie uit/aan</a>         
                </section>             
            </article> 
        </section>
    </main>
@endsection
