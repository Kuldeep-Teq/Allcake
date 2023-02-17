// $("#loginForm").on("submit", function (e) {
//     e.preventDefault();

//     // var formData = $("#loginForm").serialize();
//     var formData = new FormData(this);
//     // alert(formData);
//     // return false;
//     $.ajax({
//         url: "/users/register",
//         data: formData,
//         type: "JSON",
//         processData: false,
//         contentType: false,
//         method: "post",
//         success: function (response) {
//             alert("data submitted");
//         },
//     });

//     // var formData = new FormData(this);

//     //We can add more values to form data
//     //formData.append("key", "value");

//     // $.ajax({
//     //     url: "/users/register",
//     //     type: "POST",
//     //     cache: false,
//     //     data: formData,
//     //     processData: false,
//     //     contentType: false,
//     //     dataType: "JSON",
//     //     success: function (data) {
//     //         alert("data submitted");
//     //         // window.location.reload();
//     //     },
//     //     error: function (jqXHR, textStatus, errorThrown) {
//     //         alert("Error at add data");
//     //     },
//     // });
// });
