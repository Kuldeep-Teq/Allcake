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
            form.submit();
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
