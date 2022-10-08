const myInput = document.getElementById('emailinput')
const myPassword = document.getElementById('password_input');
const myButton = document.getElementById('mybtn');


myButton.onclick = function() {
    if (myButton.textContent === 'sh') {
        myPassword.setAttribute('type', 'text');
        myButton.innerHTML = 'HI';
    } else {
        myPassword.setAttribute('type', 'password');
        myButton.innerHTML = 'sh';
    }
}