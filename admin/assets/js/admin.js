$(document).ready(function() {
    $(".sidebar-dropdown > a").click(function() {
        $(".sidebar-submenu").slideUp(200);
        if (
            $(this)
            .parent()
            .hasClass("active")
        ) {
            $(".sidebar-dropdown").removeClass("active");
            $(this)
                .parent()
                .removeClass("active");
        } else {
            $(".sidebar-dropdown").removeClass("active");
            $(this)
                .next(".sidebar-submenu")
                .slideDown(200);
            $(this)
                .parent()
                .addClass("active");
        }
    });

    $("#close-sidebar").click(function() {
        $(".page-wrapper").removeClass("toggled");
    });
    $("#show-sidebar").click(function() {
        $(".page-wrapper").addClass("toggled");
    });

    $('#desc').summernote({
        placeholder: 'Nhập thông tin chi tiết sản phẩm....'
    });

    $("#input-res-1").fileinput({
        uploadUrl: "./uploads",
        maxFileCount: 15,
        validateInitialCount: true,
        enableResumableUpload: true,
        resumableOptions: {
            maxThreads: 3
        },
        theme: 'fas',
        fileActionSettings: {
            showZoom: function(config) {
                if (config.type === 'image') {
                    return true;
                }
                return false;
            }
        }

    });

    //     responsive: true,
    //     className: 'dt-body-center',
    //     "pageLength": 50
    // });

    // var table = $('.table').DataTable();
    // var row;
    // var id = "";
    // $.fn.setEventChangePage = function() {

    //     $(".btn-delete").click(function(event) {
    //         row = table.row($(this).parents('tr'));
    //         id = row.data()[0];
    //     });
    //     $(".btn-edit").click(function(event) {
    //         row = table.row($(this).parents('tr'));
    //         id = row.data()[0];
    //         $('#idType').val(id);
    //     });
    // }


    // $.fn.setEventChangePage();
    // $('.paginate_button').on('click', function() {
    //     $.fn.setEventChangePage();
    // });



    // $("#btn-addType").click(function(event) {
    //     $.ajax({
    //         url: "admin_typeProducts.php",
    //         type: "POST",
    //         cache: false,
    //         data: { addType: $("#addType").val() }
    //     });
    //     $('#addModal').modal('hide');
    // });


})


function preview_image() {
    var total_file = document.getElementById("upload_file").files.length;
    for (var i = 0; i < total_file; i++) {
        $('#image_preview').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "'><br>");
    }
}