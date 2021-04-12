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
        document.getElementById("js--setButton").style.display = "none";
        document.getElementById("js--startButton").style.display = "block";
        document.getElementById("js--aftellen").style.display = "block";
        if(document.getElementById("js--inputTijd").value == null || document.getElementById("js--inputTijd").value == ""){
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
                <input class="main__input" type="number" placeholder="Minuten" id="js--inputTijd" required>
                <h3 class="main__tekst main__tekst--minuten">Minuten</h3>
                <button class="main__button" id="js--setButton" onclick="getInputValue();">Submit</button>
            
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
                <section class="main__modal__content">
                <span class="main__modal__close" id="js--close" onclick="close()">&times;</span>
                </section>
                
    	    </modal>


        </section> 

        <button class="main-home__product__buttonContainer__button main-home__product__buttonContainer__button--leesMeer"onclick="leesmeer()">Lees meer</button>
    </main>

    
@endsection



<!-- <div class="main-home__modal__modal-content">
                <h1 class="main-home__modal__modal-content__productnaam" id="js--naam" tabindex="0">Spiderman: Miles Morals</h1>
                <span class="main-home__modal__modal-content__close" id="js--close" tabindex="0" aria-label="sluiten" onclick="close()">&times;</span>
                <div class="main-home__modal__modal-content__product-info">
                <h1 class="main-home__modal__modal-content__product-info__prijs">€59,98</h1>
                <p class="main-home__modal__modal-content__product-info__tekst">Dit is wat tekst. Zoals ik al zei is dit een uitzonderlijk mooi product en goed van kwaliteit. Hier staat meer tekst, omdat dat de opdracht is. Het is ook redelijk logisch dat als je klikt op meer informatie dat er ook daadwerkelijk meer informatie zichtbaar is i.p.v. hetzelfde.</p>
                </div>
                <div class="main-home__modal__modalButtons">
                <button class="main-home__modal__modalButtons__button" tabindex="0" aria-label="in winkelwagen">In winkelwagen</button>
                <button class="main-home__modal__modalButtons__button" tabindex="0" aria-label="op verlanglijstje">Op verlanglijstje</button>
                </div> -->






