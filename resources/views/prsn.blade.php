<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presensi</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/starter.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bonjour.css') }}">
</head>
<body class="text-white wpr">

    @if (@session('absaw'))
        <div id="alert-1" class="flex items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div class="ms-3 text-sm font-medium">
            {{ session('absaw') }}
        </div>
          <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-1" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
      </div>        
    @endif

    <div class="flex flex-row">

        <form action="{{url('/prs')}}" method="POST" class="mr-2">
            @csrf
            <button type="submit"class="ckot bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-3 px-6 rounded-xl">
                    Absen
            </button>
        </form>

        <a href="{{url('/dash')}}">
            <button class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-3 px-6 rounded-xl">
                back
            </button>
        </a>

    </div>

    <br>
    
    <div class="relative overlfow-x-auto shadow-md sm:rounded-xl">
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