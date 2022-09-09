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


<div class="container mt-5">
    <div class="col-6 offset-3">
        <form method="post" action="{{ route('todos.store') }}">
            @csrf
            <div class="form-group">
                <label class="form-label">Label</label>
                <input value="{{ old('label') }}" class="form-control" type="text" name="label">
                @error('label')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Priority</label>
                <select class="form-control" name="priority">
                    <option disabled selected>Choisissez une priorité</option>
                    @foreach($priorities as $priority)
                        <option @if(old('priority') == $priority) selected @endif value="{{ $priority }}">{{ $priority }}</option>
                    @endforeach
                </select>
                @error('priority')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary mt-2" type="submit">Enregistrer</button>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
