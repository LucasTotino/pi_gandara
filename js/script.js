const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

// Script de Abas

function Mudarestado(icms) {
    var display = document.getElementById(icms).style.display;
    if(display == "none")
        document.getElementById(icms).style.display = 'block';
    else
        document.getElementById(icms).style.display = 'none';
}
