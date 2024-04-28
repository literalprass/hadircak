@include('layout.kp')

<a href="{{ url('/presensi') }}"class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-1 px-6 rounded-xl mb-8">kembali</a>

<br><br>

@foreach ($dt_izn as $i )

<div class="flex flex-row">
{{ $i->id }} |
{{ $i->DESC2 }} | 
{{ $i->alasan }} |
{{ $i->tgl }} |
{{ $i->approval }}
</div>

<div class="flex flex-row">
    <form action="{{ route('priz',['id'=>$i->ID_IZIN]) }}" method="POST" class="mr-2">
        @csrf
        @method('PATCH')

            <button  type="submit" class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-1 px-6 rounded-xl mb-8">Approve izin</button>
        
        </form>
        <form action="{{ route('hapusizin',['id'=>$i->ID_IZIN]) }}" method="POST">
            @csrf
            @method('delete')
            
                <button  type="submit" class="bg-red-600 hover:bg-red-800 text-white font-bold py-1 px-6 rounded-xl mb-8" onclick="return confirm('Apakah anda yakin akan menghapus Izin berikut?')">Delete Izin</button>
            
        </form>
</div>


@endforeach


@include('layout.kk')