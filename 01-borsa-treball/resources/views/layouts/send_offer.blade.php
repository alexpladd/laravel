<!doctype html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $details['subject'] }}</title>
</head>
<body>
    <h1>Oferta de feina</h1>
    <h4>{{ $details['title'] }}</h4>
    <strong>Empresa:</strong> {{ $details['name_company'] }}
    <br/>
    <strong>Anys d'experiència:</strong> {{ $details['experience'] }} any/s
    <br/>
    <strong>Salari anual:</strong> {{ $details['annual_salary'] }} € Brut/any
    <br/>
    <p></p>
    <strong>Descripció:</strong>
    <p>{{ $details['description'] }}</p>
    <br>
    <strong>Correu de l'empresa:</strong> {{ $details['email_company'] }}
</body>
</html>
