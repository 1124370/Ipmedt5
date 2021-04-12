<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <title>Document</title>
    <script src="js/reload-time.js"> </script>
</head>
<body>
    <section class="vakkenDashboard a-popup">
    
        <div>
            <h2>School Vakken</h2>
            <button onclick="createproduct()">Maak een nieuw vak aan</button>
                <div class="popup" >
                    <div class="popuptext" id="myPopup">
                    <form method="POST" action="/vakken" >
                        @csrf
                        <label for="naam">Naam</label>
                        <input name="naam" id="naam" type="text">

                        <label for="benodigetijd">benodigetijd</label>
                        <input name="benodigetijd" id="benodigetijd" type="number">

                        <button type="submit">Create vak</button>

                    </form> 
                    </div>
                </div>   
        </div>

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

        <button onclick="gotowork()">ga werken</button>
                <div class="popup" >
                    <div class="popuptext" id="gawerken">
                    <form method="POST" action="/vakken" >
                    <label for="werkvak">Naam</label>
                        <select name="werkvak" id="werkvak" >
                            @foreach($vakken as $vak)
                                <option value="{{$vak->naam}}">{{$vak->naam}}</option>
                            @endforeach
                        </select>

                        <button type="submit">Create vak</button>

                    </form> 
                    </div>
                </div> 

    </section>
</body>

</html>
