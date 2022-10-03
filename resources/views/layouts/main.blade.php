<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>{{ env('APP_NAME') }}@hasSection('title') &rsaquo; @yield('title')@endif</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/e5a9354bfe.js" crossorigin="anonymous"></script>
        @vite('resources/js/app.js')
    </head>
    <body>
        <div id="app" class="container mt-2 shadow rounded-3">
            <div class="row my-2">
                <div class="col-8">
                    <a href="{{ route('notes.index') }}" class="btn btn-primary mb-2">
                        <i class="fa fa-list"></i> Notities
                    </a>
                    <a href="{{ route('notes.categories.index') }}" class="btn btn-primary mb-2">
                        <i class="fa fa-list"></i> Categorieën
                    </a>
                </div>
                <div class="col-4">
                    <form action="{{ route('notes.search') }}" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Zoeken..." name="query" value="{{ $query ?? '' }}">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    @yield('content')
                </div>
            </div>
        </div>

        <div id="footer" class="container mt-2">
            <small class="float-end fst-italic">
                Written with ♥ by Kevin
            </small>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    </body>
</html>
