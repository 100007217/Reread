function validar() {
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    alert("Has entrado en la fucnion")
    if (email && password) {
        alert("Has introducido  lo campos")
        return true;
    } else {
        alert("Te ha fallado algun campo")
        return false;
    }
}