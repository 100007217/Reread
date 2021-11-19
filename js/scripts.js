function validar() {
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    if (email && password) {
        return true;
    } else if (email == "" && password == "") {
        document.getElementById("mensaje").innerHTML = "Falta mail y password";
        document.getElementById("email").style.borderColor = "red"
        document.getElementById("password").style.borderColor = "red"
        return false
    } else if (email == "" || password == "") {
        if (email == "") {
            document.getElementById("mensaje").innerHTML = "Falta mail";
            document.getElementById("email").style.borderColor = "red"
            document.getElementById("password").style.borderColor = "#4CAF50"
            return false
        } else {
            document.getElementById("mensaje").innerHTML = "Falta pass";
            document.getElementById("password").style.borderColor = "red"
            document.getElementById("email").style.borderColor = "#4CAF50"
            return false
        }
    }
}