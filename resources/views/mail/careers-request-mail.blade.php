<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Richiesta</title>
</head>
<body>
    
    <h1>E' arrivata una richiesta di lavoro, per il ruolo di {{ $info['role'] }}</h1>
    <p>Ricevuta da {{ $info['email'] }}</p>
    <h3>Messaggio:</h3>
    <p>{{$info['message']}}</p>
</body>
</html>