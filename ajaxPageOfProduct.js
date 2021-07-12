// $(document).ready(function () {
//     $("form").submit(
//         function () {
//             ajaxPageOfProduct("result_form");
//             return false;
//         });
// });
//
// function ajaxPageOfProduct(result_form) {
//     $.ajax({
//             url: "forAjax.php",
//             type: "POST",
//             dataType: "html",
//             data: $("#" + "comment_on_product").serialize(),
//             success: function (response) {
//                 response = JSON.parse(response)
//
//
//                 if (element.emaiFormat === false) {
//                     $("#massage_email").html("Error. Write corect email");
//                 }
//                 if (response.emailEmpty === true) {
//                     $("#massage_email").html("Error. Please enter email");
//                 }
//                 if (response.nameUser === true) {
//                     $("#massage_nameUser").html("Error. Please enter name");
//                 }
//                 if (response.nameUserSize === false) {
//                     $("#massage_nameUser").html("Error. Minimum 6 characters");
//                 }
//                 if (response.rating === false) {
//                     $("#massage_rating").html("Error. Please choose rating");
//                 }
//                 if (response.comment === false) {
//                     $("#massage_comment").html("Error. Maximum 1000 characters");
//                 }
//                 if (response.emaiFormat === true && response.emailEmpty === false && response.nameUser === false
//                     && response.nameUserSize === true && response.rating === true && response.comment === true) {
//                     document.location.replace("http://test/Comments.php");
//                 }
//
//             },
//             error: function (response) {
//                 alert("error");
//                 $("#result_form").html("Error. Your data has not been sent.");
//             }
//         }
//     );
//
// }
