<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="300">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Templucht - Daniel</title>
    <link rel="stylesheet" href="\css\templucht.css">

    <script>
        var valueMessage;
        window.onload = function () {       
        var chart1 = new CanvasJS.Chart("chartContainerTemp", {
            animationEnabled: true,
            theme: "light1",
            title:{
                text: "Latest Temperatures"
            },
            axisX:{
                title: "Timeline"
            },
            axisY:{
                title: "Temperature (°C)",
                includeZero: true
            },
            data: [{        
                type: "area",
                indexLabelFontSize: 16,
                dataPoints: [
                    {y: {{$sum[0]->temperature}}, label: "{{$sum[0]->created_at}}" },
                    {y: {{$sum[1]->temperature}}, label: "{{$sum[1]->created_at}}" },
                    {y: {{$sum[2]->temperature}}, label: "{{$sum[2]->created_at}}" },
                    {y: {{$sum[3]->temperature}}, label: "{{$sum[3]->created_at}}" },
                    {y: {{$sum[4]->temperature}}, label: "{{$sum[4]->created_at}}" },
                    {y: {{$sum[5]->temperature}}, label: "{{$sum[5]->created_at}}" },
                    {y: {{$sum[6]->temperature}}, label: "{{$sum[6]->created_at}}" },
                    {y: {{$sum[7]->temperature}}, label: "{{$sum[7]->created_at}}" },
                    {y: {{$sum[8]->temperature}}, label: "{{$sum[8]->created_at}}" },
                    {y: {{$sum[9]->temperature}}, label: "{{$sum[9]->created_at}}" },
                    {y: {{$sum[10]->temperature}}, label: "{{$sum[10]->created_at}}" },
                    {y: {{$sum[11]->temperature}}, label: "{{$sum[11]->created_at}}" }
                ]
            }]
        });
        var chart2 = new CanvasJS.Chart("chartContainerHum", {
            animationEnabled: true,
            theme: "light1",
            title:{
                text: "Latest Humidity"
            },
            axisX:{
                title: "Timeline"
            },
            axisY:{
                title: "Humidity (%)",
                includeZero: true
            },
            data: [{        
                type: "area",
                indexLabelFontSize: 16,
                dataPoints: [
                    {y: {{$sum[0]->humidity}}, label: "{{$sum[0]->created_at}}" },
                    {y: {{$sum[1]->humidity}}, label: "{{$sum[1]->created_at}}" },
                    {y: {{$sum[2]->humidity}}, label: "{{$sum[2]->created_at}}" },
                    {y: {{$sum[3]->humidity}}, label: "{{$sum[3]->created_at}}" },
                    {y: {{$sum[4]->humidity}}, label: "{{$sum[4]->created_at}}" },
                    {y: {{$sum[5]->humidity}}, label: "{{$sum[5]->created_at}}" },
                    {y: {{$sum[6]->humidity}}, label: "{{$sum[6]->created_at}}" },
                    {y: {{$sum[7]->humidity}}, label: "{{$sum[7]->created_at}}" },
                    {y: {{$sum[8]->humidity}}, label: "{{$sum[8]->created_at}}" },
                    {y: {{$sum[9]->humidity}}, label: "{{$sum[9]->created_at}}" },
                    {y: {{$sum[10]->humidity}}, label: "{{$sum[10]->created_at}}" },
                    {y: {{$sum[11]->humidity}}, label: "{{$sum[11]->created_at}}" }
                ]
            }]
        });
        chart1.render();
        chart2.render();

        var tempdif = {{$cur->temperature}} - {{$pref->gewensttemp}} 
        const tempMargin = [-1, 1, -2, -3, 2, 3]
        var tempResult = checkdif(tempdif, tempMargin);
        var humdif = {{$cur->humidity}} - {{$pref->gewensthum}}
        const humMargin = [-4, 4, -5, -10, 5, 10]
        var humResult = checkdif(humdif, humMargin);
        showNote(tempResult, humResult);

        var age = document.getElementById("-js--preference--age--input").value;
        document.getElementById("-js--preference--age").innerHTML = "Your age: " + age;
      
     }

     function showNote(noteTemp, noteHum){
        var tempMessage;
        var humMessage;
        switch (noteTemp){
            case "tooLow":
                tempMessage = "Temperature too low!"
                giveWarning(tempMessage, "temp", "too low");
                break;
            case "low":
                tempMessage = "Temperature low!"
                giveWarning(tempMessage, "temp", "low");
                break;
            case "high":
                tempMessage = "Temperature high!"
                giveWarning(tempMessage, "temp", "high");
                break;
            case "tooHigh":
                tempMessage = "Temperature too high!"
                giveWarning(tempMessage, "temp", "too high");
                break;
            default:
                console.log("Temp just right")
                break;
        }

        switch (noteHum){
            case "tooLow":
                humMessage = "Humidity too low!"
                giveWarning(humMessage, "hum", "too low");
                break;
            case "low":
                humMessage = "Humidity low!"
                giveWarning(humMessage, "hum", "low");
                break;
            case "high":
                humMessage = "Humidity high!"
                giveWarning(humMessage, "hum", "high");
                break;
            case "tooHigh":
                humMessage = "Humidity too high!"
                giveWarning(humMessage, "hum", "too high");
                break;
            default:
                console.log("Hum just right")
                break;
        }
        console.log(tempMessage)
        console.log(humMessage)
     }

     function giveWarning(message, object, value){
        document.getElementById("-js--notification").style.display = "block";
        switch (object){
            case "temp":
                document.getElementById("-js--notification--warning--temp").innerHTML = message;
                document.getElementById("-js--notification--temp").style.display = "block";
                switch(value){
                    case "too low":
                        setDisplay("-js--notification--content--temp--toolow");
                        setDisplay("-js--notification--content--temp--low");
                        break;
                    case "low":
                        setDisplay("-js--notification--content--temp--low");
                        break;
                    case "high":
                        setDisplay("-js--notification--content--temp--high");
                        break;
                    case "too high":
                        setDisplay("-js--notification--content--temp--high");
                        setDisplay("-js--notification--content--temp--toohigh");
                        break;
                }
                break;
            case "hum":
                document.getElementById("-js--notification--warning--hum").innerHTML = message;
                document.getElementById("-js--notification--hum").style.display = "block";
                switch(value){
                    case "too low":
                        setDisplay("-js--notification--content--hum--toolow")
                        setDisplay("-js--notification--content--hum--low")
                        break;
                    case "low":
                        setDisplay("-js--notification--content--hum--low")
                        break;
                    case "high":
                        setDisplay("-js--notification--content--hum--high")
                        break;
                    case "too high":
                        setDisplay("-js--notification--content--hum--high")
                        setDisplay("-js--notification--content--hum--toohigh")
                        break;
                }
                break;
        }

        
     }

     function inputAge(){
        
        var age = document.getElementById("-js--preference--age--input").value;
        document.getElementById("-js--preference--age").innerHTML = "Your age: " + age;
     }

     function setDisplay(id){ 
        document.getElementById(id).style.display = "block";
     }

     function checkdif(thing, margin){

        if(thing >= margin[0] && thing <= margin[1]){
            valueMessage = "good";
        } else if(thing <= margin[2] && thing > margin[3]){
            valueMessage = "low";
        } else if(thing >= margin[4] && thing < margin[5]){
            valueMessage = "high";
        } else if(thing <= margin[3]){
            valueMessage = "tooLow";
        } else if(thing >= margin[5]){
            valueMessage = "tooHigh"; 
        } 
        return valueMessage;
     }
     function openNotification(){
        document.getElementById("-js--notification").style.display = "block";
     }

     function closeNotification(){
        document.getElementById("-js--notification").style.display = "none"
     }
    </script>
    

