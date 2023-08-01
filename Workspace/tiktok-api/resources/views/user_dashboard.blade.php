<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
</head>
<body>
    <h1>Welcome, {{ $user->name }}!</h1>
    <p>Email: {{ $user->email }}</p>

    <!-- Hiển thị các thông tin cá nhân khác của người dùng -->

    <h2>Orders</h2>
    <ul>
        @foreach($user->orders as $order)
            <li>Order ID: {{ $order->id }}, Total: {{ $order->total }}</li>
        @endforeach
    </ul>

    <!-- Hiển thị danh sách các đơn hàng của người dùng -->

    <!-- Hiển thị các sản phẩm đã mua của người dùng -->

</body>
</html>
