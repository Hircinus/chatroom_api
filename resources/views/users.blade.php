<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <script src="" async defer></script>
        <h1>Users list</h1>
        <ul>
            @foreach($users as $user)
                <li>{{$user->name}}</li>
            @endforeach
        </ul>
    </body>
</html>