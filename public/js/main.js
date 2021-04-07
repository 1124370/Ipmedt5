
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
    let container = document.getElementById("js--aanwezig");
    let content = container.innerHTML;
    container.innerHTML= content; 
    
   //this line is to watch the result in console , you can remove it later	
    console.log("Refreshed"); 
}




