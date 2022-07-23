<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hello <span class="contact">{{\Illuminate\Support\Facades\Session::has('name')?
                \Illuminate\Support\Facades\Session::get('name') : ''}}. Login Successfully</span></h1>
    <a href="{{route('update.edit', ['email' => $acc->email])}}">Change the pass</a>
</body>
</html>
