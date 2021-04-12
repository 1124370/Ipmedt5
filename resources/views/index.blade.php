@extends('default')
@section('content')

    <main>
    <section class="heading">
            <article class="heading__article">
                <h1 class="heading__title">Dashboard</h1>
                <h3 class="heading__info">Decibel</h3>
            </article>
        </section> 

        <section class="decibel">
        	<!-- <h3 class="geluid__title">Decibel waarde</h3>
            <h1>{{$avgDecibel}}</h1> -->
            <!-- <div id="chartContainer" style="height: 370px; width:100%;"></div> -->
        

        <section class="charts">
            <article class="charts__article">
                <h4 class="charts__title">Gemiddelde</h4>
                <h3 class="charts__value">{{$avgDecibel}}</h3>
            </article>

            <article class="charts__article">
                <h4 class="charts__value">{{$avgDecibel}}</h4>
            </article>

            <article class="charts__article">
                <h4 class="charts__value">{{$avgDecibel}}</h4>
            </article>

            <article class="charts__article">
                <h4 class="charts__value">{{$avgDecibel}}</h4>
            </article>
        </section>

        <section class="nietStoren"

        </section>
        <!-- <button onclick="window.location.href='/led'">Niet storen modus</button> -->
    </main>

@endsection