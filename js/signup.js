document.addEventListener('DOMContentLoaded', function(){

    const form = document.getElementById('mainForm');
    const name = document.getElementById('name');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const passConfirm = document.getElementById('passConfirm');
    const rows = document.querySelectorAll('.form-row');
    // const form = document.getElementById('mainForm');

    // if(rows.classList.contains('error')){
    //     form.addEventListener('submit', function (e) {
    //         e.preventDefault();
    //         checkInputs();
    //     });
    // }
    // else{
    //     form.addEventListener('submit', function (e) {
    //         // e.preventDefault();
    //         checkInputs();
    //     });


    // }


    
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        checkInputs();
    });

    name.addEventListener('input', () => {
        validateField(name, isName(name.value.trim()), 'Cannot include numbers' );
        const message = document.querySelector('.form-message');
        message.textContent = '';
    });

    email.addEventListener('input', () => {
        validateField(email, isEmail(email.value.trim()), 'Not a valid email');
        const message = document.querySelector('.form-message');
        message.textContent = '';
    });

    password.addEventListener('input', () => {
        validateField(password, password.value.trim().length >= 8, 'Password must be at least 8 characters');
        validateField(passConfirm, passConfirm.value.trim() == password.value.trim(), 'Passwords must match');
        const message = document.querySelector('.form-message');
        message.textContent = '';
    });

    passConfirm.addEventListener('input', () => {
        validateField(passConfirm, passConfirm.value.trim() == password.value.trim(), 'Passwords must match');
        const message = document.querySelector('.form-message');
        message.textContent = '';
    });

    function checkInputs(){
        let isValid = true;
        let count = 0;
        validateField(name, isName(name.value.trim()), 'Cannot include numbers')
        validateField(email, isEmail(email.value.trim()), 'Not a valid email');
        validateField(password, password.value.trim().length >= 8, 'Password must be at least 8 characters');
        validateField(passConfirm, passConfirm.value.trim() == password.value.trim() && passConfirm.value.trim().length != 0, 'Passwords must match');

        document.querySelectorAll('.form-row').forEach((control) => {
            if(control.classList.contains('error')){
                isValid = false;
                count++;
            }
        });

        if(count != 0){
            // localStorage.setItem("auth", 1);
            // form.submit();
            // console.log("nay");
            const message = document.querySelector('.form-message');
            message.className = 'form-message error';
            message.textContent = 'Unable to submit, check username or password';
        }
        else{
            // localStorage.setItem("auth", 1);
            const message = document.querySelector('.form-message');
            message.className = 'form-message success';
            message.textContent = 'You have successfully logged in';
            form.submit();
            // console.log("yay");
        }


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
        formRow.className = 'form-row'; //Resets the name so that checkInputs loop doesnt tag the error
    }

    function setError(input, message){
        const formRow = input.parentElement;
        const icon = formRow.querySelector("i");
        icon.className = 'cross-icon';
        input.placeholder = message;
        formRow.className = 'form-row error'; //Allows the checkInputs loop to catch the error
        // errorMsg.textContent = message;

    }

    function isName(name){
        return /^[a-zA-Z]{2,}$/.test(name);
    }

    function isEmail(email) {
        return /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/.test(email);
    }






});
