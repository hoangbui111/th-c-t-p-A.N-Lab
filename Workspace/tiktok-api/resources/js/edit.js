$(document).ready(function() {
    $('#editForm').on('submit', function(event) {
        event.preventDefault();

        // Lấy dữ liệu từ form
        var formData = $(this).serialize();

        // Gửi yêu cầu chỉnh sửa thông qua AJAX
        $.ajax({
            url: '/update-profile', // Đường dẫn xử lý yêu cầu chỉnh sửa
            method: 'PUT', // Phương thức PUT
            data: formData,
            success: function(response) {
                // Xử lý phản hồi thành công
                alert('Profile updated successfully');
            },
            error: function(xhr) {
                // Xử lý lỗi
                alert('Error updating profile: ' + xhr.statusText);
            }
        });
    });
});
