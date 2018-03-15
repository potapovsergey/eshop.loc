/**
 * Created by user on 12.04.2017.
 */
jQuery('document').ready(function () {
    function showCart(cart) {
        $('#cart .modal-body').html(cart);
        $('#cart').modal();
    }

    $('.clear-cart').on('click',function () {
        $(this).each(function () {
            $.ajax({
                url: '/cart/clear',
                type: "POST",
                success: function(res){
                    if (!res) alert('Error');
                    $('#badge_cart').load('index.php #badge_cart');
                    showCart(res);
                },
                error: function () {
                    alert('Error');
                }
            });
        });
    });

    $('.delete-item').on('click',function (e) {
        $(this).each(function () {
            e.preventDefault();
            alert("!!");
            var id  = $(this).data('id');
            $.ajax({
                url: '/cart/delete',
                data: {id: id},
                type: "POST",
                success: function(res){
                    if (!res) alert('Error');
                    showCart(res);
                },
                error: function () {
                    alert('Error');
                }
            });
        });
    });

    $('.show-cart').on('click',function (e) {
        $(this).each(function () {
            e.preventDefault();
            $.ajax({
                url: '/cart/show',
                type: "POST",
                success: function(res){
                    if (!res) alert('Error');
                    showCart(res);
                },
                error: function () {
                    alert('Error');
                }
            });
        });
    });
    $('.cart_add').on('click',function (e) {
        $(this).each(function () {
            e.preventDefault();
            var id  = $(this).data('id'),
                count = 1;
            console.log(count);
            $.ajax({
                url: '/cart/add',
                data: {id: id, count: count},
                type: "POST",
                success: function(res){
                    if (!res) alert('Error');
                    $('#badge_cart').load('index.php #badge_cart');
                },
                error: function () {
                    alert('Error');
                }
            });
        });
    });

    $('.count_price').on('change', function (e){
        $(this).each(function(){
            var id  = $(this).data('id'),
                count = $(this).val(),
                price = $(this).data('value');
            $('#buy'+id).text(count*price);
            $('#buy'+id).append(
                `<span class="glyphicon glyphicon-shopping-cart"></span>`
            )

        });
    });

    $('.cart_add_count').on('click',function (e) {
        $(this).each(function () {
            e.preventDefault();
            var id  = $(this).data('id'),
                count = $('#count'+id).val();
            console.log(count);
            $.ajax({
                url: '/cart/add',
                data: {id: id, count: count},
                type: "POST",
                success: function(res){
                    if (!res) alert('Error');
                    $('#badge_cart').load('index.php #badge_cart');
                },
                error: function () {
                    alert('Error');
                }
            });
        });
    });
});

