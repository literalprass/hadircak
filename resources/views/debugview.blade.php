<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/starter.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
    <title>Dasbor Karyawan</title>
</head>
<body class="kicik">

  @if(session('suksex'))
    <div class="alert alert-success alert-dismissible mb-0" role="alert">
        {{ session('suksex') }}
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
  @endif

    <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark"">
        <div class="navteng">
          <a class="navbar-brand fw-bold" href="#"><i>Hadir Cak!</i></a>
        </div>
    </nav>

    <label class="cik"><b>Data Karyawan</b></label>
    <button class="btn btn-dark csbt1"><a class="nostyle" href="/create">Tambah</a></button>
    <div class="contol">
      <table class="bung table">
        <thead>
          <tr class="table-dark">
            <th scope="col">ID</th>
            <th scope="col">NAMA</th>
            <th scope="col">DEPT</th>
            <th scope="col">SHIFT</th>
            <th scope="col">ACTION</th>

          </tr>
        </thead>
        <tbody class="table-secondary">
          @foreach($taek as $p)
          <tr>
            <td><b>{{ $p->id }}</b></td>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->nama_dept }}</td>
            <td>{{ $p->ket }}</td>
            <td>
              <button class="btn btn-dark aksi">
                <a href="/edit/{{ $p->id }}" class="nostyle">Edit</a>
              </button> 

              <form method="POST" action="{{ route('delete', ['id' => $p->id]) }}" onsubmit="return confirm('Apakah anda yakin untuk menghapus Karyawan atas nama {{$p->nama}}?')">
              @csrf
              @method('DELETE')

              <input type="submit" value="Delete" class="btn btn-danger aksi">

              </form>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>