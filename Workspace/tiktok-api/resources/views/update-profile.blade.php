@extends('profile')
@csrf
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Edit profile</h1>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route(profile.update)}}" class="btn btn-primary float-end">profile</a>
                    </div>
                </div>
            </div>
        </div>        
        <div class="card-body">
        <form method="POST" action="/profile/update">
            @csrf
            <div class="row">
                <div class="col-md-6">                  
                </div>
            </div>
            @method('POST')
            
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div>
            
            <div class="form-group">
                <label for="birthdate">Birthdate</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ $user->birthdate }}" required>
            </div>
            
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}">
            </div>
            
            <div class="form-group">
                <label for="bio">Bio</label>
                <textarea class="form-control" id="bio" name="bio">{{ $user->bio }}</textarea>
            </div>
            
            <div class="form-group">
                <label for="hobby">Hobby</label>
                <input type="text" class="form-control" id="hobby" name="hobby" value="{{ $user->hobby }}">
            </div>
            
            <button type="submit" class="btn btn-success mt-2">Save changes</button>
        </form>
    </div>
@endsection
            <a href="{{ route('profile.edit') }}">Edit Profile</a>
            <form action="{{ route('profile.delete') }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete Profile</button>
            </form>
            