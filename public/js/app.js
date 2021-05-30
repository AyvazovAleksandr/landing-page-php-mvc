$(document).ready(function() {
    $.ajax({
        url: '/comments/all',
        type: 'GET',
        success: function(data) {
            let response = JSON.parse(data);
            $("#list_comments").prepend(response.html);
        },
        error: function (data) {
            return false;
        }
    });

});

$('#submit_comment').click(function () {
    let user_name = $("#user_name").val();
    let email = $("#user_email").val();
    let title = $("#post_title").val();
    let comment = $("#post_comment").val();

    if ((!user_name) || (!user_name.trim().length)) {
        $('#alert_user_name').show();
        return false;
    }

    if (!validateEmail(email)) {
        $('#alert_user_email').show();
        return false;
    }

    if ((!email) || (!email.trim().length)) {
        $('#alert_user_email').show();
        return false;
    }

    if ((!title) || (!title.trim().length)) {
        $('#alert_user_title').show();
        return false;
    }

    if ((!comment) || (!comment.trim().length)) {
        $('#alert_user_comment').show();
        return false;
    }

    let data = {
        user_name: user_name,
        email: email,
        title: title,
        comment: comment
    };
    $.ajax({
        url: '/comments/add',
        headers: {
            'Cache-Control': 'no-cache, no-store, must-revalidate',
            'Pragma': 'no-cache',
            'Expires': '0'
        },
        type: 'POST',
        data: data,
        success: function (data) {
            let response = JSON.parse(data);
            $("#list_comments").prepend(response.html);
            $("#user_name").val('');
            $("#user_email").val('');
            $("#post_title").val('');
            $("#post_comment").val('');
        },
        error: function (data) {
            $('#alert_ajax_error').show();
            return false;
        }
    });
});

$('button.close').click(function () {
    $(this).parent().hide();
});

function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}