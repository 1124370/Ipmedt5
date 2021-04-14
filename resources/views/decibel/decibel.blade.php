@extends('default')
@section('css')
<link rel="stylesheet" href="/css/decibel.css">
@endsection
@section('js')
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
        window.onload = function () {
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "dark1",
            backgroundColor: "#0e0e0e",
            lineColor: "red",
            title: {
                fontSize: 18,
                padding: 3,
                fontFamily: "OpenSans-SemiBold",
                text: "Decibel"
            },
            axisY: {
                title: "Decibel waardes",
            },
            data: [{
                type: "splineArea",
                lineColor: "#7f22ea",
                color: "rgb(155,34,234,0.6)",
                indexLabelFontSize: 16,
                dataPoints: [
                    {y: {{$decibel[0]->waardes}}, label:" " },
                    {y: {{$decibel[1]->waardes}}, label:" " },
                    {y: {{$decibel[2]->waardes}}, label:" " },
                    {y: {{$decibel[3]->waardes}}, label:" " },
                    {y: {{$decibel[4]->waardes}}, label:" " },
                    {y: {{$decibel[5]->waardes}}, label:" " },
                    {y: {{$decibel[6]->waardes}}, label:" " },
                    {y: {{$decibel[7]->waardes}}, label:" " },
                    {y: {{$decibel[8]->waardes}}, label:" " },
                    {y: {{$decibel[9]->waardes}}, label:" " }
                ]
            }]
        });
        chart.render();
        }
    </script>
@endsection
@section('content')

    <main>
        <section class="heading">
            <article class="heading__article">
                <h1 class="heading__title">Dashboard</h1>
                <h3 class="heading__info">Decibel</h3>
            </article>
        </section> 

        <section class="decibel">
        <section class="charts">
            <article class="charts__article">
                <h4 class="charts__title">Mininum Decibel</h4>
                <h3 class="charts__value">{{$minDecibel}}dB</h3>
            </article>

            <article class="charts__article">
                <h4 class="charts__value">Max Decibel</h4>
                <h3 class="charts__value">{{$maxDecibel}}dB</h3>
            </article>

            <article class="charts__article">
                <h4 class="charts__value">Gemiddelde Decibel</h4>
                <h3 class="charts__value">{{$avgDecibel}}dB</h3>
            </article>
            
            <article class="charts__article charts__article--border" id="chartContainer">
                
            </article>
        </section>
        
        <section class="nietStoren">
                <article class="nietStoren__article">
                    <h3 class="nietStoren__title">Niet storen modus</h3>
                    <p class="nietStoren__text">storen neef</p>
                <!-- <button class="nietStoren__btn" onclick="window.location.href='/nietstoren'">Niet storen modus</button> -->
                <label class="switch">
                    <input type="checkbox">
                    <span class="slider" onclick="window.location.href='/nietstoren'"></span>
                </label>
            </article>
        </section>

        </section>
    </main>
@endsection



