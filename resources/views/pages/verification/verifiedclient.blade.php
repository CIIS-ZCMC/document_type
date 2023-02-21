
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('dist/css/card.css') }}"/>
    <title>Verified </title>
    <Style>
        @import url('https://fonts.googleapis.com/css2?family=Andika&family=Montserrat:wght@100;200&family=Poppins:ital,wght@0,200;0,300;1,100&display=swap');
        body{
            background-color: #1e3a8a;
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        .container{
            background-color: white;
            margin: 20px 300px;
            padding:50px;
            text-align: center;
            border-radius: 20px;
            height: 100vh;
        }
        h1{
            font-size: 35px;
            margin: 0 0 50px 0;
            padding: 0;
            font-family: 'Montserrat', sans-serif;
        }
        .id-img{
            height: 90vh;
        }
    </Style>
</head>
<body>
    <div class="container">
        <h1>Verified</h1>
        {{-- <img class="verified-svg" src="{{ url('dist/images2/service/verified.svg') }}" alt=""> --}}
        <img class="id-img" src="{{ asset('/').$verifclient->identification}}" alt="">

        
</div>
    </div>
    
</body>
</html>

