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

        input:focus, textarea:focus, select:focus {
            outline: none;
        }

        .form-control {
            margin-top: 1vw;
        }
    </style>
</head>

<body class="bg-light bg-gradient">

    <div class="section p-5">
        <h2>Admin Dashboard</h2>
        <a class="text-muted" href="{{ url('/landing') }}"><small>Redirrect to Landing page</small></a>
        <hr>
    </div>

    <div class="section p-5 mx-5 border bg-white">
        <h5>Create new page</h5>
        <form action="{{ url('/page/create') }}" method="POST">
            @csrf
            <div class="form-group row">
                <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-5">
                    <input name="title" type="text" class="form-control" id="inputTitle" placeholder="Title">
                </div>
            </div>
            <div class="form-group row mt-5">
                <input type="submit" value="Submit" class="col-sm-2 btn btn-outline-secondary">
            </div>
        </form>
    </div>

    <div class="section p-5 my-3 mx-5 border bg-white">
        <h5>Create new category</h5>
        <form action="{{ url('/category/create') }}" method="POST">
            @csrf
            <div class="form-group row">
                <label for="page" class="col-sm-2 col-form-label">Page</label>
                <div class="col-sm-5">
                    <select class="col-sm-6" name="page_id" id="pages_category">
                        @foreach ($pages as $page)
                            <option value="{{ $page->id }}">{{ $page->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-5">
                    <input name="title" type="text" class="form-control" id="inputTitle" placeholder="Title">
                </div>
            </div>
            <div class="form-group row mt-5">
                <input type="submit" value="Submit" class="col-sm-2 btn btn-outline-secondary">
            </div>
        </form>
    </div>

    <div class="section p-5 my-3 mx-5 border bg-white">
        <h5>Add product</h5>
        <form action="{{ url('/product/create') }}" method="POST">
            @csrf
            <div class="form-group row">
                <label for="page" class="col-sm-2 col-form-label">Page</label>
                <div class="col-sm-5">
                    <select class="col-sm-6" name="page_id" id="pages">
                        @foreach ($pages as $page)
                            <option value="{{ $page->id }}">{{ $page->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="category" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-5">
                    <select disabled class="col-sm-6" name="category_id" id="category">
                        <option value=""></option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Product name</label>
                <div class="col-sm-5">
                    <input name="name" type="text" class="form-control" id="inputName" placeholder="Product name">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-5">
                    <textarea  name="description" id="inputDescription"
                        class="form-control"
                        rows="3" placeholder="Describe the product"
                        style="resize:none;width:100%;border:dashed 2px orange"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-5">
                    <input name="price" type="text" class="form-control" id="inputPrice" placeholder="Product price">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputUnit" class="col-sm-2 col-form-label">Unit</label>
                <div class="col-sm-3">
                    <input name="unit" type="text" class="form-control" id="inputUnit" placeholder="qty, kg, m, litre">
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
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
        $(function() {
            $(document).ready(function() {
                $("form").attr('autocomplete', 'off');
                $("#pages_category").trigger("click");
                $("#pages").trigger("change");
            });

            $("#pages").change(function() {
                var url = "{{ route('page.category.show', ':page_id') }}";
                $.ajax({
                    url: url.replace(':page_id', $(this).val()),
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $("#category").prop("disabled", false);
                        $("#category").empty()
                        $.each(data, function(key, value) {
                            var option = "<option value='" + data[key]['id'] + "'>" +
                                data[key]['title'] + "</option>";
                            $("#category").append(option);
                        });

                        $("#category option:eq(0)").prop("selected",true);
                    },
                });
            });
        })
    </script>
</body>

</html>
