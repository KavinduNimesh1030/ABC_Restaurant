let fv;
let form;
document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector(".formValidationExamples");

    form.addEventListener("submit", function (event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add("was-validated");
    });

    const fv = FormValidation.formValidation(form, {
        fields: {
            gatewayName: {
                validators: {
                    notEmpty: {
                        message: "Please enter the header (H1)",
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9 ]+$/,
                        message: "The header can only consist of alphabetical, number and space",
                    },
                },
            },
            gatewaySlug: {
                validators: {
                    notEmpty: {
                        message: "Please enter the slug",
                    },
                    regexp: {
                        regexp: /^\S*$/,
                        message: "The slug cannot contain spaces",
                    },
                },
            },
            gatewayPageTitle: {
                validators: {
                    notEmpty: {
                        message: "Please enter the page title",
                    },
                },
            },
            gatewayMetaDescription: {
                validators: {
                    notEmpty: {
                        message: "Please enter the meta description",
                    },
                },
            },
            gatewayAltTag: {
                validators: {
                    notEmpty: {
                        message: "Please enter the alt tag",
                    },
                },
            },
            paymentTypeSelect: {
                validators: {
                    notEmpty: {
                        message: "Please select a payment type",
                    },
                },
            },
            gatewayCountries: {
                validators: {
                    notEmpty: {
                        message: "Please select at least one country",
                    },
                },
            },
            gatewayCurrencies: {
                validators: {
                    notEmpty: {
                        message: "Please select at least one currency",
                    },
                },
            },
            editor: {
                validators: {
                    notEmpty: {
                        message: "Please enter the description",
                    },
                },
            },
        },
        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap5: new FormValidation.plugins.Bootstrap5({
                rowSelector: function (field, ele) {
                    switch (field) {
                        case "gatewayName":
                        case "gatewaySlug":
                        case "paymentTypeSelect":
                            return ".col-md-4";
                        case "gatewayPageTitle":
                        case "gatewayMetaDescription":
                        case "gatewayAltTag":
                        case "gatewayCountries":
                        case "gatewayCurrencies":
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

    form.querySelectorAll("input, select, textarea").forEach(function (input) {
        input.addEventListener("input", function () {
            fv.revalidateField(input.getAttribute("name"));
        });
    });

    document.getElementById("btnGatewaySave").addEventListener("click", function () {
        form.classList.add("was-validated");
    });
});
