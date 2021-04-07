@extends('default')

@section('titel')
    Noodgeval
@endsection

@section('content')
    <main class="mainNoodgeval">
        <article class="mainNoodgeval__card">
            <h2 class="mainNoodgeval__tekst">Stopfunctie staat:</h2>
            <h2 class="mainNoodgeval__tekst mainNoodgeval__tekst--noodgeval">{{$noodgeval}}</h2>

            <section class="mainNoodgeval__buttonContainer">
                <a href="{{ url('noodgeval') }}"><button class="mainNoodgeval__button">Stopfunctie uit/aan</button></a>  
                <a href="/"><button class="mainNoodgeval__button mainNoodgeval__button--terug">Terug naar hoofdpagina</button></a>              
            </section>               
        </article> 
    </main>
@endsection
