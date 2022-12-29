<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .btn-link {
            border: none;
            background: none;
            text-decoration: underline;
            color: blue;
        }

        .btn-link:hover {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h2>Usando GET</h2>
    @foreach ($arquivos as $arquivo)
        <div>
            <a href="/downloading/{{ $arquivo->id }}">{{ $arquivo->nome }}</a>
        </div>
        <hr>
    @endforeach

    <h2>Usando POST</h2>
    @foreach ($arquivos as $arquivo)
        <form action="/downloading" method="post">
            @csrf
            <input type="number" name="id" value="{{ $arquivo->id }}" readonly hidden>
            
            <div>
                <button @class("btn-link") type="submit">{{ $arquivo->nome }}</button>
            </div>
        </form>
        <hr>
    @endforeach
</body>

</html>
