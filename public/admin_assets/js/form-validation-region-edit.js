document.addEventListener('DOMContentLoaded', function () {
  const form = document.querySelector('.formValidationExamples'); // Select by class


  form.addEventListener('submit', function (event) {
      if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
      }

      form.classList.add('was-validated');
  });

  // Add validation rules and messages
  const fv = FormValidation.formValidation(form, {
      fields: {
          regionName: { 
              validators: {
                  notEmpty: {
                      message: 'Please enter region name'
                  },
                  // stringLength: {
                  //     min: 6,
                  //     max: 30,
                  //     message: 'The name must be between 6 and 30 characters long'
                  // }
                  regexp: {
                      regexp: /^[a-zA-Z0-9 ]+$/,
                      message: 'The name can only consist of alphabetical, number and space'
                  }
              }
          },
          regionSlug: {
              validators: {
                  notEmpty: {
                      message: 'Please enter region slug'
                  },
                  regexp: {
                      regexp: /^\S*$/,
                      message: 'The region slug cannot contain spaces'
                  }
              }
          },
          regionAltTag: { 
              validators: {
                  notEmpty: {
                      message: 'Please enter region alt tag'
                  }
              }
          },
          imageUploader: {
              validators: {
                  notEmpty: {
                      message: 'Please select the image'
                  }
              }
          },
      },
      plugins: {
          trigger: new FormValidation.plugins.Trigger(),
          bootstrap5: new FormValidation.plugins.Bootstrap5({
              rowSelector: function (field, ele) {
                  switch (field) {
                      case 'regionName':
                      case 'regionSlug':
                      case 'regionAltTag':
                          return '.col-md-6';
                      // Add other cases if needed...
                      default:
                          return '.row';
                  }
              }
          }),
          submitButton: new FormValidation.plugins.SubmitButton(),
          defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
          autoFocus: new FormValidation.plugins.AutoFocus()
      },
  });

  // Initialize the validation
  form.querySelectorAll('input, select, textarea').forEach(function(input) {
      input.addEventListener('input', function() {
          fv.revalidateField(input.getAttribute('name'));
      });
  });

  document.getElementById('btnRegionSave').addEventListener('click', function() {
      form.classList.add('was-validated');
  });
});