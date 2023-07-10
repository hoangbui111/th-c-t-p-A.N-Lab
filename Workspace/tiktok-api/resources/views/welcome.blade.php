<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h1>Hello, Users!</h1>
    <ul>
        @foreach($users as $user)
            <li>Hello, {{ $user->username }}!</li>
        @endforeach
    </ul>
</body>
</html>


 