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
            paymentTypeName: {
                validators: {
                    notEmpty: {
                        message: "Please enter paymentType name",
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9 ]+$/,
                        message:
                            "The name can only consist of alphabetical, number and space",
                    },
                },
            },
            paymentTypeSubName: {
                validators: {
                    notEmpty: {
                        message: "Please enter paymentType sub header",
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9 ]+$/,
                        message:
                            "The name can only consist of alphabetical, number and space",
                    },
                },
            },
            paymentTypeSlug: {
                validators: {
                    notEmpty: {
                        message: "Please enter paymentType slug",
                    },
                    regexp: {
                        regexp: /^\S*$/,
                        message: "The paymentType slug cannot contain spaces",
                    },
                },
            },
            paymentTypePageTitle: {
                validators: {
                    notEmpty: {
                        message: "Please enter page title",
                    },
                },
            },
            paymentTypeMetaDescription: {
                validators: {
                    notEmpty: {
                        message: "Please enter meta description",
                    },
                },
            },
            paymentTypeAltTag: {
                validators: {
                    notEmpty: {
                        message: "Please enter paymentType alt tag",
                    },
                },
            }
        },
        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap5: new FormValidation.plugins.Bootstrap5({
                rowSelector: function (field, ele) {
                    switch (field) {
                        case "paymentTypeName":
                            return ".col-md-4";
                        case "paymentTypeSlug":
                            return ".col-md-4";
                        case "paymentTypeSubName":
                            return ".col-md-4";
                        case "paymentTypePageTitle":
                        case "paymentTypeMetaDescription":
                        case "paymentTypeAltTag":
                       
                            return ".col-md-6";
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
