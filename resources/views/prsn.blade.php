<?php 
echo $plg;
?><br><br>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HAI</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/starter.css') }}">
</head>
<body class="bauk text-white">
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
</body>
</html>