<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Über uns - {{ $company }}</title>
</head>
<body>
    <h1>Über uns: {{ $company }}</h1>
    <p>{{ $description }}</p>
    <h2>Unsere Services:</h2>
    <ul>
        @foreach($services as $service)
            <li>{{ $service }}</li>
        @endforeach
    </ul>
   </body>
</html>
