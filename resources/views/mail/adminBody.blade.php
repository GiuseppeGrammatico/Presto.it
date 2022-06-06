<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Caro amministratore.</h1>
    <p>L'utente:</p>
    <ul>
        <li> {{$user_contact['name']}} {{$user_contact['surname']}}</li>
        <li> {{$user_contact['email']}} </li>
    </ul>
    <p>Chiede l'autorizzazione a diventare un utente revisore con la seguente descrizione:</p>
    <p> <em> {{$user_contact['aboutYou']}} </em> <p>

</body>
</html>