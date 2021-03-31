<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/main.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"> 
    <title>Aanwezig</title>
</head>
<body>
    <main class="main">
        <section class="main__titleWrapper">
            <h1 class="main__title">Telefoonhouder</h1>
        </section>
        
        <article class="main__card">
                <h2 class="main__tijd" id="js--tijd">00:00:00</h2>

                <h3 class="main__tekst">Telefoon is</h3>
                <h3 class="main__tekst main__tekst--aanwezig">{{$show}}</h3>
                <h3 class="main__tekst">aanwezig</h3>

                <section class="main__buttonContainer">
                    <button class="main__button">Noodgeval</button>
                </section>
        </article>
    </main>
</body>
</html>















<!-- <h1>Telefoon is {{$show}} aanwezig</h1> -->