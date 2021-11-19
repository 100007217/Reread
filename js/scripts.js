function validar() {
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    if (email && password) {
        return true;
    } else if (email == "" && password == "") {
        document.getElementById("mensaje").innerHTML = "Falta mail y password";
        return false
    } else if (email == "" || password == "") {
        if (email == "") {
            document.getElementById("mensaje").innerHTML = "Falta mail";
            return false
        } else {
            document.getElementById("mensaje").innerHTML = "Falta pass";
            return false
        }
    }
}