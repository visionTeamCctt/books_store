function validate_email(inputValue) {
    var foundAt = false
    var foundDot = false
    var atPosition = -1
    var dotPosition = -1
    for (var i = 0; i <= inputValue.length; i++) {
        if (inputValue.charAt(i) == "@") {
            foundAt = true
            atPosition = i
        }
        else if (inputValue.charAt(i) == ".") {
            foundDot = true
            dotPosition = i
        }
    }

    if ((dotPosition == -1) || (atPosition == -1) || (atPosition > dotPosition)) {
        alert("invalid email address, please try again");
        return false;
    }
    else{
        return true;
    }
}


function validate_fields() {
    var username = document.order.username.value;
    var phone = document.order.phone.value;
    var address = document.order.address.value;
    
    if (phone == "") { alert("Please enter the user phone"); return false; }
    else if (username == "") { alert("Please enter the username") ; return false;}
    else if (address == "") { alert("Please enter the user address"); return false;}
    else {return true;}
}




