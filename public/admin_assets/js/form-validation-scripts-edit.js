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
            htmlCode: {
                validators: {
                    notEmpty: {
                        message: "Please enter script",
                    },
                },
            },
         
        },
        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap5: new FormValidation.plugins.Bootstrap5({
                rowSelector: function (field, ele) {
                    switch (field) {
                        case "htmlCode":
                            return ".col-md-12";
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
        .getElementById("btnScriptsSave")
        .addEventListener("click", function () {
            form.classList.add("was-validated");
        });
});
