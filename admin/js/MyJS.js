$(document).ready(function () {


    function readFile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.readAsDataURL(input.files[0]);
            reader.onload = function (e) {
                var url = e.target.result;
                $('#anhDaiDien').attr('src', url);
            }

        }
    }

    $('input[name=anhDaiDien]').change(function(){
        console.log('ok');
        readFile(this);
    });

    var idLoadPost = $('input[name=productID]');
    // console.log(idLoadPost != null);
    if(idLoadPost!=null){
        $.ajax({
            url: "admin/products/getpost/" + $('input[name=productID]').val(),
            type: "get",
            success: function (data) {
                CKEDITOR.on("instanceReady", function(event)
                {
                    CKEDITOR.instances['productPost'].setData(data.post);
                });


                // window.location.assign(data.url);
                // $(':root').html(data);
            },
            error: function (data) {
                if(data.status === 422){
                    var errors = data.responseJSON.errors;
                    var html = '<div class="alert alert-danger"><ul>';
                    $.each(errors, function (key, value) {
                        html+='<li>'+value+'</li>';

                    })
                    html+='</ul></div>';
                    console.log(html);
                    $('.errors').html(html);
                    return;
                }
                console.log(data);
            }
        });
    }
    // Activate tooltip
    // $('[data-toggle="tooltip"]').tooltip();

    // Select/Deselect checkboxes

    $('body').on('click', '#selectAll', function () {
        var checkbox = $('table tbody input[type="checkbox"]');
        if (this.checked) {
            checkbox.each(function () {
                this.checked = true;
            });
        } else {
            checkbox.each(function () {
                this.checked = false;
            });
        }
    });
    $('body').on('click', 'table tbody input[type="checkbox"]', function () {
        if (!this.checked) {
            $("#selectAll").prop("checked", false);
        }
    });

    console.log('alo');
    $('.delete').click(function (e) {
        var name = $(this).parent().find('input[name=name]').val();
        var id = $(this).parent().find('input[name=id]').val();
        var isDelete = confirm('Bạn chắc chắn xóa sản phẩm ' + name);
        console.log('alo');
        if (!isDelete) {
            e.preventDefault();
        }

    });



    $('body').on('click', '.save', function () {
        // console.log($('input[name=anh]').val());
        console.log($('input[name=anhDaiDien]').prop('files')[0]);
        var dataForm = new FormData();
        dataForm.append('tenSP', $('input[name=tenSP]').val());
        dataForm.append('thuongHieu', $('select[name=thuongHieu]').val());
        dataForm.append('gioiTinh', $('select[name=gioiTinh]').val());
        dataForm.append('loaiDay', $('select[name=loaiDay]').val());
        dataForm.append('loaiVo', $('select[name=loaiVo]').val());
        dataForm.append('trangThaiSP', $('select[name=trangThaiSP]').val());
        dataForm.append('giaGoc', $('input[name=giaGoc]').val());
        dataForm.append('giaSale', $('input[name=giaSale]').val());
        dataForm.append('moTa', $('input[name=moTa]').val());

        $.each($("input[name=anhDaiDien]").prop('files'), function(i, file) {
            dataForm.append('anhDaiDien[]', file);
            console.log(file);
        });
        $.each($("input[name=anh]").prop('files'), function(i, file) {
            dataForm.append('anh[]', file);
            console.log(file);
        });
        // dataForm.append('anh[]', $('input[name=anh]').prop('files')[0]);

        dataForm.append('post', CKEDITOR.instances['productPost'].getData());

        var type = $('input[name=type]').val();
        if(type === 'add'){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "admin/products/add",
                type: "post",
                enctype: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                data: dataForm,
                success: function (data) {
                    console.log(data);
                    alert('Bạn đã thêm sản phẩm '+ data.status);
                    window.location.assign(data.url);
                    // $(':root').html(data);
                },
                error: function (data) {
                    if(data.status === 422){
                        var errors = data.responseJSON.errors;
                        var html = '<div class="alert alert-danger"><ul>';
                        $.each(errors, function (key, value) {
                            html+='<li>'+value+'</li>';

                        })
                        html+='</ul></div>';
                        console.log(html);
                        $('.errors').html(html);
                        return;
                    }
                    console.log(data);
                }
            });
        } else if(type === 'edit') {
            console.log('type edit');
            var id = $('input[name=productID]').val();
            dataForm.append('id', id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "admin/products/edit/"+id,
                type: "post",
                enctype: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                data: dataForm,
                success: function (data) {
                    console.log(data);
                    alert('Bạn đã sửa sản phẩm '+ data.status);
                    window.location.assign(data.url);
                    // $(':root').html(data);
                },
                error: function (data) {
                    if(data.status === 422){
                        var errors = data.responseJSON.errors;
                        var html = '<div class="alert alert-danger"><ul>';
                        $.each(errors, function (key, value) {
                            html+='<li>'+value+'</li>';

                        })
                        html+='</ul></div>';
                        console.log(html);
                        $('.errors').html(html);
                        return;
                    }
                    console.log(data);
                }
            });
        }

    });
    // function changeCategory (url, category) {
    //     var
    //     window.location.assign(url);
    // }
    CKEDITOR.replace('productPost', {
        height: 500
    });
});
