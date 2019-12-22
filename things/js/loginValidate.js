function hasNumber(myString) {
    return /\d/.test(myString);
  }
  
  function hasUpperCase(str) {
          if(str.toLowerCase() != str) {
              return true;
          }
          return false;
      }

function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }


function warningsOff() {

    var warnings = document.querySelectorAll('.warning'),
        warningsLength = warnings.length;

    for (var i = 0; i < warningsLength; i++) {
        warnings[i].style.display = 'none';
    }

}

function getWarning(elements) {

    while (elements = elements.nextSibling) {
        if (elements.className === 'warning') {
            return elements;
        }
    }
    return false;
}



var check = {}; 


check['email'] = function() {

    var email = document.getElementById('email'),
        warningstyle = getWarning(email).style;

    if (email.value.length > 0 && validateEmail(email.value)) {
        email.className = 'correct';
        warningstyle.display = 'none';
        return true;
    } else {
        email.className = 'incorrect';
        warningstyle.display = 'inline-block';
        return false;
    }

};


(function() {

    var myForm = document.getElementById('myForm_Login'),
        inputs = document.querySelectorAll('input[type=text], input[type=password]'),
        inputsLength = inputs.length;

    for (var i = 0; i < inputsLength; i++) {
        inputs[i].addEventListener('keyup', function(e) {
            check[e.target.id](e.target.id); 
        });
    }

    myForm.addEventListener('submit', function(e) {

        var result = true;

        for (var i in check) {
            result = check[i](i) && result;
        }

        if (!result) {
            e.preventDefault();
        }
    });
    
})();

warningsOff();