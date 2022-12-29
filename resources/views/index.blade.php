<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <input type="file" name="arquivo" id="arquivo">
        </div>
        <div>
            <button type="submit">Enviar</button>
        </div>
    </form>
</body>
</html>