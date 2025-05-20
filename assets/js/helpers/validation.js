$(document).ready(function () {
    var currentPath = window.location.pathname;

    $("form").find("button").attr("disabled", "disabled");
    let validation = {};

    $("form").on("keyup", function () {
        let input_elems = $(this).find("input");
        input_elems.each(function() {
            validateInput($(this).attr("name"), $(this).val());
        });
        enableButton();
    });

    function validateInput(input_name, input_value) {
        errorMessage(input_name, "default", !hasValidLength(input_value));
        validation[input_name] = hasValidLength(input_value);
        if(input_name === "email") {
            errorMessage(input_name, input_name, !isValidEmail(input_value));
            validation[input_name] = isValidEmail(input_value);
        }
        if(currentPath === "/register.php") {
            if(input_name === "password") {
                errorMessage(input_name, input_name, !isValidPassword(input_value));
                validation[input_name] = isValidPassword(input_value);
            }
        }
    }

    function errorMessage(input_name, errorMessage, show) {
        let errorMessages = {
            "default" : "should have at least 2 characters.",
            "email" : "should be valid.",
            "password" : "should contain at least 1 capital letter, 1 number, and 1 special character (!@#$%&*)."
        }
        if(show) {
            $(`.${input_name}-error`).text(`${input_name.toUpperCase()} ${errorMessages[errorMessage]}`);
        } else {
            $(`.${input_name}-error`).text(``);
        }
    }

    function enableButton() {
        $.each(validation, function(key, val) {
            if(val === false) {
                $("form").find("button").attr("disabled", "disabled");
                return false;
            } else {
                $("form").find("button").removeAttr("disabled");
            }
        });
    }

    function isValidEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

    function isValidPassword(password) {
        var regex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
        return regex.test(password);
    }

    function hasValidLength(input_data) {
        if(input_data.length >= 2) {   
            return true;
        }
        return false;
    }
});