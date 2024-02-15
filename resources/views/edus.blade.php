

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee's detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/starter.css') }}">
  </head>
  <body>

    <div class="container">
        <button class="btn btn-dark">
            <a href="{{ url('/') }}" class="nostyle">Back</a>
        </button>

        <div class="mb-4">
          <input type="input" class="form-control" name="v1" value="{{$taek->nama}}">
      </div>
      <div class="input-group mb-4">
          <label class="input-group-text" for="inputGroupSelect01">Departement</label>
          <select class="form-select" id="inputGroupSelect01" name="v2">
            <option selected>{{$taek->detil_dept}}</option>
            <option value="1001" >Illlustrator</option>
            <option value="1002">Developer</option>
            <option value="1003">Human resource</option>
          </select>
      </div>
      <div class="input-group mb-4">
          <label class="input-group-text" for="inputGroupSelect01">Shift</label>
          <select class="form-select" id="inputGroupSelect01" name="v3">
            <option selected>{{$taek->ket}}</option>
            <option value="1">Pagi</option>
            <option value="2">Siang</option>
            <option value="3">Malam</option>
          </select>
      </div>
    </div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  </body>
</html>