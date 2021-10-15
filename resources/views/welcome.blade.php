<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    {{-- Bootstrapp CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
        }

        .form-control {
            margin-top: 1vw;
        }

    </style>
</head>

<body>
    <div class="container px-5">
        <div class="col-lg-6 order-lg-2">
            <div class="p-5">
                <h2>Barcode that you can access:</h2>
                {{ QrCode::size(300)->eyeColor(0, 50, 50, 255, 0, 0, 0)->style('round')->generate('http://localhost:8000/landing') }}

                <div class="my-2">
                    <a class="text-muted" href="{{url('/landing')}}"><h5>Landing page</h5></a>
                </div>
            </div>
        </div>
    </div>

    <div id="app">
        <app></app>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
