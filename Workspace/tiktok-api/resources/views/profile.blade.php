<?php
    // Các biến kết nối CSDL
    $servername = "localhost";
    $username = "root";
    $password = "Tronghoang1*";
    $dbname = "tiktok";

    // Kết nối đến CSDL
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Kiểm tra nút "Lưu thay đổi" được nhấn hay chưa
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy dữ liệu từ form
        $username = $_POST["username"];
        $email = $_POST["email"];
        $birthdate = $_POST["birthdate"];
        $address = $_POST["address"];
        $bio = $_POST["bio"];
        $hobby = $_POST["hobby"];

        // Câu truy vấn SQL để cập nhật thông tin người dùng
        $sql = "UPDATE users SET username='$username', email='$email', birthdate='$birthdate', address='$address', bio='$bio', hobby='$hobby' WHERE id = 1"; // Thay đổi 'users' và 'id' tương ứng với cấu trúc CSDL của bạn

        // Thực thi truy vấn và kiểm tra kết quả
        if ($conn->query($sql) === TRUE) {
            echo "Cập nhật thông tin hồ sơ thành công.";
        } else {
            echo "Lỗi khi cập nhật hồ sơ: " . $conn->error;
        }
    }

    // Truy vấn dữ liệu người dùng từ CSDL
    $sql = "SELECT * FROM users WHERE id = 1"; // Thay đổi 'users' và 'id' tương ứng với cấu trúc CSDL của bạn
    $result = $conn->query($sql);

    // Kiểm tra kết quả truy vấn và gán dữ liệu người dùng vào biến $user
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "Không tìm thấy người dùng.";
    }

    // Đóng kết nối CSDL
    $conn->close();
    ?>
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
                @if (Session::has('thong bao'))
                    <div class="alert-alert-success">
                        {{Session::get('thongbao')}}
                    </div>
                @endif
                <img class="avatar" src="https://kenh14cdn.com/6IlWjk2rcfxxcccccccccccca3bMNy/Image/2012/03/120317tekthu-10_83cbe.jpg" alt="Avatar" required>
                <div class="container">
                    <div class="edit-button">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">Edit</button>
                    </div>
                    <h3><b>Tên người dùng:</b> <?php echo $user['username']; ?></h3>
                    <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
                    <p><strong>Ngày sinh:</strong> <?php echo $user['birthdate']; ?></p>
                    <p><strong>Địa chỉ:</strong> <?php echo $user['address']; ?></p>
                    <p><strong>Giới thiệu:</strong> <?php echo $user['bio']; ?></p> 
                </div>
            </div>
        </div>
    
        

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
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
            $('#profileForm').on('submit', function(event) {
                event.preventDefault();
                
                $.ajax({
                    url: "{{ route('profile.update') }}",
                    method: "PUT",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            // Cập nhật thành công
                            // Có thể thêm thông báo thành công hoặc tác vụ sau khi cập nhật vào đây
                        }
                    }
                });
            });
        });
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
    </html>