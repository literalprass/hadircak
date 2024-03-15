
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Masuk</title>
    <link rel="stylesheet" href="{{ asset('css/starter.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head> 
<body>

<div class="container bjg">
  @if(session('anjim'))
    <div class="alert alert-danger alert-dismissible mb-0" role="alert">
        {{ session('anjim') }}
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
  @endif
  @if(session('ahak'))
    <div class="alert alert-danger alert-dismissible mb-0" role="alert">
        {{ session('ahak') }}
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
  @endif

    <form method="POST" action="{{ route('home')}}">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <h4>NIK : </h4>
          <input type="input" class="form-control" name="uy">
        </div>
        <div class="mb-3">
            <h4>PASS : </h4>
          <input type="password" class="form-control" name="ps">
        </div>
        <div class="bwdhk">
          <button type="submit" class="btn btn-primary dlm">Login</button>
          <button type="reset" class="btn btn-danger dlm">Cancel</button>
        </div>
      </form>
</div>


      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>