// var el = document.getElementsByClassName('signup-btn');
//     for (var i = 0; i < el.length; i++) {
//         el[i].addEventListener("click",function(){
//             document.querySelector('.bg-signup-modal').style.display="flex";
//         });
//     };
// document.querySelector('.close1').addEventListener("click",function(){
//     document.querySelector('.bg-signup-modal').style.display="none";
// });


function validateForm() {
    let y = document.forms["myForm"]["fname"].value;
    if (y == "") {
      alert("First Name must be filled out");
      return false;
    }
    let x = document.forms["myForm"]["lname"].value;
    if (x == "") {
      alert("Last Name must be filled out");
      return false;
    }
    let z = document.forms["myForm"]["number"].value;
    if (z == "") {
      alert("Number must be filled out");
      return false;
    }
    var phoneno = /^[9]\d{9}$/;
    if(z.match(phoneno))
        {
      return true;
        }
      else
        {
        alert("Number must start with 9 with atleast 10 digit number");
        return false;
        }
  }


  function validate_password() {
 
    var pass = document.getElementById('psw').value;
    var confirm_pass = document.getElementById('confirm_pass').value;
    if (pass != confirm_pass) {
        document.getElementById('wrong_pass_alert').style.color = 'red';
        document.getElementById('wrong_pass_alert').innerHTML= '☒ Use same password';
        document.getElementById('create').disabled = true;
        document.getElementById('create').style.opacity = (0.4);
    } else {
        document.getElementById('wrong_pass_alert').style.color = 'green';
        document.getElementById('wrong_pass_alert').innerHTML ='🗹 Password Matched';
        document.getElementById('create').disabled = false;
        document.getElementById('create').style.opacity = (1);
    }
}

function wrong_pass_alert() {
    if (document.getElementById('psw').value != "" &&
        document.getElementById('confirm_pass').value != "") {
    } else {
        alert("Please fill all the fields");
    }
}




var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }


  // Validate Special characters
  var character = /[!@#$%^&*+`~=?\|<>/]/g;
  if(myInput.value.match(character)) {
    characters.classList.remove("invalid");
    characters.classList.add("valid");
  } else {
    characters.classList.remove("valid");
    characters.classList.add("invalid");
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
    
