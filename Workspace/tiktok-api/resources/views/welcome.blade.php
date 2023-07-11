<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
</head>
<body>
    <h1>Sign Up</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('welcome') }}" enctype="multipart/form-data">
        @csrf
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        <br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="birthdate">Birthdate</label>
        <input type="date" name="birthdate" id="birthdate" required>
        <br>
        <label for="avatar">Avatar</label>
        <input type="file" name="avatar" id="avatar" required>
        <br>
        <button type="submit">Register</button>
    </form>
</body>
</html>
