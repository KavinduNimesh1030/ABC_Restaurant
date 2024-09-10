/**
 *  Alert
 */

// 

function showSuccessAlert(message, type, url) {
      $.confirm({
          icon: "fa fa-check",
          theme: "modern",
          animation: "left",
          type: "green",
          title: "Success!",
          content: message,
          buttons: {
              ok: function () {
                  location.href = url
              },
          },
      });
}

function showErrorAlert(message, type, url) {
    $.confirm({
        icon: "fa fa-exclamation-triangle",
        theme: "modern",
        animation: "right",
        type: "red",
        title: "Error!",
        content: message,
        buttons: {
          ok: function () {
            // location.href = url
        },
        },
    });
}
