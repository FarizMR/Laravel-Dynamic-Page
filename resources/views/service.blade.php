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

    </style>
</head>

<body>
    <div class="section d-flex p-5">
        <h2>{{ $page->title }}</h2>
    </div>
    @foreach ($page->category as $category)
        <div class="section px-5 py-2">
            <h4>{{ $category->title }}</h4>
            <hr>
            @foreach ($category->product as $product)
                <div class="card m-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Rp {{ $product->price }}</h6>
                        <p class="card-text">{{ $product->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
    {{-- <div class="section d-flex p-5">
        @foreach ($pages as $page)
        <div class="card m-3">
            <div class="card-body">
                <h5 class="card-title">{{ $page->title }}</h5>
                <a href="{{url('/page/'.$page->slug)}}">The Link</a>
            </div>
        </div>
        @endforeach
    </div> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
