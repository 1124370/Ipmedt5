window.onload = function () {

    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "dark2",
        title: {
            fontSize: 18,
            text: "Gemiddelde decibel waarde"
        },
        axisY: {
            title: "Decibel waardes"
        },
        data: [{
            type: "line",
            indexLabelFontSize: 16,
            dataPoints: [
                {y: {{$decibel[0]->waardes}} },
                {y: {{$decibel[1]->waardes}} },
                {y: {{$decibel[2]->waardes}} },
                {y: {{$decibel[3]->waardes}} },
                {y: {{$decibel[4]->waardes}} },
                {y: {{$decibel[5]->waardes}} },
                {y: {{$decibel[6]->waardes}} },
                {y: {{$decibel[7]->waardes}} },
                {y: {{$decibel[8]->waardes}} },
                {y: {{$decibel[9]->waardes}} }

            ]
        }]
    });
    chart.render();
    }
