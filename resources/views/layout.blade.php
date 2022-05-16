<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>@yield('title')</title>
</head>
<body>
    <div class="container">
        <div class="lead" style="padding: 20px; border-radius:5px; background-color: #ddd; margin: 10px 0">
            <h1>@yield('title')</h1>
            @yield('btn-header')
        </div>

        @yield('conteudo')
    </div>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    @yield('script')
</body>
</html>