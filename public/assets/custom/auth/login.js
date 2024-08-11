const form = document.getElementById("formSubmit");

const fv = FormValidation.formValidation(form, {
  fields: {
    username: {
      validators: {
        notEmpty: {
          message: "Username cannot be empty !",
        },
      },
    },

    password: {
      validators: {
        notEmpty: {
          message: "Password cannot be empty !",
        },
      },
    },
  },
  plugins: {
    trigger: new FormValidation.plugins.Trigger(),
    bootstrap5: new FormValidation.plugins.Bootstrap5({
      eleValidClass: "",
      rowSelector: ".mb-3",
    }),

    submitButton: new FormValidation.plugins.SubmitButton(),
    defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
    autoFocus: new FormValidation.plugins.AutoFocus(),
  },
  init: (instance) => {
    instance.on("plugins.message.placed", function (e) {
      if (e.element.parentElement.classList.contains("input-group")) {
        e.element.parentElement.insertAdjacentElement("afterend", e.messageElement);
      }
    });
  },
}).on("core.form.valid", function () {
  const formSubmit = $("#formSubmit");

  blockCard();
  formSubmit.attr("action", "/authenticate").submit();
});
