<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="300">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Templucht - Daniel</title>
    <link rel="stylesheet" href="\css\templucht.css">

    <script>
        var valueMessage;
        window.onload = function () {       
        inputAge();
        var chart1 = new CanvasJS.Chart("chartContainerTemp", {
            animationEnabled: true,
            theme: "light2",
            title:{
                fontSize: 18,
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
                    {y: <?php echo e($sum[0]->temperature); ?>, label: "<?php echo e($sum[0]->created_at); ?>" },
                    {y: <?php echo e($sum[1]->temperature); ?>, label: "<?php echo e($sum[1]->created_at); ?>" },
                    {y: <?php echo e($sum[2]->temperature); ?>, label: "<?php echo e($sum[2]->created_at); ?>" },
                    {y: <?php echo e($sum[3]->temperature); ?>, label: "<?php echo e($sum[3]->created_at); ?>" },
                    {y: <?php echo e($sum[4]->temperature); ?>, label: "<?php echo e($sum[4]->created_at); ?>" },
                    {y: <?php echo e($sum[5]->temperature); ?>, label: "<?php echo e($sum[5]->created_at); ?>" },
                    {y: <?php echo e($sum[6]->temperature); ?>, label: "<?php echo e($sum[6]->created_at); ?>" },
                    {y: <?php echo e($sum[7]->temperature); ?>, label: "<?php echo e($sum[7]->created_at); ?>" },
                    {y: <?php echo e($sum[8]->temperature); ?>, label: "<?php echo e($sum[8]->created_at); ?>" },
                    {y: <?php echo e($sum[9]->temperature); ?>, label: "<?php echo e($sum[9]->created_at); ?>" },
                    {y: <?php echo e($sum[10]->temperature); ?>, label: "<?php echo e($sum[10]->created_at); ?>" },
                    {y: <?php echo e($sum[11]->temperature); ?>, label: "<?php echo e($sum[11]->created_at); ?>" }
                ]
            }]
        });
        var chart2 = new CanvasJS.Chart("chartContainerHum", {
            animationEnabled: true,
            theme: "light2",
            title:{
                fontSize: 18,
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
                    {y: <?php echo e($sum[0]->humidity); ?>, label: "<?php echo e($sum[0]->created_at); ?>" },
                    {y: <?php echo e($sum[1]->humidity); ?>, label: "<?php echo e($sum[1]->created_at); ?>" },
                    {y: <?php echo e($sum[2]->humidity); ?>, label: "<?php echo e($sum[2]->created_at); ?>" },
                    {y: <?php echo e($sum[3]->humidity); ?>, label: "<?php echo e($sum[3]->created_at); ?>" },
                    {y: <?php echo e($sum[4]->humidity); ?>, label: "<?php echo e($sum[4]->created_at); ?>" },
                    {y: <?php echo e($sum[5]->humidity); ?>, label: "<?php echo e($sum[5]->created_at); ?>" },
                    {y: <?php echo e($sum[6]->humidity); ?>, label: "<?php echo e($sum[6]->created_at); ?>" },
                    {y: <?php echo e($sum[7]->humidity); ?>, label: "<?php echo e($sum[7]->created_at); ?>" },
                    {y: <?php echo e($sum[8]->humidity); ?>, label: "<?php echo e($sum[8]->created_at); ?>" },
                    {y: <?php echo e($sum[9]->humidity); ?>, label: "<?php echo e($sum[9]->created_at); ?>" },
                    {y: <?php echo e($sum[10]->humidity); ?>, label: "<?php echo e($sum[10]->created_at); ?>" },
                    {y: <?php echo e($sum[11]->humidity); ?>, label: "<?php echo e($sum[11]->created_at); ?>" }
                ]
            }]
        });
        chart1.render();
        chart2.render();
       
        console.log(localStorage.getItem("submit"))
        
        var tempdif = <?php echo e($cur->temperature); ?> - <?php echo e($pref->gewensttemp); ?> 
        const tempMargin = [-1, 1, -2, -3, 2, 3]
        var tempResult = checkdif(tempdif, tempMargin);
        var humdif = <?php echo e($cur->humidity); ?> - <?php echo e($pref->gewensthum); ?>

        const humMargin = [-4, 4, -5, -10, 5, 10]
        var humResult = checkdif(humdif, humMargin);
        showNote(tempResult, humResult);
        checkSubmit();
        var age = document.getElementById("-js--preference--age--input").value;
        document.getElementById("-js--preference--age").innerHTML = "Your age: " + age;
        trimDownValues();
      
     }

     function submitForm(){
        localStorage.setItem("submit", "true");
        document.getElementById("-js--form").submit();
     }

     function checkSubmit(){
        if(localStorage.getItem("submit") == "true"){
            document.getElementById("-js--submitted").style.height  = "7rem";
            localStorage.setItem("submit", "false");
            setTimeout(function(){ document.getElementById("-js--submitted").style.height = "0rem"}, 5000);
        }
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
        openNotification();
        document.getElementById("-js--notification").style.display = "block";
        switch (object){
            case "temp":
            console.log(value)
                document.getElementById("-js--notification--warning--temp").innerHTML = message;
                document.getElementById("-js--notification--temp").style.display = "block";
                document.getElementById("-js--notification--warning--temp").style.display = "block";
                document.getElementById("-js--notification--warning--temp--tip").style.display = "block";
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
                console.log(value)
                document.getElementById("-js--notification--warning--hum").innerHTML = message;
                document.getElementById("-js--notification--hum").style.display = "block";
                document.getElementById("-js--notification--warning--hum").style.display = "block";
                document.getElementById("-js--notification--warning--hum--tip").style.display = "block";
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
        var recommended
        var recommend = document.getElementById("-js--preference--recommended")
        var age = document.getElementById("-js--preference--age--input").value;
        document.getElementById("-js--preference--age").innerHTML = "Your age: " + age;
        if(age <= 10){
            recommended = "Recommended Temperature is 20-23 °C <br> Recommended Humidity is between 45-55%"
        } else if(age > 10 && age < 50){
            recommended = "Recommended Temperature is 18-20 °C <br> Recommended Humidity is between 40-60%"
        } else if(age >= 50){
            recommended = "Recommended Temperature is 20-23 °C <br> Recommended Humidity is between 50-60%"
        }
        recommend.innerHTML = recommended;
     }

     function setDisplay(id){ 
         console.log(id)
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
        console.log(document.getElementById("-js--notification").scrollHeight )
        setTimeout(function(){ document.getElementById("-js--notification").style.height = document.getElementById("-js--notification").scrollHeight + 200 + "px"}, 100);
        setTimeout(function(){ document.getElementById("-js--notification--close").style.display= "block"}, 300);
     }

     function closeNotification(){
        document.getElementById("-js--notification--close").style.display= "none";
        document.getElementById("-js--notification").style.height = "0px";
        document.getElementById("-js--notification").style.borderRadius = "2.5rem";   
     }

     function trimDownValues(){
        
        temp = String(<?php echo e($avgTemp); ?>)
        hum = String(<?php echo e($avgHum); ?>)
        document.getElementById("-js--average--temp").innerHTML = "Temperature: " + temp + " °Celsius"
        document.getElementById("-js--average--hum").innerHTML = "Humidity: " +  hum + "%"
        }
    </script>
    

</head>
<body class="templucht">
    <h1 class="templucht_title">Temperature/Humidity</h1>

    <div class="templucht_submitted" id="-js--submitted">
        <p>Settings changed!</p>
    </div>

    <article class="templucht_notification" id="-js--notification">
        <h1>! WARNING !</h1>
            <section class="templucht_notification_section" id="-js--notification--temp">
                <h2 class="templucht_hide" id="-js--notification--warning--temp">Notification</h2>
                <h3 class="templucht_hide" id="-js--notification--warning--temp--tip">Temperature Tips:</h3>
                <ul id="-js--notification--content--temp--toohigh">
                    <li>Eat icecream.</li>
                    <li>Open windows.</li>
                    <li>Turn on Airconditioner.</li>
                    <li>Turn on the ventilator.</li>
                </ul>
                <ul id="-js--notification--content--temp--high">
                    <li>Get cold glass of water.</li>
                    <li>Take sweater/vest off.</li>
                    <li>Open doors.</li>
                </ul>
                <ul id="-js--notification--content--temp--low">
                    <li>Get some tea.</li>
                    <li>Put on sweater/vest.</li>
                </ul>
                <ul id="-js--notification--content--temp--toolow">
                    <li>Close windows.</li>
                    <li>Turn on the heater.</li>
                </ul>
            </section>
            <section class="templucht_notification_section" id="-js--notification--hum">
                <h2 class="templucht_hide"  id="-js--notification--warning--hum">Notification</h2>
                <h3 class="templucht_hide"  id="-js--notification--warning--hum--tip">Humidity Tips:</h3>
                <ul id="-js--notification--content--hum--toohigh">
                    <li>Turn on the ventilator.</li>
                    <li>Turn on the airconditioner.</li>
                    <li>Turn on the air dehumidifier.</li>
                </ul>
                <ul id="-js--notification--content--hum--high">
                    <li>Get some airflow (open windows/doors).</li>
                    <li>Get some plants.</li>
                </ul>
                <ul id="-js--notification--content--hum--low">
                    <li>Get a bucket of water.</li>
                    <li>Get some plants.</li>
                    <li>Turn off the heater.</li>
                </ul>
                <ul id="-js--notification--content--hum--toolow">
                    <li>Turn on the air humidifier.</li>
                    <li>Open a window (if it rains).</li>
                </ul>
            
            </section>
        <button class="templucht_notification_close" id="-js--notification--close" onclick="closeNotification()">Close</button>
    </article>
    <main>
        <article>
            <h2>Newest Recording</h2>
            <h3>Temperature: <?php echo e($cur->temperature); ?> °Celsius</h3>
            <h3>Humidity: <?php echo e($cur->humidity); ?>%   </h3>
            <h4>Recorded at: <?php echo e($cur->created_at); ?></h4>
            <button class="templucht_button templucht_refresh" onClick="window.location.reload();">Refresh</button>
        </article>

        <article>
            <h2>Prefered Values</h2>
            <h3>Temperature <?php echo e($pref->gewensthum); ?> °Celsius</h3>
            <h3>Humidity: <?php echo e($pref->gewensthum); ?>%   </h3>
        </article>

        <article>
            <h2>Average Values</h2>
            <h3 id="-js--average--temp">Temperature: <?php echo e($avgTemp); ?> °Celsius</h3>
            <h3 id="-js--average--hum">Humidity:    <?php echo e($avgHum); ?>%</h3>
        </article>

        <article>
        
            <h2>Latest Recordings</h2>
            <section class="templucht_recordings">
                <div class="templucht_recordings_tables" id="chartContainerTemp" style="height: 150px; width: 100%;"></div>
                <div class="templucht_recordings_tables" id="chartContainerHum" style="height: 150px; width: 100%;"></div> 
            </section>
            
            
                    
        </article>

        <article>
            <h2>Settings</h2>
            <form id="-js--form" method="POST" action="/templucht">
                <?php echo csrf_field(); ?>
                
                <label for="age">Age: </label>
                <input name="age" id="-js--preference--age--input" type="number" min="0" max="120" value="<?php echo e($pref->age); ?>" oninput="inputAge()" required>

                <label for="gewensttemp">Prefered Temperature (°C)</label>
                <input name="gewensttemp"  type="number" min="-20" max="50" value="<?php echo e($pref->gewensttemp); ?>" required>

                <label for="gewensthum">Prefered Humidity (%)</label>
                <input name="gewensthum"  type="number" min="0" max="100" value="<?php echo e($pref->gewensthum); ?>" required>

                <h4 id="-js--preference--age">Your age: <?php echo e($pref->age); ?></h4>
                <p id="-js--preference--recommended"> </p>

                <button class="templucht_button templucht_refresh" type="submit" onclick="submitForm()">Submit</button>

                
            </form>
        </article>
    </main>
    

    
    
</body>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</html><?php /**PATH /home/metspek/school/Ipmedt5/resources/views/templucht.blade.php ENDPATH**/ ?>