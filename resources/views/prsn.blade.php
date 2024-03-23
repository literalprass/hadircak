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
    @vite('resources/css/app.css')
</head>
<body>
    <div>
        <a href="{{url('/dash')}}">
            <button class="bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-lg">
                back
            </button>
            </a>
        
            <form action="{{url('/prs')}}" method="POST">
            @csrf
                <button type="submit"class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg">
                    Absen
                </button>
            </form>
    </div>
</body>
</html>