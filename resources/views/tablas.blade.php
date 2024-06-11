<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach ($tablas as $tabla )
        <h2>{{ $tabla['tabla'] }}</h2>
        <ul>
            @foreach ($tabla['multiplos'] as $multiplo)
                <li>{{ $multiplo }}</li>
            @endforeach
        </ul>
    @endforeach
</body>
</html>
