var Login = function(){

    var loginValidation = function(){
        var form = $('#sign-in-form');
        var rules = {
            username: {required: true, email: true},
            password: {required: true},
        };
        var message = {
            username :{
                required : "Please enter your register email address 111",
                email : "Please enter vaild email address"
            },
            password : {
                required : "Please enter password"
            }
        }
        handleFormValidateWithMsg(form, rules,message, function(form) {
            handleAjaxFormSubmit(form);
        });
    }

    return {
        init:function(){
            loginValidation();
        }
    }
}();
// var Login = function(){
//     var validation = function(){

//     }

//     return {
//         init:function(){
//             validation();
//         }
//     }
// }();
