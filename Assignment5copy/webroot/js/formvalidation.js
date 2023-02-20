//------------------------------------- Client Side Validation---------------------------------
$(document).ready(function () {
    // $("#loginForm").submit(function (e) {
    //     e.preventDefault();
    //     return false;
    // });
    $("#loginForm").validate({
        rules: {
            // created_date: { step: false },
            // modified_date: { step: false },
            "user_profile[first_name]": {
                required: true,
                lettersonly: true,
            },
            "user_profile[last_name]": {
                required: true,
                lettersonly: true,
            },
            "user_profile[contact]": {
                required: true,
                number: true,
                minlength: 10,
                maxlength: 10,
            },
            "user_profile[address]": {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 8,
            },
            cnfirm_pswrd: {
                required: true,
                minlength: 8,
                equalTo: "#password",
            },
            "user_profile[image]": {
                required: true,
            },
        },
        messages: {
            "user_profile[first_name]": {
                required: "Please Enter First Name",
                lettersonly: "Numeric values are not allowed",
            },
            "user_profile[last_name]": {
                required: "Please Enter Last Name",
                lettersonly: "Numeric values are not allowed",
            },
            "user_profile[contact]": {
                required: "Please Enter Contact Number",
                number: "Not Allowed",
                maxlength: "Number must be 10 digit",
                minlength: "Number must be 10 digit",
            },
            "user_profile[address]": {
                required: "Please Enter Address",
            },
            email: {
                required: "Please Enter Your Email",
                email: "Please Enter Valid Email",
            },
            password: {
                required: "Please Enter Your password",
                minlength: "password should be atleast 8 characters in length",
            },
            cnfirm_pswrd: {
                required: "Confirm Your password",
                equalTo: "password Doesn't Match",
            },
            "user_profile[image]": {
                required: "Please Select Your Image",
            },
        },
        submitHandler: function (form) {
            var formData = new FormData(form);
            // alert(formData);
            // return false;
            $.ajax({
                url: "/users/register",
                data: formData,
                type: "JSON",
                processData: false,
                contentType: false,
                method: "post",
                success: function (response) {
                    var record = JSON.parse(response);
                    if (record["status"] == 1) {
                        window.location.href = "/users/login";
                    }
                },
                error: function () {
                    alert("fill all field");
                },
            });
        },
    });

    jQuery.validator.addMethod(
        "lettersonly",
        function (value, element) {
            return this.optional(element) || /^[a-z]+$/i.test(value);
        },
        "Letters only please"
    );
});

// ajax request to hard delete student
// $(document).on("click", ".btn-delete-user", function (e) {
//     e.preventDefault();
//     // Ajax csrf token setup
//     var csrfToken = $('meta[name="csrfToken"]').attr("content");
//     $.ajaxSetup({
//         headers: {
//             "X-CSRF-TOKEN": csrfToken, // this is defined in app.php as a js variable
//         },
//     });
//     if (confirm("Are you sure want to delete ?")) {
//         var postdata = $(this).attr("data-id");
//         $.ajax({
//             url: "/users/userdelete/" + postdata,
//             data: postdata,
//             type: "JSON",
//             method: "post",
//             success: function (response) {
//                 window.location.href = "/users/userlist";
//             },
//         });
//     }
// });

// ajax request to soft delete users
$(document).on("click", ".btn-delete-user", function (e) {
    e.preventDefault();
    // Ajax csrf token setup
    var csrfToken = $('meta[name="csrfToken"]').attr("content");
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": csrfToken, // this is defined in app.php as a js variable
        },
    });
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            var postdata = $(this).attr("data-id");
            var hide_tr = $(this).parents("tr");
            $.ajax({
                url: "/users/userdelete/" + postdata,
                data: postdata,
                type: "JSON",
                method: "post",
                success: function (response) {
                    // window.location.href = "/users/userlist";
                    var data = JSON.parse(response);
                    console.log(data);
                    var status = data["status"];
                    if (status == "1") {
                        hide_tr.hide();

                        swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                        });
                    } else {
                        swal("Your file is not deleted");
                    }
                },
            });
            // };
        } else {
            swal("Your file is safe!");
        }
    });
    return false;
});

//====================== getting data in modal through ajax =================
$(document).on("click", ".editUser", function () {
    var user_id = $(this).data("id");
    console.log(user_id);
    $.ajax({
        url: "/users/updateProfile",
        data: { id: user_id },
        type: "JSON",
        method: "get",
        success: function (response) {
            user = $.parseJSON(response);
            // console.log(user["user_profile"]["first_name"]);

            // hidden input for image and id
            $("#imagedd").val(user["user_profile"]["profile_image"]);
            $("#iddd").val(user["id"]);
            // hidden input for image and id

            var image = user["user_profile"]["profile_image"];
            document
                .querySelector("#showimg")
                .setAttribute("src", "/img/" + image);

            $("#user-profile-first-name").val(
                user["user_profile"]["first_name"]
            );
            $("#user-profile-last-name").val(user["user_profile"]["last_name"]);
            $("#user-profile-contact").val(user["user_profile"]["contact"]);
            $("#user-profile-address").val(user["user_profile"]["address"]);
            $("#email").val(user["email"]);
        },
    });
});

$(document).ready(function () {
    //====================== update data in modal through ajax =================
    $("#useredit").validate({
        rules: {
            "user_profile[first_name]": {
                required: true,
            },
            last_name: {
                required: true,
            },
        },
        messages: {
            "user_profile[first_name]": {
                required: " Please enter your car company name",
            },
            last_name: {
                required: "Please enter your car description",
            },
        },
        submitHandler: function (form) {
            // alert("dddd");
            var formData = new FormData(form);
            // alert("ddddddg");
            console.log(formData);
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                url: "/users/editProfile",
                type: "JSON",
                method: "POST",
                cache: false,
                processData: false,
                contentType: false,
                data: formData,
                success: function (response) {
                    // console.log(response);
                    // alert(response);
                    var data = JSON.parse(response);
                    if (data["status"] == 0) {
                        alert(data["message"]);
                    } else {
                        // $("#userlist").trigger("reset");
                        // $("#ajaxeditUser").modal("hide");
                        $('#useredit').modal('hide');
                        swal(
                            "Updated Successfully!",
                            "Details has been saved!",
                            "success"
                            );
                        // $("#ajaxeditUser").modal("hide");
                        // window.location.reload();
                    }
                },
            });
            return false;
        },
    });
});
