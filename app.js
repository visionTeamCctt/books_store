function validate_email(inputValue) {
  var foundAt = false;
  var foundDot = false;
  var atPosition = -1;
  var dotPosition = -1;
  for (var i = 0; i <= inputValue.length; i++) {
    if (inputValue.charAt(i) == "@") {
      foundAt = true;
      atPosition = i;
    } else if (inputValue.charAt(i) == ".") {
      foundDot = true;
      dotPosition = i;
    }
  }

  if (dotPosition == -1 || atPosition == -1 || atPosition > dotPosition) {
    alert("invalid email address, please try again");
    return false;
  } else {
    return true;
  }
}

function validate_signup() {
  var username = document.signup.username.value;
  var phone = document.signup.phone.value;
  var address = document.signup.address.value;
  var email = document.signup.email.value;
  var password = document.signup.password.value;
  var confirm_password = document.signup.confirm_password.value;

  if (phone == "") {
    alert("Please enter the user phone");
    return false;
  } else if (username == "") {
    alert("Please enter the username");
    return false;
  } else if (address == "") {
    alert("Please enter the user address");
    return false;
  } 
  else if (validate_email(email) == false) {
    alert("invalid email address, please try again");
    return false;
  } 
  else if (password.length < 6) {
    alert("password length should be 6 characters at least");
    return false;
  } 
  else if (confirm_password != password) {
    alert("Confirm password should equal password");
    return false;
  } 
  else {
    return true;
  }
}


function validate_login(){
  
  var email = document.login.email.value;
  var password = document.login.password.value;

 if (validate_email(email) == false) {
    alert("invalid email address, please try again");
    return false;
  } 
  else if (password.length < 6) {
    alert("password length should be 6 characters at least");
    return false;
  } 
  
  else {
    return true;
  }
}

function validate_update() {
  var username = document.update.username.value;
  var phone = document.update.phone.value;
  var address = document.update.address.value;
  var email = document.update.email.value;
  var password = document.update.password.value;
  var confirm_password = document.update.confirm_password.value;

  if (phone == "") {
    alert("Please enter the user phone");
    return false;
  } else if (username == "") {
    alert("Please enter the username");
    return false;
  } else if (address == "") {
    alert("Please enter the user address");
    return false;
  } 
  else if (validate_email(email) == false) {
    alert("invalid email address, please try again");
    return false;
  } 
  else if (password.length < 6) {
    alert("password length should be 6 characters at least");
    return false;
  } 
  else if (confirm_password != password) {
    alert("Confirm password should equal password");
    return false;
  } 
  else {
    return true;
  }
}

function validate_fields() {
  var username = document.order.username.value;
  var phone = document.order.phone.value;
  var address = document.order.address.value;

  if (phone == "") {
    alert("Please enter the user phone");
    return false;
  } else if (username == "") {
    alert("Please enter the username");
    return false;
  } else if (address == "") {
    alert("Please enter the user address");
    return false;
  } else {
    return true;
  }
}