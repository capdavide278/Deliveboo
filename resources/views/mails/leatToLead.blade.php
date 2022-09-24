<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Ciao {{ $lead->name }}</h1>

    <p>Abbiamo ricevuto il tuo ordine: <br>
        {{-- {{ $lead->message }} --}}
        <br>
        Ti arriverà a casa all'ora richiesta.
    </p>
</body>
</html>
