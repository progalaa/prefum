/**
 * Created by Alaa on 8/3/2017.
 */


// toggle checkbox
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("input:checkbox").change(function () {
        var product_id = $(this).data('product');
        var status = $(this).data('status');

        $.ajax({
            type: 'POST',
            url: $("#url").val(),
            //headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {"product_id": product_id, "status": status},
            success: function (data) {
                if (data.data.success) {
                    //alert('success');
                }
            }
        });
    });


});


