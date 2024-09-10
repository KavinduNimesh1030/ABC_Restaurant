function validateImageUploader() {
    // let isMainImageValidate = isValidateMainImageUploader();
    let isOgImageValidate = isValidateOGImageUploader();
    if (isOgImageValidate) return true;
    return false;
}

// function isValidateMainImageUploader() {
//     let mainFileInput = $("#mainImageUploader")[0];
//     if (mainFileInput.files.length === 0) {
//         $("#mainImageUploader").addClass("is-invalid").removeClass("is-valid");
//         $("#mainImageUploader").siblings(".invalid-feedback").show();
//         $("#mainImageUploader").siblings(".valid-feedback").hide();
//         return false;
//     }
//     $("#mainImageUploader").addClass("is-valid").removeClass("is-invalid");
//     $("#mainImageUploader").siblings(".invalid-feedback").hide();
//     $("#mainImageUploader").siblings(".valid-feedback").show();
//     return true;
// }

function isValidateOGImageUploader() {
    let ogFileInput = $("#ogImageUploader")[0];
    if (ogFileInput.files.length === 0) {
        $("#ogImageUploader").addClass("is-invalid").removeClass("is-valid");
        $("#ogImageUploader").siblings(".invalid-feedback").show();
        $("#ogImageUploader").siblings(".valid-feedback").hide();
        return false;
    }
    $("#ogImageUploader").addClass("is-valid").removeClass("is-invalid");
    $("#ogImageUploader").siblings(".invalid-feedback").hide();
    $("#ogImageUploader").siblings(".valid-feedback").show();
    return true;
}
