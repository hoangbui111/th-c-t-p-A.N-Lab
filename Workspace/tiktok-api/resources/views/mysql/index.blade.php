<?php
// Kết nối đến cơ sở dữ liệu
$connection = new PDO("mysql:host=http://127.0.0.1:8000/;dbname="tiktok", "tbl_user", "Tronghoang1*");

// Truy vấn dữ liệu
$query = "SELECT name FROM users";
$result = $connection->query($query);

// Hiển thị dữ liệu
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "Hello, " . $row['name'] . "!";
}

// Đóng kết nối đến cơ sở dữ liệu
$connection = null;
// sửa dữ liệu
<a herf="profile.blade.php"idTiktok=<?php eho $username; ?>">Sửa</a>
?>
