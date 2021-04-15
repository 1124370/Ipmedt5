@extends('default')
@section('css')
<link rel="stylesheet" type="text/css" href="/css/schermen.css" />
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script>
   let app = @json($afstanden);
   let gemiddelde = @json($gemiddelde);

   console.log(gemiddelde);
   if (gemiddelde < 15) {
      modal.style.display = "flex";
      text.innerHTML = "Let op, je scherm zit te laag. Schuif hem naar boven voor de juiste afstand";
   } else if (gemiddelde > 25) {
      modal.style.display = "flex";
      text.innerHTML = "Let op, je scherm zit te hoog. Schuif hem omlaag voor een betere werkhouding. De bovenste rand van je scherm moet op ooghoogte zitten.";
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
@endsection
@section('content')
<main>
   <section class="heading">
      <article class="heading__article">
         <h1 class="heading__title">Dashboard</h1>
         <h3 class="heading__info">Decibel</h3>
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
            <h1 class="container__title">Afstanden tot scherm grafiek</h1>

            <canvas id="screenHeight"></canvas>
         </section>
         <section class="containerTable">
            <h1 class="container__title">Afstanden tot scherm tabel</h1>
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
               <button class="table__button"> <a class="button__text" href="/screenDistance">Scherm afstand</a></button>
               <button class="table__button"> <a class="button__text" href="/deskDistance">Bureau afstand</a></button>
            </section>
         </section>
      </section>
   </section>
</main>

@endsection