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
                <input class="main__input" type="number" placeholder="Seconden " id="js--inputTijd" required>
                <button class="main__button" type="submit" id="js--setButton" onclick="getInputValue();">Submit</button>
        
            <h2 class="main__tijd" id="js--aftellen">00:00:00</h2>
            <button class="main__button" id="js--startButton" onclick="startTijd();" type="button">Start tijd</button>            

            <h3 class="main__tekst">Telefoon is</h3>
            <h3 class="main__tekst main__tekst--aanwezig" id="js--aanwezig">{{$show}}</h3>
            <h3 class="main__tekst">aanwezig</h3>

            <section class="main__buttonContainer">
                <a href="/noodgeval" class="main__button--noodgeval">Noodgeval</a>
            </section>          
         
        </article> 
    </main>
@endsection










