var Signup = function(){
    var checkSignup = function(){
        var form = $('#sign-up-form');
        var rules = {
            first_name: {
                required: true,
                minlength: 2,
            },
            last_name: {
                required: true,
                minlength: 2,
            },
            email: {
                required: true,
                email: true,
            },
            user_name: {
                required: true,
                minlength: 4,
                usernameFormat: true // Use the custom method here
            },
            password: {
                required: true,
                // minlength: 8,
                // pattern: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/,
            },
            password_confirmation : {
                required: true,
                equalTo: "#password",
            }
        };

        var messages = {
            first_name: {
                required: "Please enter your first name.",
                minlength: "Your first name must be at least 2 characters long."
            },
            last_name: {
                required: "Please enter your last name.",
                minlength: "Your last name must be at least 2 characters long."
            },
            email: {
                required: "Please enter your email address.",
                email: "Please enter a valid email address."
            },
            user_name: {
                required: "Please enter a username.",
                minlength: "Your username must be at least 4 characters long."
            },
            password: {
                required: "Please enter a password.",
                // minlength: "Your password must be at least 8 characters long.",
                // pattern: "Your password must contain at least one uppercase letter, one lowercase letter, and one number."
            },
            password_confirmation : {
                required: "Please confirm your password.",
                equalTo: "Passwords do not match."
            }
        };


        form.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'text-danger', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: ":hidden",
            rules: rules,
            highlight: function(element) { // hightlight error inputs
                $(element)
                        .closest('.form-control').addClass('has-error'); // set error class to the control group
            },
            unhighlight: function(element) { // revert the change done by hightlight
                $(element)
                        .closest('.form-control').removeClass('has-error'); // set error class to the control group
            },
            success: function(label) {
                label
                        .closest('.form-control').removeClass('has-error'); // set success class to the control group
            },
            messages: messages,

            errorPlacement: function(error, element) {
                var elem = $(element);

                if(elem.hasClass("multipleSelection") && elem.hasClass("select2-hidden-accessible")){
                   element =  $(".multipleSelection").parent().find('.select2-container');
                   error.insertAfter(element);
                } else {
                    if (elem.hasClass("select2-hidden-accessible")) {
                        element = $("#select2-" + elem.attr("id") + "-container").parent();
                        error.insertAfter(element);
                    } else {
                        if (elem.hasClass("radio-btn")) {
                            element = elem.parent().parent();
                            error.insertAfter(element);
                        } else {
                            error.insertAfter(element);
                        }
                    }
                }

            },
        });


         // Add custom validation method for 'pattern'
         $.validator.addMethod(
            "pattern",
            function(value, element, regex) {
                if (regex instanceof RegExp) {
                    return this.optional(element) || regex.test(value);
                } else {
                    console.error("The 'pattern' parameter should be a valid RegExp.");
                    return false;
                }
            },
            "Invalid format."
        );

        $.validator.addMethod(
            "usernameFormat",
            function(value, element) {
                // Regular expression for Name@Year format
                var regex = /^[A-Za-z]+@[0-9]{4}$/;
                return this.optional(element) || regex.test(value);
            },
            "Username must be in the format: Name@Year (e.g., Parth@1996)"
        );


    }

    return  {
        init:function(){
            checkSignup();
        }
    }
}();
