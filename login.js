function validate() {
    const username = document.getElementsByClassName('username');
    const email = document.getElementsByClassName('email');
    const password = document.getElementsByClassName('password');

    var validUsername = document.getElementsByClassName('username-valid');
    var validEmail = document.getElementsByClassName('email-valid');
    var validPassword = document.getElementsByClassName('password-valid');

    if(username.value == '') {
        validUsername.display[0].style.display = 'block';
    }
    else
    {
        validUsername.display[0].style.display = 'none';
    }
    if(email.value == '') {
        validEmail.display[0].style.display = 'block';
    }
    else
    {
        validEmail.display[0].style.display = 'none';
    }

    if(password.value == '') {
        validPassword.display[0].style.display = 'block';
    }
    else
    {
        validPassword.display[0].style.display = 'none';
    }
}

