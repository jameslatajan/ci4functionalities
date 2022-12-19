$(document).ready(function () {
  //validate before click
  $("#form").validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5,
      },
    },
    messages: {
      email: {
        required: "Email must not be blank",
        email: "You must enter a valid email",
      },
      password: {
        required: "Password must not be blank",
        minlength: "Password must countain at least 5 characters",
      },
    },
  });

  //when click
  $("#submit").on("click", function () {
    var csrfname = $("#csrf").attr("name");
    var csrfval = $("#csrf").val();
    var email = $("#email").val();
    var password = $("#password").val();

    if ($("#form").valid() == true) {
      $("form").submit(function (e) {
        e.preventDefault();
        var data = {
          [csrfname]: csrfval,
          email: email,
          password: password,
        };
        $.ajax({
          type: "POST",
          url: "login",
          data: data,
          dataType: "json",
          success: function (response) {
            if (response["success"] == true) {
              window.location.replace(response["redirectTo"]);
            } else {
              location.reload();
            }
          },
          error: function (errorMessage) {
            console.log(errorMessage);
          },
        });
      });
    }
  });
});
