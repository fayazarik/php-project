function validate(){
    var name = document.getElementById("name").value;
    var address = document.getElementById("address").value;
    var phone = document.getElementById("phone").value;
    var password = document.getElementById("password").value;
  
    error_message.style.padding = "10px";
    
    var text;
    if(name.length < 1){
      text = "At least 1 character is required";
      error_message.innerHTML = text;
      return false;
    }
    if(address.length < 3){
        text = "At least 3 characters are required";
        error_message.innerHTML = text;
        return false;
    }
    if(isNaN(phone) || phone.length != 10){
      text = "Please Enter a valid Phone Number";
      error_message.innerHTML = text;
      return false;
    }
    if(email.indexOf("@") == -1 || email.length < 6){
      text = "Please Enter a valid Email";
      error_message.innerHTML = text;
      return false;
    }
    if(password.length <= 8){
      text = "At least 8 characters are required";
      error_message.innerHTML = text;
      return false;
    }
    alert("Updated Successfully!");
    return true;
  }