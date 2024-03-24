<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presensi</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/starter.css') }}">
</head>
<body class="text-white wpr">

    <div class="flex flex-row">

        <form action="{{url('/prs')}}" method="POST" class="mr-2">
            @csrf
            <button type="submit"class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-xl">
                    Absen
            </button>
        </form>

        <a href="{{url('/dash')}}">
            <button class="bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-xl">
                back
            </button>
        </a>

    </div>

    <br>
    
    <div class="relative overlfow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
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
            </tbody>
        </table>
    </div>

    
    @vite('resources/js/app.js')
</body>
</html>