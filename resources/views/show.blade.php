<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"> 
    <!-- <meta http-equiv="refresh" content="3"> -->
    <title>@yield('titel')</title>
</head>
<script>
    
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

async function startTijd(){
    document.getElementById("js--startButton").style.display = "none";
    let tijd = document.getElementById("js--aftellen").innerHTML = localStorage.getItem("js--tijd");
    let afteltijd = parseInt(tijd);  
    while(afteltijd > 0){
        afteltijd -= 1;
        document.getElementById("js--aftellen").innerHTML = afteltijd;
        reload();
        await sleep(1000);        
    } 
    if(afteltijd <= 0){
        window.location.href = '/noodgeval';
    }  
}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
 }

 function reload(){
    document.getElementById("js--aanwezig").innerHTML = '{{$show}}';
    
   //this line is to watch the result in console , you can remove it later	
    console.log("Refreshed"); 
}
</script>
    <body>
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
</body>
</html>










