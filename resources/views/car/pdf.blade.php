<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>>{{ ucfirst($car->name) }}-{{ $car->getMaker->name }}</title>
    <style>
        @font-face {
            font-family: 'Roboto Slab';
            src: url({{ asset('fonts/RobotoSlab-Regular.ttf') }});
            font-weight: normal;
        }

        @font-face {
            font-family: 'Roboto Slab';
            src: url({{ asset('fonts/RobotoSlab-Bold.ttf') }});
            font-weight: bold;
        }

        body {
            font-family: 'Roboto Slab';
        }

        div {
            margin: 7px;
            padding: 7px;
        }

        .main {
            font-size: 18px;
        }

        .about {
            font-size: 11px;
            color: gray;
        }

        .img img {
            height: 200px;
            width: auto;
        }

        .img .no-img {
            border: 1px solid #5b97e0;
            font-size: 30px;
            margin: 10px;
            padding: 10px;

        }

        .color {
            width: 120px;
            height: 120px;
            line-height: 95px;
            vertical-align: middle;
            text-align: center;
            margin: 12px;
            font-size: 25px;
            text-transform: uppercase;
        }
    </style>

</head>

<body>
    <h1>{{ $car->name }}</h1>
    <div class="master">Maker: {{ $car->getMaker->name }}</div>
    <div class="img">
        @if ($car->photo)
            <img src="{{ $car->photo }}" alt="{{ $car->name }}">
        @else
            <p>Image of <b>{{ $car->name }}</b> not found or type unknown.</p>
        @endif
    </div>
    <div class="size">Plate: <b>{{ $car->plate }}</b></div>
    <div class="about">{!! $car->about !!}</div>
</body>

</html>
