@extends('afstanden.default')
@section('content')

<main>
    <section class="heading">
        <article class="heading__article">
            <h1 class="heading__title">Dashboard</h1>
            <h3 class="heading__info">Bureau afstand</h3>
        </article>
    </section>
    <section class="flex-container">

        <section class="u-grid-table">

            <section class="containerTable">
                <h1 class="container__title">Afstanden tot bureau grafiek</h1>

                <canvas id="screenHeight"></canvas>
            </section>
            <section class="containerTable">
                <h1 class="container__title">Afstanden tot bureau tabel</h1>
                <table class="table__afstanden" border="1">
                    <tr>
                        <td>Tijd</td>
                        <td>Afstand</td>
                        <td>Ideale afstand</td>
                    </tr>
                    @foreach($afstanden as $afstand)
                    <tr>
                        <td>{{$afstand['created_at']}}</td>
                        <td>{{$afstand['Afstand']}}</td>
                        <td>{{$afstand['Ideale_afstand']}}</td>
                    </tr>
                    @endforeach
                </table>
                <p>Als vuistregel moet je er een uitgestrekte arm tussen jou en je beeldscherm zitten.</p>
            </section>
            </section>
        </section>
    </section>
</main>

<script>
    let app = @json($afstanden);
    let gemiddelde = @json($gemiddelde);
    console.log(gemiddelde);
    if (gemiddelde < 40 || gemiddelde > 60) {
        alert("Let op! Je huidige afstand is onvoldoende. Pas je houding aan.");
    }
    let yValues = [
        app[0].Afstand,
        app[1].Afstand,
        app[2].Afstand,
        app[3].Afstand,
        app[4].Afstand,
        app[5].Afstand,
        app[6].Afstand,
        app[7].Afstand,
        app[8].Afstand,
    ];
    let xValues = [
        app[0].created_at.substr(11, 8),
        app[1].created_at.substr(11, 8),
        app[2].created_at.substr(11, 8),
        app[3].created_at.substr(11, 8),
        app[4].created_at.substr(11, 8),
        app[5].created_at.substr(11, 8),
        app[6].created_at.substr(11, 8),
        app[7].created_at.substr(11, 8),
        app[8].created_at.substr(11, 8),
    ];

    new Chart("screenHeight", {
        type: "line",
        data: {
            labels: xValues,
            lineColor: "#7f22ea",
            datasets: [{
                backgroundColor: 'rgb(255, 99, 132)', //chart kleur
                borderColor: "rgba(255, 255, 255)", //lijn kleur

                data: yValues,
                height: 50,

            }]
        },
        options: {
            maintainAspectRatio: false,
            legend: {
                labels: {
                    fontColor: 'rgba(255, 255, 255)'
                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        fontColor: 'rgba(255, 255, 255)'
                    },
                }],
                xAxes: [{
                    ticks: {
                        fontColor: 'rgba(255, 255, 255)'
                    },
                }]
            }

        },

    });
    screenHeight.style.backgroundColor = 'rgba(82, 94, 112)';
</script>

</html>