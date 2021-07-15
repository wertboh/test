$(document).ready(function () {
    $("#submitbtn").click(function () {
        ajaxPageOfProduct("result_form", "comment_on_product", "insertComment.php");

        return false;
    });
});

function ajaxPageOfProduct(result_form, comment_on_product, url) {
    let data = new FormData();
    let dataForm = $("#" + comment_on_product).serializeArray()
    let count_error = 0;
    let use_rating = false
    for (i = 0; i < dataForm.length; i++) {
        if (dataForm[i].name === 'email' && !dataForm[i].value.match(/[0-9a-z]+@[a-z]/)) {
            $("#massage_email_format").html("Error. Please enter correct email");
            count_error++;
        } else if (dataForm[i].name === 'email') $("#massage_email_format").html('')

        if (dataForm[i].name === 'email' && !dataForm[i].value) {
            $("#massage_email_exist").html("Error. Please enter email");
            count_error++;
        } else if (dataForm[i].name === 'email') $("#massage_email_exist").html('')

        if (dataForm[i].name === 'nameUser' && !dataForm[i].value) {
            $("#massage_nameUserExist").html("Error. Please enter name");
            count_error++;
        } else if (dataForm[i].name === 'nameUser') $("#massage_nameUserExist").html('')

        if (dataForm[i].name === 'nameUser' && dataForm[i].value.length < 6) {
            count_error++;
            $("#massage_nameUserSize").html("Error. Minimum 6 characters");
        } else if (dataForm[i].name === 'nameUser') $("#massage_nameUserSize").html('')

        if (dataForm[i].name === 'rating') use_rating = true

        if (dataForm[i].name === 'comment' && dataForm[i].value.length > 1000) {
            count_error++;
            $("#massage_comment").html("Error. Maximum 1000 characters");
        } else if (dataForm[i].name === 'rating') $("#massage_comment").html('')
    }

    if ($('#file')[0].files.length > 5) {
        count_error++;
        $("#massage_file").html("Error. Maximum 5 photo");
    } else $("#massage_file").html('')

    if (!use_rating) {
        $("#massage_rating").html("Error. Please choose rating");
        count_error++;
    } else $("#massage_rating").html('')

    if (count_error === 0) {
        for (i = 0; i < dataForm.length; i++) {
            data.append(dataForm[i]['name'], dataForm[i]['value'])
        }
        jQuery.each($('#file')[0].files, function (i, file) {
            data.append('picture[]', file);

        });

        $.ajax({
            url: url,
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            success: function (response) {
                response = JSON.parse(response)
                if (!response.data) {
                    if (response.emailFormat === true) {
                        $("#massage_email_format").html("Error. Please enter correct email");
                    }
                    if (response.emailEmpty === true) {
                        $("#massage_email_exist").html("Error. Please enter email");
                    }
                    if (response.nameUserEmpty === true) {
                        $("#massage_nameUserExist").html("Error. Please enter name");
                    }
                    if (response.nameUserSize === true) {
                        $("#massage_nameUserSize").html("Error. Minimum 6 characters");
                    }
                    if (response.rating === true) {
                        $("#massage_rating").html("Error. Please choose rating");
                    }
                    if (response.comment === true) {
                        $("#massage_comment").html("Error. Maximum 1000 characters");
                    }
                } else if (response.data) {
                    $("#comment_0").after(function () {
                        return response.data
                    });
                    // $("#email").val('');
                    // $('#nameUser').val('');
                    // $('#comment').val('');
                    // $('#file').val('');
                    $('#comment_on_product')[0].reset();
                }
            },
            error: function (response) {
                alert(response);
                $("#result_form").html("Error. Your data has not been sent.");
            }
        });
    }
}
