function validar() {
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    if (email && password) {
        return true;
    } else {
        return false;
    }
}