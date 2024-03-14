  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Masuk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head> 
<body>
    <form method="POST" action="{{ route('masuk')}}">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <h3>NIK : </h3>
          <input type="input" class="form-control" name="uy">
        </div>
        <div class="mb-3">
            <h3>PASS : </h3>
          <input type="password" class="form-control" name="ps">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        <button type="reset" class="btn btn-danger">Cancel</button>
      </form>
</body>
</html>