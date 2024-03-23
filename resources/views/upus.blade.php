

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/starter.css') }}">
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">

  </head>
  <body class="bauk">
    
    <div class="card bg-dark text-light hal">
      <div class="card-body">
        <div class="container">
      
          <div class="cihuy mt-4">
            <label class="todd">Tambah data Pegawai</label>
              <button class="btn btn-warning mb-3">
                <a href="{{ url('/dash') }}" class="reng">Back</a>
              </button>
            </div>
          <hr class="wohh rounded">
            <br>
  
  
        <form method="POST" action="{{ url('/post') }}">
        @csrf
          <div class="mb-4">
              <input type="input" class="form-control" name="v1" placeholder="nama">
          </div>
          <div class="input-group mb-4">
              <label class="input-group-text" for="inputGroupSelect01">Departement</label>
              <select class="form-select" id="inputGroupSelect01" name="v2">
                <option selected>Pilih...</option>
                <option value="1001" >Illlustrator</option>
                <option value="1002">Developer</option>
                <option value="1003">Human resource</option>
              </select>
          </div>
          <div class="input-group mb-4">
              <label class="input-group-text" for="inputGroupSelect01">Shift</label>
              <select class="form-select" id="inputGroupSelect01" name="v3">
                <option selected>Pilih...</option>
                <option value="1">Pagi</option>
                <option value="2">Siang</option>
                <option value="3">Malam</option>
              </select>
          </div>
          <div class="input-group mb-4">
              <label class="input-group-text" for="inputGroupSelect01">Kelas</label>
              <select class="form-select" id="inputGroupSelect01" name="v4">
                <option selected>Pilih...</option>
                <option value="1">Admin</option>
                <option value="2">Mentor</option>
                <option value="4">Karyawan</option>
                <option value="5">Training</option>
              </select>
          </div>
          <br><br>
        
        <input type="submit" value="Update" class="btn btn-primary yh">
        <input type="reset" value="Cancel" class="btn btn-danger yh">
      </div>
  
    </form>
      </div>
    </div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  </body>
</html>