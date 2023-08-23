$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id, url) {
    console.log(url);
    if (confirm('Xóa phần này. Bạn có chắc ?')) {
        $.ajax({
            method: 'delete',
            dataType: 'JSON',
            data: { _token: $('meta[name="csrf-token"]').attr('content'), id: id },
            url: url,
            success: function (result) {
                if (result.error === false) {  
                    alert(result.message);
                    location.reload();
                } else {
                    alert('Xóa xin vui lòng thử lại');
                }
            }
        });
    }
}
function updateProduct(id) {
    const url = '/user/products/edit/' + id; // Thay đổi đường dẫn tới phần cập nhật danh mục
    const formData = {
        _token: $('meta[name="csrf-token"]').attr('content'),
        _method: 'PUT', // Đảm bảo bạn sử dụng phương thức PUT
        // Các dữ liệu cập nhật khác
    };

    // Gửi yêu cầu cập nhật danh mục
    $.ajax({
        method: 'POST', // Sử dụng POST vì bạn đã đặt _method là PUT
        dataType: 'JSON',
        data: formData,
        url: url,
        success: function (result) {
            if (result.error === false) {  
                alert(result.message);
                location.reload();
            } else {
                alert('Cập nhật thất bại. Vui lòng thử lại');
            }
        },
        error: function () {
            alert('Có lỗi xảy ra trong quá trình cập nhật. Vui lòng thử lại');
        }
    });
}


    // Xử lý sự kiện khi thay đổi input file
    $('#upload').change(function () {
        const form = new FormData();
        form.append('file', $(this)[0].files[0]);
        $.ajax({
            processData: false,
            contentType: false,
            method: 'POST',
            dataType: 'JSON',
            data: form,
            url: '/upload/Services',
            success: function (results) {
                console.log(results);
            }
        });
    });

    // Các mã JavaScript khác...

