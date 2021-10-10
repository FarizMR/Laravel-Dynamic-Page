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
        <h2>Admin Dashboard</h2>
        <hr>
    </div>
    <div class="section p-5 mx-5 border">
        <h5>Create new page</h5>
        <form action="{{ url('/page/create')}}" method="POST">
            @csrf
            <div class="form-group row">
                <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-6">
                    <input name="title" type="text" class="form-control" id="inputTitle" placeholder="Title">
                </div>
            </div>
            <div class="form-group row mt-5">
                <input type="submit" value="Submit" class="col-sm-2 btn btn-outline-secondary">
            </div>
        </form>
    </div>

    <div class="section p-5 my-3 mx-5 border">
        <h5>Add page category</h5>
        <form action="{{ url('/category/create')}}" method="POST">
            @csrf
            <div class="form-group row">
                <label for="inputPage" class="col-sm-2 col-form-label">Page</label>
                <div class="col-sm-5">
                    <select name="page_id" id="inputPage">
                        @php
                            $var = new App\Http\Controllers\PageController;
                            $pages = $var->getAll();
                        @endphp
                        @foreach ($pages as $page)
                            <option value={{$page->id}}>{{$page->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-6">
                    <input name="title" type="text" class="form-control" id="inputTitle" placeholder="Title">
                </div>
            </div>
            <div class="form-group row mt-5">
                <input type="submit" value="Submit" class="col-sm-2 btn btn-outline-secondary">
            </div>
        </form>
    </div>

    <div class="section p-5 my-3 mx-5 border">
        <h5>Add category product</h5>
        <p class="text-muted"><i>To be added</i></p>
        {{-- <form action="{{ url('/product/create')}}" method="POST">

        </form> --}}
    </div>

    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
