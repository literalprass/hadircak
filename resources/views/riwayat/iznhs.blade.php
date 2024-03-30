@include('layout.kp')

<a href="{{ url('/presensi') }}"class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-1 px-6 rounded-xl mb-8">kembali</a>

<br><br>

@foreach ($dt_izn as $i )

{{ $i->id }} <br>
{{ $i->DESC2 }} <br>
{{ $i->alasan }} <br>
{{ $i->approval }} <br>

<form action="{{ route('priz',['id'=>$i->ID_IZIN]) }}" method="POST">
@csrf
@method('PATCH')

    <button  type="submit" class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-1 px-6 rounded-xl mb-8">Approve izin</button>

</form>

@endforeach


@include('layout.kk')