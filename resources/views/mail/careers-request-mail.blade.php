<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Richiesta</title>
    <style>
        body{
            font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif ;
        }
        h3{
            margin: 0;
            margin-top: 15px;
        }
        p{
            margin: 0;
        }
    </style>
</head>
<body>
    <h1>E' arrivata una richiesta di lavoro, per il ruolo di {{ $info['role'] }}</h1>
    <p>Ricevuta da {{ $info['email'] }}</p>
    <h3>Messaggio:</h3>
    <p>{{ $info['message'] }}</p>    
</body>
</html>





