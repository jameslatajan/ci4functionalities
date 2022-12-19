$(document).ready(function () {
  //validate before click
  $("#form").validate({
    rules: {
      first_name: "required",
      middle_name: "required",
      last_name: "required",
      bdate: "required",
      sex: "required",
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5,
      },
      cpassword: {
        required: true,
        minlength: 5,
        equalTo: "#password",
      },
    },
    messages: {
      first_name: "First name must not be blank",
      middle_name: "Middle name must not be blank",
      last_name: "Last name must not be blank",
      bdate: "Birth date must not be blank",
      sex: "Sex must not be blank",
      email: {
        required: "Email must not be blank",
        email: "You must enter a valid email",
      },
      password: {
        required: "Password must not be blank",
        minlength: "Password must countain at least 5 characters",
      },
      cpassword: {
        required: "Confirm password must not be blank",
        minlength: "Password must countain at least 5 characters",
        equalTo: "Confirm password is not equal to password",
      },
    },
  });

  //when click
  $("#submit").on("click", function () {
    var csrfname = $("#csrf").attr("name");
    var csrfval = $("#csrf").val();
    var first_name = $("#first_name").val();
    var middle_name = $("#middle_name").val();
    var last_name = $("#last_name").val();
    var bdate = $("#bdate").val();
    var sex = $("#sex").val();
    var email = $("#email").val();
    var password = $("#password").val();

    if ($("#form").valid() == true) {
      $("form").submit(function (e) {
        e.preventDefault();
        var data = {
          [csrfname]: csrfval,
          first_name: first_name,
          middle_name: middle_name,
          last_name: last_name,
          birth_date: bdate,
          sex: sex,
          email: email,
          password: password,
        };
        $.ajax({
          type: "POST",
          url: "signup",
          data: data,
          dataType: "json",
          success: function (response) {
            if (response["success"] == true) {
              Swal.fire({
                icon: "success",
                title: "Sign up",
                text: response["msg"],
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.replace(response["redirectTo"]);
                } else {
                  window.location.replace(response["redirectTo"]);
                }
              });
            } else {
              Swal.fire({
                icon: "error",
                title: "Sign up",
                text: response["msg"],
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.replace(response["redirectTo"]);
                } else {
                  window.location.replace(response["redirectTo"]);
                }
              });
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
