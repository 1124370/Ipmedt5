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
			        {y: <?php echo e($sum[11]->temperature); ?>, label: "<?php echo e($sum[11]->created_at); ?>" },
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
    }
    </script>

</head>
<body>
    <h1>Temperature/Humidity</h1>

    <article>
        <h2>Newest Recording</h2>
        <h3>Temperature: <?php echo e($cur->temperature); ?> °Celsius</h3>
        <h3>Humidity: <?php echo e($cur->humidity); ?>%   </h3>
        <h4>Recorded at: <?php echo e($cur->created_at); ?></h4>
    </article>

    <article>
        <h2>Prefered Values</h2>
        <h3>Temperature: <?php echo e($pref->gewensttemp); ?> °Celsius</h3>
        <h3>Humidity: <?php echo e($pref->gewensthum); ?>%   </h3>
    </article>

    <article>
        <h2>Average</h2>
        <h3>Temperature: <?php echo e($avgTemp); ?> °Celsius</h3>
        <h3>Humidity:    <?php echo e($avgHum); ?>%</h3>
    </article>

    <article>
    
        <h2>Latest Recordings</h2>
        <div id="chartContainerTemp" style="height: 200px; width: 40%;"></div>
        <div id="chartContainerHum" style="height: 200px; width: 40%;"></div>           
    </article>

    <article>
        <form method="POST" action="/templucht">
            <?php echo csrf_field(); ?>
            
            <label for="age">Age: </label>
            <input name="age" id="age" type="number" min="0" max="120" value="<?php echo e($pref->age); ?>">

            <label for="gewensttemp">Prefered Temperature (°C)</label>
            <input name="gewensttemp" id="gewensttemp" type="number" min="-20" max="50" value="<?php echo e($pref->gewensttemp); ?>">

            <label for="gewensthum">Prefered Humidity (%)</label>
            <input name="gewensthum" id="gewensthum" type="number" min="0" max="100" value="<?php echo e($pref->gewensthum); ?>">


            <button type="submit">Submit</button>
            
        </form>
    </article>


</body>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</html><?php /**PATH /home/metspek/school/Ipmedt5/resources/views/templucht.blade.php ENDPATH**/ ?>