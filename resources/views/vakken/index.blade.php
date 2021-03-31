<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <title>Document</title>
</head>
<body>
    <section class="vakkenDashboard a-popup">
        <ul>
            @foreach($vakken as $vak)
                <li class="u-list-style-none">    
                {{$vak->naam}} {{$vak->id}}
                </li>
                <div class="vak__progressbar">
                    <div class="vak__progressbar_fill" width="%" style="height:24px;width:{{$vak->gewerktetijd}}%;">{{$vak->gewerktetijd}}%</div>
                </div><br>
            @endforeach
        </ul> 
    </section>
</body>
</html>