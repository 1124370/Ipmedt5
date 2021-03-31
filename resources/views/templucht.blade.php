<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Templucht - Daniel</title>
    <script>
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
			        {y: {{$sum[11]->temperature}}, label: "{{$sum[11]->created_at}}" },
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
            <input name="age" id="age" type="number" min="0" max="120" value="{{ $pref->age }}">

            <label for="gewensttemp">Prefered Temperature (°C)</label>
            <input name="gewensttemp" id="gewensttemp" type="number" min="-20" max="50" value="{{ $pref->gewensttemp }}">

            <label for="gewensthum">Prefered Humidity (%)</label>
            <input name="gewensthum" id="gewensthum" type="number" min="0" max="100" value="{{ $pref->gewensthum }}">


            <button type="submit">Submit</button>
            
        </form>
    </article>


</body>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</html>