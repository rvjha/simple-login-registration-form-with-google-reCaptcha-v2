//! ==============================  login form  =============================
try {

  //! variables
  const rmCheck = document.getElementById("lRem");
  var email = document.getElementById('lEmail');
  var logForm = document.getElementById('logForm')

  //! Check whether the localStorage have remember me data of not
  if (localStorage.checkbox && localStorage.checkbox !== "") {
      rmCheck.setAttribute("checked", "checked");
      email.value = localStorage.username;
  } else {
      rmCheck.removeAttribute("checked");
  }

  //! on submit
  logForm.onsubmit = (e) => {
      e.preventDefault();

      //? variables 
      var pass = document.getElementById('lPass');
      var eStatus = document.getElementById('eState');


      eStatus.innerHTML = "";

      //? array of form data
      var data = [];
      data = {
          'action': 'login',
          'email': email.value,
          'pass': pass.value
      };

      $.ajax({
          type: "POST",
          url: "./controller/c_users.php",
          data: data,
          success: function(response) {
              console.log(response);
              data = JSON.parse(response);
              console.log(response);
              if (data['message'] == "success") {
                  document.getElementById('uId').value = data['uId'];
                  lsRememberMe(rmCheck, email);
                  $('#otp').modal('show')
              } else {
                  eStatus.innerHTML = data['message'];
              }

          }
      });


      //! function for remember Me 
      function lsRememberMe(check, mail) {
          if (check.checked && mail.value !== "") {

              localStorage.username = mail.value;
              localStorage.checkbox = check.value;
          } else {
              localStorage.username = "";
              localStorage.checkbox = "";
          }
      }
  }
} catch (error) {
  console.log(error);
}

//! ==============================  otp function  ===========================
try {

  //! otp form variable
  var oForm = document.getElementById('otpForm');
  //! on submit otp form
  oForm.onsubmit = (e) => {
      e.preventDefault();

      //! form variable
      var oBtn = document.getElementById('sCodeBt');
      var oCode = document.getElementById('sCodeIn');
      var oState = document.getElementById('oEstate');
      var uId = document.getElementById('uId');
      //! form data 
      var data = [];
      if (oCode.value) {

          data = {
              "action": "verify otp",
              "otp": oCode.value,
              "uId": uId.value
          }

          $.ajax({
              type: "POST",
              url: "./controller/c_users.php",
              data: data,
              success: function(response) {
                  // console.log(response);
                  data = JSON.parse(response);
                  // console.log(data);

                  if (data['message'] == "success") {
                      oState.innerHTML = data['message'];
                  } else {
                      oState.innerHTML = data['message'];
                      setTimeout(() => {
                          window.location.href = 'index.php';
                      }, 3000);
                  }
              }
          });
      } else {
          oState.innerHTML = "Please enter Otp";
      }
  }
} catch (error) {
  console.log(error);
}
//! =========================== registration form  ==========================
try {
  var regForm = document.getElementById('regForm')

  regForm.onsubmit = (e) => {
      e.preventDefault();

      //? variables 
      var fname = document.getElementById('rFname');
      var lname = document.getElementById('rLname');
      var email = document.getElementById('rEmail');
      var rPass1 = document.getElementById('rPassword1');
      var rPass2 = document.getElementById('rPassword2');
      var rToken = document.getElementById('token');
      var rPval1 = document.getElementById('ePstate1')
      var rPval2 = document.getElementById('ePstate2')
      var rCval = document.getElementById('rCaptVal')
      var rEval = document.getElementById('eEstate')

      //? remove classes
      email.classList.remove('is-invalid');
      email.classList.remove('is-valid');
      rPval1.classList.remove('is-invalid');
      rPval2.classList.remove('is-invalid');
      rPval1.classList.remove('is-valid');
      rPval2.classList.remove('is-valid');

      //? remove privious data
      rCval.innerHTML = "";
      rEval.innerHTML = "";
      rPval1.innerHTML = "";
      rPval2.innerHTML = "";
      rToken.value = grecaptcha.getResponse();

      //? name validation 
      if (fname.value) {
          fname.classList.add('is-valid')
      } else {
          fname.classList.add('is-valid')
      }
      if (lname.value) {
          lname.classList.add('is-valid')
      } else {
          lname.classList.add('is-valid')
      }

      //! array of form data
      var data = [];

      data = {
          "action": "registration",
          "fName": fname.value,
          "lName": lname.value,
          "email": email.value,
          "pass1": rPass1.value,
          "pass2": rPass2.value,
          "token": rToken.value
      };
      console.log(data);
      $.ajax({
          type: "POST",
          url: "./controller/c_users.php",
          data: data,
          success: function(response) {
              console.log(response);
              data = JSON.parse(response);
              if (data['errEmail']) {

                  rEval.innerHTML = (data['errEmail']);
                  email.classList.add('is-invalid');
                 grecaptcha.reset();

              } else {

                  email.classList.add('is-valid');

              }
              if (data['errPass']) {

                  rPass1.classList.add('is-invalid');
                  rPass2.classList.add('is-invalid');
                  rPval1.innerHTML = data['errPass'];
                  rPval2.innerHTML = data['errPass'];
                 grecaptcha.reset();
              } else {
                  rPass1.classList.remove('is-invalid');
                  rPass2.classList.remove('is-invalid');
                  rPass1.classList.add('is-valid');
                  rPass2.classList.add('is-valid');
                  rPval1.innerHTML = "";
                  rPval2.innerHTML = "";

                 grecaptcha.reset();
              }
              if (data['errCaptcha'] != null) {

                  rCval.innerHTML = data['errCaptcha'];
                 grecaptcha.reset();
              }
              if (data['extMail']) {

                  rEval.innerHTML = (data['extMail']);
                  email.classList.add('is-invalid');
                 grecaptcha.reset();

              } else {
                  email.classList.add('is-valid');
              }
              if (data['message'] == 'success') {
                  document.getElementById('status').innerHTML = "<h3 class='text-center text-primary'>Registration Complete...!</h3>"
                  setTimeout(() => {

                      window.location.href = 'index.php';
                  }, 3000);
              }
              if (data['message'] == 'error') {
                  document.getElementById('Estatus').innerHTML = "Something went wrong...!";
                  setTimeout(() => {
                      location.reload();
                  }, 3000);

              }
          }
      });
  }
} catch (error) {
  console.log(error);
}