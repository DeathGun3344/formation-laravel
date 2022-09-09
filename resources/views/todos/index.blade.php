<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="row">
        <h3>Mes Todos <a href="{{ route('todos.create') }}" class="btn btn-sm btn-secondary">Créer</a></h3>
        <form method="get" action="{{ route('todos.index') }}">
            <button class="btn btn-sm btn-primary" type="submit" name="p">Tout</button>
            <button class="btn btn-sm btn-primary" type="submit" name="p" value="L">L</button>
            <button class="btn btn-sm btn-primary" type="submit" name="p" value="M">M</button>
            <button class="btn btn-sm btn-primary" type="submit" name="p" value="H">H</button>
        </form>
        <div class="col-12">
            <ul>
                @foreach($todos as $todo)
                    <li>
                        {{ $todo->label . ' - ' . $todo->priority }}
                        @if(!$todo->is_completed)
                            <form class="d-inline" method="post" action="{{ route('todos.update', ['todo' => $todo->id]) }}">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-info">Terminer</button>
                            </form>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
