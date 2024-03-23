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
    <a href="{{url('/dash')}}">
    <button>
        back
    </button>
    </a>

    <form action="{{url('/prs')}}" method="POST">
    @csrf
        <button type="submit">
            Absen
        </button>
    </form>
</body>
</html>