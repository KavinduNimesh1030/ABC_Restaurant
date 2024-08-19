let fv;
let form;
document.addEventListener("DOMContentLoaded", function () {
    form = document.querySelector(".formValidationExamples");

    form.addEventListener("submit", function (event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }

        form.classList.add("was-validated");
    });

    // Add validation rules and messages
    fv = FormValidation.formValidation(form, {
        fields: {
            firstName: {
                validators: {
                    notEmpty: {
                        message: "Please enter your first name",
                    },
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: "The first name can only consist of alphabetical characters and spaces",
                    },
                },
            },
            lastName: {
                validators: {
                    notEmpty: {
                        message: "Please enter your last name",
                    },
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: "The last name can only consist of alphabetical characters and spaces",
                    },
                },
            },
            postSelect: {
                validators: {
                    notEmpty: {
                        message: "Please select a role",
                    },
                },
            },
            email: {
                validators: {
                    notEmpty: {
                        message: "Please enter an email address",
                    },
                    emailAddress: {
                        message: "Please enter a valid email address",
                    },
                },
            },
            password: {
                validators: {
                    notEmpty: {
                        message: "Please enter a password",
                    },
                    stringLength: {
                        min: 8,
                        message: "The password must be at least 8 characters long",
                    },
                },
            },
        },
        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap5: new FormValidation.plugins.Bootstrap5({
                rowSelector: function (field, ele) {
                    switch (field) {
                        case "firstName":
                        case "lastName":
                        case "postSelect":
                            return ".col-md-4";
                        case "email":
                        case "password":
                            return ".col-md-6";
                        default:
                            return ".row";
                    }
                },
            }),
            submitButton: new FormValidation.plugins.SubmitButton(),
            defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
            autoFocus: new FormValidation.plugins.AutoFocus(),
        },
    });



    // Initialize the validation
    form.querySelectorAll("input, select, textarea").forEach(function (input) {
        input.addEventListener("input", function () {
            fv.revalidateField(input.getAttribute("name"));
        });
    });

    document
        .getElementById("btnStaffSave")
        .addEventListener("click", function () {
            form.classList.add("was-validated");
        });
});
