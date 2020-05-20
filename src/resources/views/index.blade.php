<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HTTP query logger') }}</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"></head>
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
<body style="font-family: 'Nunito', sans-serif;font-size: 0.9rem;line-height: 1.6">
    <div class="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'HTTP query logger') }}
                </a>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="w-100 d-flex justify-content-between">
                    <h3 class="text-center">'HTTP query logger'</h3>
                    <form method="GET" action="{{ route('http-query-logger.index') }}">
                        <div class="form-group">
                            <input class="datepicker" name="date" value="{{ $date }}">
                            <input type="submit" class="btn btn-info" value="Show">
                        </div>
                    </form>
                    <form method="POST" action="{{ route('http-query-logger.deletelogs') }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div class="form-group">
                            <input type="submit" class="btn btn-danger delete-logs" value="Delete Logs">
                        </div>
                    </form>
                </div>
                <div class="list-group">
                    @forelse ($logs as $key => $log)
                    <div class="list-group-item list-group-item-action" style="margin:5px">
                        <div class = "row w-100">
                            <span class="col-md-3">
                                @if ($log->response>400)
                                    <button class="btn btn-danger font-weight-bold">{{$log->method}}</button>
                                @elseif($log->response>300)
                                    <button class="btn btn-info font-weight-bold">{{$log->method}}</button>
                                @else
                                    <button class="btn btn-{{$log->method=="GET"? "primary" : "success"}} font-weight-bold">{{$log->method}}</button>
                                @endif

                                <small class="col-md-2">
                                    <b>{{$log->response}}</b>
                                </small>
                            </span>
                            <large class= "col-md-3"><b>Duration : </b>{{$log->duration * 1000}}ms</large>
                            <large class= "col-md-3"><b>Date : </b>{{$log->created_at}}</large>
                            <p class="col-md-3 mb-1"><b>IP :</b> {{$log->ip}}</p>
                        </div>
                        <hr>
                        <div class="row w-100">
                            <p class="col-md-3 mb-1">
                                <b>URL : </b>{{$log->url}}</br>
                            </p>
                            <p class="col-md-6 mb-1"><b>Models(Retrieved) :</b> {{$log->models}}</p>
                        </div>
                        <div class="row w-100">
                                <p class="col-md-3">
                                    <b>Method :</b>   {{$log->action}}
                                </p>
                                <p class="col-md-3 mb-1"><b>Payload : </b>{{$log->payload}}</p>

                                <p class="col-md-6">
                                    <b>Controller :</b> {{$log->controller}}

                                </p>

                        </div>
                    </div>
                    @empty
                    <h5>
                      No Records
                    </h5>
                  @endforelse

                </div>
            </div>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(function() {
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd'
            });
        });
    </script>
</body>
</html>

