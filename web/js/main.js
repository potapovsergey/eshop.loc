/**
 * Created by user on 12.04.2017.
 */

function showLogin(form) {
    $('#log-in .modal-body').html(form);
    $('#log-in').modal();
}

$('.btn-log-in').on('click',function (e) {
    $(this).each(function () {
        e.preventDefault();
        $.ajax({
            url: '/main/login',
            type: "POST",
            success: function(res){
                if (!res) alert('Error');
                showLogin(res);
            },
            error: function () {
                alert('Error');
            }
        });
    });
})

$('.btn-goods-view').on('click',function (e) {
    $(this).each(function () {
        e.preventDefault();
        var id = $(this).data('id');
        $('#'+id).modal();
    });
});

$('.add_characteristics').on('click',function (e) {
    $(this).each(function () {
        e.preventDefault();
        $('#characteristics').modal();
    });
});

$('.btn-reg-on').on('click',function (e) {
    $(this).each(function () {
        e.preventDefault();
        document.location.href = '/main/reg';
    });
});

