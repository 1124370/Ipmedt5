@extends('default')
@section('css')
<link rel="stylesheet" type="text/css" href="/css/schermen.css" />
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script>
    window.onload = function() {
        // Get the modal
        const modal = document.getElementById("myModal");

        // Get the button that opens the modal
        const btn = document.getElementById("myBtn");
        const text = document.getElementById("modal__text");

        
        // Get the <span> element that closes the modal
        const span = document.getElementsByClassName("close")[0];
        let app = @json($afstanden);
        let gemiddelde = @json($gemiddelde);

        console.log(gemiddelde);
        if (gemiddelde < 70) {
            modal.style.display = "flex";
            text.innerHTML = "Let op, je bureau zit te laag. Schuif hem iets omhoog voor een betere werkhouding. Zorg ervoor dat je armleuning op gelijke hoogte zitten van je bureau";
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
        




// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
    }
    
</script>
@endsection
@section('content')

<main>
    <section class="heading">
        <article class="heading__article">
            <h1 class="heading__title">Dashboard</h1>
            <h3 class="heading__info">Scherm afstand</h3>
        </article>
    </section>
    <section id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <p class="modal__text" id="modal__text">hhhhhhhhh</p>
            <button class="modal__button" id="myBtn">Sluit</button>
        </div>


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
                <section class="button__wrapper">
                    <button class="table__button"> <a class="button__text" href="/screenHeight">Scherm hoogte</a></button>
                    <button class="table__button"> <a class="button__text" href="/screenDistance">Scherm afstand</a></button>
                </section>
            </section>
        </section>
    </section>
    </section>
</main>
@endsection