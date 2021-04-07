@extends('default')

@section('titel')
    Noodgeval
@endsection

@section('content')
    <body>
    <main class="main">
        <section class="main__titleWrapper">
            <h1 class="main__title">Telefoonhouder</h1>
        </section>
        
        <article class="main__card">      

            <h3 class="main__tekst">Telefoon is</h3>
            <h3 class="main__tekst main__tekst--aanwezig" id="js--aanwezig">{{$show}}</h3>
            <h3 class="main__tekst">aanwezig</h3>

            <section class="main__buttonContainer">
                <a href="/noodgeval" class="main__button--noodgeval">Noodgeval</a>
            </section>          
         
        </article> 
    </main>
@endsection










