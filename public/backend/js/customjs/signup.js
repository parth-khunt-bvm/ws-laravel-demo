var Signup = function(){
    var checkSignup = function(){

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
                minlength: 8,
                pattern: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/,
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
            username: {
                required: "Please enter a username.",
                minlength: "Your username must be at least 4 characters long."
            },
            password: {
                required: "Please enter a password.",
                minlength: "Your password must be at least 8 characters long.",
                pattern: "Your password must contain at least one uppercase letter, one lowercase letter, and one number."
            },
            password_confirmation : {
                required: "Please confirm your password.",
                equalTo: "Passwords do not match."
            }
        };

        // Attach the validation handler
        handleFormValidateWithMsg(form, rules, messages, function(form) {
            handleAjaxFormSubmit(form);
        });

    }

    return  {
        init:function(){
            checkSignup();
        }
    }
}();
