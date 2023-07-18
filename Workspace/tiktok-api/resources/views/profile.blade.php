<!DOCTYPE html>
<html>
<head>
    <title>Hồ sơ người dùng</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
         body {
                background-color: #f5f5f5;
            }
            .card {
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                transition: 0.3s;
                border-radius: 5px;
                margin-top: 50px;
                background-color: #fff;
            }
            .card:hover {
                box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            }
            .container {
                padding: 2px 16px;
            }
            .avatar {
                border-radius: 50%;
                width: 150px;
                height: 150px;
            }
            .profile-header {
                text-align: center;
                padding-top: 30px;
            }
            .profile-header h1 {
                font-size: 36px;
                margin-bottom: 10px;
            }
            .profile-header p {
                font-size: 18px;
                margin-bottom: 20px;
            }
            .edit-button {
                text-align: right;
            }
    </style>
</head>
<body>
    <div class="container">
        <div class="profile-header">
            <h1>Hồ sơ người dùng</h1>
            <p>Xem và chỉnh sửa thông tin hồ sơ của bạn</p> 
        </div>

        <div class="card">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif

            <img class="avatar" src="https://kenh14cdn.com/6IlWjk2rcfxxcccccccccccca3bMNy/Image/2012/03/120317tekthu-10_83cbe.jpg" alt="Avatar" required>
            <div class="container">
                <div class="edit-button">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">Edit</button>
                </div>
                <h3><b>Tên người dùng:</b> {{ $user['username'] }}</h3>
                <p><strong>Email:</strong> {{ $user['email'] }}</p>
                <p><strong>Ngày sinh:</strong> {{ $user['birthdate'] }}</p>
                <p><strong>Địa chỉ:</strong> {{ $user['address'] }}</p>
                <p><strong>Giới thiệu:</strong> {{ $user['bio'] }}</p> 
            </div>
        </div>
    </div>

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Các trường dữ liệu và các phần tử khác -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Chỉnh sửa hồ sơ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @method('PUT')
                        <div class="form-group">
                            <label for="username">Tên người dùng</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ $user['username'] }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user['email'] }}" required>
                        </div>
                        <div class="form-group">
                            <label for="birthdate">Ngày sinh</label>
                            <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ $user['birthdate'] }}" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ $user['address'] }}">
                        </div>
                        <div class="form-group">
                            <label for="bio">Giới thiệu</label>
                            <textarea class="form-control" id="bio" name="bio">{{ $user['bio'] }}</textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-success mt-2">Lưu thay đổi</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#editModal').on('show.bs.modal', function() {
                var form = $(this).find('form');
                form.find('input[name="username"]').val('{{ $user['username'] }}');
                form.find('input[name="email"]').val('{{ $user['email'] }}');
                form.find('input[name="birthdate"]').val('{{ $user['birthdate'] }}');
                form.find('input[name="address"]').val('{{ $user['address'] }}');
                form.find('textarea[name="bio"]').val('{{ $user['bio'] }}');
            });

            $('#profileForm').on('submit', function(event) {
                event.preventDefault();

                $.ajax({
                    url: "{{ route('profile.update') }}",
                    method: "POST",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            $('#editModal').modal('hide'); // Đóng modal
                            location.reload(); // Tải lại trang sau khi cập nhật thành công
                        }
                    }
                });
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
