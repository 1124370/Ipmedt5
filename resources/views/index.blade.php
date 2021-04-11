@extends('default')
@section('content')
    <main>
    <section class="heading">
            <article class="heading__article">
                <h1 class="heading__title">Dashboard</h1>
                <h3 class="heading__info">Het aantal decibel</h3>
            </article>
        </section> 

        <section class="geluid">
        	<h3 class="geluid__title">Geluid statistiek</h3>
            <h4>{{$avgDecibel}}</h4>
            
        </section>
        <!-- <button onclick="window.location.href='/led'">Niet storen modus</button> -->
    </main>

@endsection