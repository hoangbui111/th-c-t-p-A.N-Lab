$.ajaxSetup({
    Headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

function removeRow(id, url)
{
    if(confirm('Xóa phần này. Bạn có chắc ?')) {
        $.ajax({
            type: 'delete' ,
            datatype: 'JSON',
            data:  { id } ,
            url: url,
            success: function (result) {
                if (result.error == false) 
                {
                    alert(result.message);
                    location.reload();

                } else {
                    alert('Xóa xin vui lòng thử lại');
                }
            }
        })
    }
}


$('#upload').change(function(){
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);
    $.ajax({
        processData: false,
        contentType: false,
        tye: 'POST',
        dataType: 'JSON',
        data : form,
        url : '/upload/Services',
        sucesss: function (results) {
            console.log(results);
        }
    });
});
