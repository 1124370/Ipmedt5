@extends('default')

@section('titel')
    Aanwezig
@endsection


@section('content')
    <main class="main">
        <section class="main__titleWrapper">
            <h1 class="main__title">Telefoonhouder</h1>
        </section>
        
        <article class="main__card">
            <h2 class="main__tijd" id="js--tijd">00:00:00</h2>

            <h3 class="main__tekst">Telefoon is</h3>
            <h3 class="main__tekst main__tekst--aanwezig">{{$show}}</h3>
            <h3 class="main__tekst">aanwezig</h3>

            <section class="main__buttonContainer">
                <a href="/noodgeval" class="main__button">Noodgeval</a>
            </section>               
        </article> 
    </main>
@endsection










