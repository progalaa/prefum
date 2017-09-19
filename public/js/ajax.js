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
            data: {"product_id": product_id, "status": status},
            success: function (data) {
                if (data.data.success) {
                    //alert('success');
                }
            }
        });
    });

    $("button#add_wishlist").click(function () {
        var product_id = $(this).data('product');
        var user_id = $(this).data('user');
        $.ajax({
            type: 'POST',
            url: $("#list_url").val(),
            data: {"product_id": product_id, "user_id": user_id},
            success: function (data) {

            }
        });
    });

    $("a#remove_wishlist").click(function () {
        var product_id = $(this).data('product');
        var user_id = $(this).data('user');
        var id = $(this).data('id');
        $.ajax({
            type: 'POST',
            url: $("#delete_url").val(),
            data: {"product_id": product_id, "user_id": user_id,"id":id},
            success: function (data) {
                if(data ==1){
                    location.reload();
                }
            }
        });
    });

    $("button#add_cart").click(function () {
        var product_id = $(this).data('product');
        var user_id = $(this).data('user');
        var qty = $("input#qty").val();
        $.ajax({
            type: 'POST',
            url: $("#cart_url").val(),
            data: {"product_id": product_id, "user_id": user_id,"qty":qty},
            success: function (data) {
                if(data ==1){
                    location.reload();
                }
            }
        });
    });

    $("a#remove_cart").click(function () {
        var product_id = $(this).data('product');
        var user_id = $(this).data('user');
        var id = $(this).data('id');
        console.log(id);
        $.ajax({
            type: 'POST',
            url: $("#delete_cart_item").val(),
            data: {"product_id": product_id, "user_id": user_id,"id":id},
            success: function (data) {
                if(data ==1){
                    location.reload();
                }
            }
        });
    });

    $("a#clear_cart").click(function () {
        var user_id = $(this).data('user');
        //console.log(user_id);
        $.ajax({
            type: 'POST',
            url: $("#clear_url").val(),
            data: {"user_id": user_id},
            success: function (data) {
                if(data ==1){
                    location.reload();
                }
            }
        });
    });

    $("a#update_cart").click(function () {
        var user_id = $(this).data('user');
        var total = $(this).data('total');
        //console.log(total);
        
        $.ajax({
            type: 'POST',
            url: $("#update_url").val(),
            data: {"user_id": user_id,"total":total},
            success: function (data) {
                if(data ==1){
                    location.reload();
                }
            }
        });
    });
    
    

    $("input.qty_change").on('change',function () {
        var product_id = $(this).data('product');
        var user_id = $(this).data('user');
        var id = $(this).data('id');
        var new_qty = $(this).val();
        console.log(new_qty);
       $.ajax({
            type: 'POST',
            url: $("#change_url").val(),
            data: {"product_id": product_id, "user_id": user_id,"new_qty":new_qty,"id":id},
            success: function (data) {
                if(data ==1){
                    location.reload();
                }
            }
        });
    });


});


