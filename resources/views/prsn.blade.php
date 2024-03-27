@include('layout.kp')
    @include('sess.absawscs')
    @include('sess.absakscs')

    <div class="flex flex-row">

        <form action="{{url('/prs')}}" method="POST" class="mr-2">
            @csrf
            <button type="submit"class="ckot bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-3 px-6 rounded-xl">
                    Absen
            </button>
        </form>

        <a href="{{url('/izin')}}" class="mr-2">
            <button class="ckot bg-gray-600 hover:bg-gray-700 text-white font-bold py-3 px-6 rounded-xl">
                Input izin
            </button>
        </a>

        <a href="{{url('/dash')}}">
            <button class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-3 px-6 rounded-xl">
                Back
            </button>
        </a>

    </div>

    <br>
    
    <div class="relative overlfow-x-auto shadow-md sm:rounded-xl">
        <table class="w-full text-sm rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-4">
                        Keterangan
                    </th>
                    <th scope="col" class="px-6 py-4">
                        NIK
                    </th>
                    <th scope="col" class="px-6 py-4">
                        Absen Masuk
                    </th>
                    <th scope="col" class="px-6 py-4">
                        Absen Pulang
                    </th>
                    <th scope="col" class="px-6 py-4">
                        Tanggal
                    </th>
                </tr>
            </thead>
            <tbody>
               @foreach ($plg as $p)
               <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $p->abs_log }}
                    </th>
                    <th class="px-6 py-4">
                        {{ $p->id }}
                    </th>
                    <th class="px-6 py-4">
                        {{ $p->abs_awal }}
                    </th>
                    <th class="px-6 py-4">
                        {{ $p->abs_akhir }}
                    </th>
                    <th class="px-6 py-4">
                        {{ $p->tgl }}
                    </th>
                </tr>
                
               @endforeach
               <tr class="text-xs text-blue-300 uppercase bg-gray-50 dark:bg-gray-700 dark:blue-gray-400">
                <th scope="col" class="px-6 py-4 underline hover:text-blue-100"> 
                    <a href="{{url('riwayat/izin')}}">Riwayat izin</a>
                </th>
                <th scope="col" class="px-6 py-4">
                    &nbsp;
                </th>
                <th scope="col" class="px-6 py-4">
                    &nbsp;
                </th>
                <th scope="col" class="px-6 py-4">
                    &nbsp;
                </th>
                <th scope="col" class="px-6 py-4">
                    &nbsp;
                </th>
            </tr>
            </tbody>
        </table>
    </div>
@include('layout.kk')