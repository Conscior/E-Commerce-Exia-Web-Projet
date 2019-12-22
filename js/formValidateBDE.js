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

// Fonction de désactivation de l'affichage des "warnings"
function warningsOff() {

    var warnings = document.querySelectorAll('.warning'),
        warningsLength = warnings.length;

    for (var i = 0; i < warningsLength; i++) {
        warnings[i].style.display = 'none';
    }

}


// La fonction ci-dessous permet de récupérer la "tooltip" qui correspond à notre input

function getWarning(elements) {

    while (elements = elements.nextSibling) {
        if (elements.className === 'warning') {
            return elements;
        }
    }
    return false;
}


// Fonctions de vérification du formulaire, elles renvoient "true" si tout est ok

var check = {}; // On met toutes nos fonctions dans un objet littéral


check['lastName'] = function(id) {

    var name = document.getElementById(id),
        warningstyle = getWarning(name).style;

    if (name.value.length > 0) {
        name.className = 'correct';
        warningstyle.display = 'none';
        return true;
    } else {
        name.className = 'incorrect';
        warningstyle.display = 'inline-block';
        return false;
    }

};

check['firstName'] = check['lastName']; 

check['location'] = function() {
    var location = document.getElementById('location'),
        warningstyle = getWarning(location).style;

        if (location.options[location.selectedIndex].value == "") {
            warningstyle.display = 'inline-block';
            return false;
        } else {
            warningstyle.display = 'none';
            return true;
        }
               
};


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

check['password'] = function() {

    var password = document.getElementById('password'),
        warningstyle = getWarning(password).style;

    if (password.value.length > 0 && hasNumber(password.value) && hasUpperCase(password.value)) {
        password.className = 'correct';
        warningstyle.display = 'none';
        return true;
    } else {
        password.className = 'incorrect';
        warningstyle.display = 'inline-block';
        return false;
    }

};

check['passwordBDE'] = function() {

    var passwordBDE = document.getElementById('passwordBDE'),
        warningstyle = getWarning(passwordBDE).style;

    if (passwordBDE.value == "root") {
        passwordBDE.className = 'correct';
        warningstyle.display = 'none';
        return true;
    } else {
        passwordBDE.className = 'incorrect';
        warningstyle.display = 'inline-block';
        return false;
    }

};




(function() {

    var myForm = document.getElementById('myForm_Inscription'),
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