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
    const fv = FormValidation.formValidation(form, {
        fields: {
            countryName: {
                validators: {
                    notEmpty: {
                        message: "Please enter country name",
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9 ]+$/,
                        message:
                            "The name can only consist of alphabetical, number and space",
                    },
                },
            },
            countrySlug: {
                validators: {
                    notEmpty: {
                        message: "Please enter country slug",
                    },
                    regexp: {
                        regexp: /^\S*$/,
                        message: "The country slug cannot contain spaces",
                    },
                },
            },
            countryPageTitle: {
                validators: {
                    notEmpty: {
                        message: "Please enter page title",
                    },
                },
            },
            countryMetaDescription: {
                validators: {
                    notEmpty: {
                        message: "Please enter meta description",
                    },
                },
            },
        },
        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap5: new FormValidation.plugins.Bootstrap5({
                rowSelector: function (field, ele) {
                    switch (field) {
                        case "countryName":
                            return ".col-md-4";
                        case "countrySlug":
                            return ".col-md-4";
                        case "countryPageTitle":
                            return ".col-md-4";
                        case "countryMetaDescription":
                            return ".col-md-12";
                        // Add other cases if needed...
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
        .getElementById("btnCountrySave")
        .addEventListener("click", function () {
            form.classList.add("was-validated");
        });
});
