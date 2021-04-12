@extends('default')

@section('titel')
    Telefoon
@endsection

@section('script')
<script>    
    //Input tijd, als niks invoert refresh dan de pagina waardoor je opnieuw iets moet invoeren
    function getInputValue() {
        let inputVal = document.getElementById("js--inputTijd").value;
        localStorage.setItem("js--tijd", inputVal);
        document.getElementById("js--aftellen").innerHTML = localStorage.getItem("js--tijd");
        document.getElementById("js--inputTijd").style.display = "none";
        document.getElementById("js--modal").style.display = "none";
        document.getElementById("js--setButton").style.display = "none";
        document.getElementById("js--startButton").style.display = "block";
        document.getElementById("js--aftellen").style.display = "block";
        if(document.getElementById("js--inputTijd").value == null || document.getElementById("js--inputTijd").value == "" || document.getElementById("js--inputTijd").value <= 0){
            window.location.reload();       
        }
    }

    //Tel af en check elke seconde of de waarde uit de db is veranderd.
    async function startTijd(){
        document.getElementById("js--startButton").style.display = "none";
        let tijd = document.getElementById("js--aftellen").innerHTML = localStorage.getItem("js--tijd");
        let afteltijd = parseInt(tijd);
        let buffer = 0;  
        while(afteltijd > 0){
            buffer += 1;
            
            if(buffer === 60){
                buffer = 0;
                afteltijd -= 1;
            }           
            document.getElementById("js--aftellen").innerHTML = afteltijd;
            newTijd();
            await sleep(1000);        
        } 
        //Als de tijd gelijk is aan 
        if(afteltijd <= 0){
            window.location.href = '/noodgeval';
        }  
    }

    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }
</script>
@endsection

@section('content')
    <main class="main">
        <section class="main__titleWrapper">
            <h1 class="main__title">Telefoonhouder</h1>
        </section>

        <section class="main__cardWrapper">
            <article class="main__card"> 
                <h3 class="main__tekst">Minuten:</h3>               
                <h2 class="main__tijd" id="js--aftellen">00:00:00</h2>
                <button class="main__button" id="js--startButton" onclick="startTijd();" type="button">Start tijd</button>    

                <h3 class="main__tekst">Telefoon is</h3>
                <h3 class="main__tekst main__tekst--aanwezig" id="js--aanwezig">.</h3>
                <h3 class="main__tekst">aanwezig</h3>                

                <section class="main__buttonContainer">
                    <a href="/noodgeval" class="main__button--noodgeval">Noodgeval</a>
                </section>      
            </article> 

            <modal id="js--modal" class="main__modal">
                <section class="modal__content">
                    <h3 class="modal__titel">Stel tijd in</h3>
                    <section class="modal__tekstContainer">
                        <p class="modal__tekst">1. Leg uw telefoon op de sensor</p>
                        <p class="modal__tekst">2. Voer een aantal minuten in en klik op ga door</p>
                    
                        <section class="modal__inputContainer">
                            <p class="inputContainer__tekst">Minuten: </p>
                            <input class="inputContainer__input" type="number" placeholder="Minuten" id="js--inputTijd" required>
                        </section>
                    </section>

                    <section class="modal__buttonContainer">
                        <button class="modal__button" id="js--setButton" onclick="getInputValue();">Ga door</button>
                    </section>
                </section>
                
    	    </modal>


        </section> 
    </main>

    
@endsection








