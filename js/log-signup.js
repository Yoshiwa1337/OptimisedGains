document.addEventListener('DOMContentLoaded', function(){

    const form = document.getElementById('mainForm');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const passConfirm = document.getElementById('passConfirm');
    // const form = document.getElementById('mainForm');

    
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        checkInputs();
        if(checkInputs()){
            const message = this.querySelector('.form-message');
            message.textContent = 'You have successfully logged in';
        }
        else{
            console.log("Error");
        }
    })

    email.addEventListener('input', () => {
        validateField(email, isEmail(email.value.trim()), 'Not a valid email');
    });

    password.addEventListener('input', () => {
        validateField(password, password.value.trim().length >= 8, 'Password must be at least 8 characters');
        validateField(passConfirm, passConfirm.value.trim() == password.value.trim(), 'Passwords must match');
    });

    passConfirm.addEventListener('input', () => {
        validateField(passConfirm, passConfirm.value.trim() == password.value.trim(), 'Passwords must match');
    });

    function checkInputs(){
        let isValid = true;
        validateField(email, isEmail(email.value.trim()), 'Not a valid email');
        validateField(password, password.value.trim().length >= 8, 'Password must be at least 8 characters');
        validateField(passConfirm, passConfirm.value.trim() == password.value.trim() && passConfirm.value.trim().length != 0, 'Passwords must match');

        document.querySelectorAll('.form-row').forEach((control) => {
            if(control.classList.contains('error')){
                isValid = false;
            }
        });

        return isValid;

    }

    function validateField(input, condition, errorMessage){
        if(condition){
            setSuccess(input);
        }
        else{
            setError(input, errorMessage);
        }
    }

    function setSuccess(input){
        const formRow = input.parentElement;
        const icon = formRow.querySelector("i");
        icon.className = 'tick-icon';
    }

    function setError(input, message){
        const formRow = input.parentElement;
        const icon = formRow.querySelector("i");
        icon.className = 'cross-icon';
        input.placeholder = message;
        // errorMsg.textContent = message;

    }

    function isEmail(email) {
        return /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/.test(email);
    }





});