</head>
<body>
    <h1>Temperature/Humidity</h1>

    <article>
        <h2>Newest Recording</h2>
        <h3>Temperature: {{$cur->temperature}} °Celsius</h3>
        <h3>Humidity: {{$cur->humidity}}%   </h3>
        <h4>Recorded at: {{$cur->created_at}}</h4>
        <button onClick="window.location.reload();">Refresh</button>
    </article>

    <article>
        <h2>Prefered Values</h2>
        <h3>Temperature: {{$pref->gewensttemp}} °Celsius</h3>
        <h3>Humidity: {{$pref->gewensthum}}%   </h3>
    </article>

    <article>
        <h2>Average</h2>
        <h3>Temperature: {{$avgTemp}} °Celsius</h3>
        <h3>Humidity:    {{$avgHum}}%</h3>
    </article>

    <article>
    
        <h2>Latest Recordings</h2>
        <div id="chartContainerTemp" style="height: 200px; width: 40%;"></div>
        <div id="chartContainerHum" style="height: 200px; width: 40%;"></div>           
    </article>

    <article>
        <form method="POST" action="/templucht">
            @csrf
            
            <label for="age">Age: </label>
            <input name="age" id="-js--preference--age--input" type="number" min="0" max="120" value="{{ $pref->age }}" oninput="inputAge()">

            <label for="gewensttemp">Prefered Temperature (°C)</label>
            <input name="gewensttemp" id="gewensttemp" type="number" min="-20" max="50" value="{{ $pref->gewensttemp }}">

            <label for="gewensthum">Prefered Humidity (%)</label>
            <input name="gewensthum" id="gewensthum" type="number" min="0" max="100" value="{{ $pref->gewensthum }}">

            <p id="-js--preference--age">Age</p>

            <button type="submit">Submit</button>

            
        </form>
    </article>

    <article class="templucht_notification" id="-js--notification">
        <button onclick="closeNotification()">Close</button>
        <section id="-js--notification--temp">
            <h2 id="-js--notification--warning--temp">Notification</h2>
            <h3>Temperature Tips:</h3>
            <p id="-js--notification--content--temp--toohigh">Tips too high</p>
            <p id="-js--notification--content--temp--high">Tips high</p> 
            <p id="-js--notification--content--temp--low">Tips low</p>
            <p id="-js--notification--content--temp--toolow">Tips too low</p>
        </section>
        <section id="-js--notification--hum">
            <h2 id="-js--notification--warning--hum">Notification</h2>
            <h3>Humidity Tips:</h3>
            <p id="-js--notification--content--hum--toohigh">Tips too high</p>
            <p id="-js--notification--content--hum--high">Tips high</p> 
            <p id="-js--notification--content--hum--low">Tips low</p>
            <p id="-js--notification--content--hum--toolow">Tips too low</p>
        </section>
                   
    </article>

</body>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</html>