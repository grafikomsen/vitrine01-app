<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>E-mail</title>
    </head>
    <body>
        <h1>Vous avez reçu un mail</h1>
        <p>Prénom:      {{ $mailData['first_name'] }}</p>
        <p>Nom:         {{ $mailData['last_name'] }}</p>
        <p>E-mail:      {{ $mailData['email'] }}</p>
        <p>Tél:         {{ $mailData['phone'] }}</p>
        <p>Services:    {{ $mailData['subjet'] }}</p>
        <p>Message:     {{ $mailData['message'] }}</p>

        <p>Merci !</p>
    </body>
</html>
