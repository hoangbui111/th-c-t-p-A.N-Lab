<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
        }
        .avatar-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }
        .avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }
        .file-upload {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }
        .file-upload input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
        }
        .file-upload-label {
            padding: 8px 12px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .file-upload-label:hover {
            background-color: #0069d9;
        }
        .file-upload-text {
            margin-left: 10px;
        }
        .form-control-error {
            border-color: #dc3545;
        }
        .form-control-error::placeholder {
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="avatar-container">
            <img class="avatar" src="https://cdn-icons-png.flaticon.com/512/824/824727.png" alt="Avatar" required>
        </div>
        <h1 class="text-center">Sign Up</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="birthdate">Birthdate:</label>
                <input type="date" class="form-control" name="birthdate" id="birthdate" required>
            </div>
            <div class="form-group">
                <label for="avatar">Avatar:</label>
                <div class="file-upload">
                    <label class="file-upload-label">
                        <input type="file" class="file-upload-input" name="avatar" id="avatar" required>
                        <span class="file-upload-text">Choose File</span>
                    </label>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Sign Up</button>
            </div>
        </form>
    </div>
</body>
</html>