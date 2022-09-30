<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>{{ env('APP_NAME') }}@hasSection('title') - @yield('title')@endif</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <style>
            body {
                background: #f5f6f7;
            }

            #app {
                background: #fff;
                border: 1px solid #eee;
                border-radius: 5px;
                box-shadow: #eee 0 0 15px;
            }

            .label-required::after {
                content: "*";
                margin-left: 3px;
                color: #dc3545;
            }

            .table th.id {
                width: 75px;
            }

            .table th.timestamp {
                width: 175px;
            }
        </style>
    </head>
    <body>
        <div id="app" class="container mt-2">
            <div class="row my-2">
                <div class="col-12">
                    <a href="{{ route('notes.index') }}" class="btn btn-primary mb-2">Notities</a>
                    @if (request()->routeIs('notes.*') && ! request()->routeIs('notes.categories.*'))
                        <a href="{{ route('notes.create') }}" class="btn btn-primary mb-2">Notitie toevoegen</a>
                    @endif
                    <a href="{{ route('notes.categories.index') }}" class="btn btn-primary mb-2">Categorieën</a>
                    @if (request()->routeIs('notes.categories.*'))
                        <a href="{{ route('notes.categories.create') }}" class="btn btn-primary mb-2">Categorie toevoegen</a>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    @yield('content')
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    </body>
</html>
