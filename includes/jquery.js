$(document).ready(function () {


    $.validator.addMethod("checkMobileNumberLength", function (value, element) {
        return value.length === 11
    }, 'Please enter 11 digit mobile number.');

    $.validator.addMethod("checkRollNumberLength", function (value, element) {
        return value.length === 4
    }, 'Please enter 4 digit roll number.');


    $('#register-form').validate({
        rules: {
            fullname: {
                required: true,
                minlength: 5
            },
            email: {
                required: true,
                email: true
            },
            mobile: {
                required: true,
                checkMobileNumberLength: true
            },
            roll: {
                required: true,
                checkRollNumberLength: true
            },

            password: {
                required: true,
                minlength: 5
            },
            confirmPassword: {
                required: true,
                equalTo: "#password"
            },
        },
        messages: {
            fullname: {
                required: 'Please enter Full name.'
            },

            email: {
                required: 'Please enter Email Address.',
                email: 'Please enter a valid Email Address.',
            },
            roll: {
                required: 'Please enter roll number.'
            },
            mobile: {
                required: 'Please enter mobile number.'
            },
            password: {
                required: 'Please enter Password.',
                minlength: 'Password must be at least 5 characters long.',
            },
            confirmPassword: {
                required: 'Please enter Confirm Password.',
                equalTo: 'Confirm Password do not match with Password.',

            },
        },
        submitHandler: function (form) {

            form.submit();
        }
    });


    $('#login-form').validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 5
            },
        },
        messages: {

            email: {
                required: 'Please enter Email Address.',
                email: 'Please enter a valid Email Address.',
            },
            password: {
                required: 'Please enter Password.',
                minlength: 'Password must be at least 5 characters long.',
            },
        },

        submitHandler: function (form) {

            form.submit();
        }
    });

    // $(document).ready(function() {
    //     $('#submit-btn').click(function() {
    //         if ($('#course').val() == '') {
    //             $('#error-message').text('Please select a course.');
    //             return false;
    //         } else {
    //             $('#error-message').text('');
    //             return true;
    //         }
    //     });
    // });
    $(window).scroll(function(){
        if($(this).scrollTop() > 100){
            $('.nav').addClass('sticky')
        } else{
            $('.nav').removeClass('sticky')
        }
    });
});