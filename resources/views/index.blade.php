@extends('default')
@section('content')

    <!-- <script>
        window.onload = function () {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "dark2",
            title: {
                fontSize: 18,
                text: "Gemiddelde decibel waarde"
            },
            axisY: {
                title: "Decibel waardes"
            },
            data: [{
                type: "line",
                indexLabelFontSize: 16,
                dataPoints: [
                    {y: {{$decibel[0]->waardes}} },
                    {y: {{$decibel[1]->waardes}} },
                    {y: {{$decibel[2]->waardes}} },
                    {y: {{$decibel[3]->waardes}} },
                    {y: {{$decibel[4]->waardes}} },
                    {y: {{$decibel[5]->waardes}} },
                    {y: {{$decibel[6]->waardes}} },
                    {y: {{$decibel[7]->waardes}} },
                    {y: {{$decibel[8]->waardes}} },
                    {y: {{$decibel[9]->waardes}} }
   
                ]
            }]
        });
        chart.render();
        }
    </script> -->

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
        

        <section class="charts">
            <article class="charts__article">
                <h4 class="charts__title">Mininum Decibel</h4>
                <h3 class="charts__value">{{$minDecibel}}</h3>
            </article>

            <article class="charts__article">
                <h4 class="charts__value">Max Decibel</h4>
                <h3 class="charts__value">{{$minDecibel}}</h3>
            </article>

            <article class="charts__article">
                <h4 class="charts__value">Gemiddelde Decibel</h4>
                <h3 class="charts__value">{{$minDecibel}}</h3>
            </article>
            
            <article class="charts__article">
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            </article>
        </section>
        
        <section class="nietStoren">
            <button onclick="window.location.href='/nietstoren'">Niet storen modus</button>
        </section>

        </section>
    </main>

@endsection