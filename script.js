document.addEventListener("DOMContentLoaded", function() {
    const forms = document.querySelectorAll('form');
    
    forms.forEach(form => {
        form.addEventListener('submit', function(event) {
            const name = form.querySelector('input[name="name"]');
            const email = form.querySelector('input[name="email"]');
            const phone = form.querySelector('input[name="phone"]');
            const checkinDate = form.querySelector('input[name="checkin_date"]');
            const checkoutDate = form.querySelector('input[name="checkout_date"]');
            const roomType = form.querySelector('input[name="room_type"]');
            let valid = true;

            // Clear previous error messages
            const errorMessages = form.querySelectorAll('.error-message');
            errorMessages.forEach(error => error.remove());

            // Validate name
            if (!name.value.trim()) {
                showError(name, 'Name is required');
                valid = false;
            }

            // Validate email
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!email.value.trim() || !emailPattern.test(email.value.trim())) {
                showError(email, 'Valid email is required');
                valid = false;
            }

            // Validate phone
            const phonePattern = /^\d{10}$/;
            if (!phone.value.trim() || !phonePattern.test(phone.value.trim())) {
                showError(phone, 'Valid 10-digit phone number is required');
                valid = false;
            }

            // Validate check-in date
            if (!checkinDate.value) {
                showError(checkinDate, 'Check-in date is required');
                valid = false;
            }

            // Validate check-out date
            if (!checkoutDate.value) {
                showError(checkoutDate, 'Check-out date is required');
                valid = false;
            } else if (checkinDate.value && new Date(checkoutDate.value) <= new Date(checkinDate.value)) {
                showError(checkoutDate, 'Check-out date must be after check-in date');
                valid = false;
            }

            // Validate room type
            if (!roomType.value.trim()) {
                showError(roomType, 'Room type is required');
                valid = false;
            }

            if (!valid) {
                event.preventDefault();
            }
        });
    });

    function showError(element, message) {
        const error = document.createElement('div');
        error.className = 'error-message';
        error.textContent = message;
        element.parentNode.insertBefore(error, element.nextSibling);
    }
});


document.addEventListener("DOMContentLoaded", function() {
    const registerForm = document.querySelector('form[action="register.php"]');
    const loginForm = document.querySelector('form[action="login.php"]');

    if (registerForm) {
        registerForm.addEventListener('submit', function(event) {
            const username = registerForm.querySelector('input[name="username"]');
            const password = registerForm.querySelector('input[name="password"]');
            let valid = true;

            // Clear previous error messages
            clearErrors(registerForm);

            // Validate username
            if (!username.value.trim()) {
                showError(username, 'Username is required');
                valid = false;
            }

            // Validate password
            if (!password.value.trim()) {
                showError(password, 'Password is required');
                valid = false;
            }

            if (!valid) {
                event.preventDefault();
            }
        });
    }

    if (loginForm) {
        loginForm.addEventListener('submit', function(event) {
            const username = loginForm.querySelector('input[name="username"]');
            const password = loginForm.querySelector('input[name="password"]');
            let valid = true;

            // Clear previous error messages
            clearErrors(loginForm);

            // Validate username
            if (!username.value.trim()) {
                showError(username, 'Username is required');
                valid = false;
            }

            // Validate password
            if (!password.value.trim()) {
                showError(password, 'Password is required');
                valid = false;
            }

            if (!valid) {
                event.preventDefault();
            }
        });
    }

    function showError(element, message) {
        const error = document.createElement('div');
        error.className = 'error-message';
        error.textContent = message;
        element.parentNode.insertBefore(error, element.nextSibling);
    }

    function clearErrors(form) {
        const errorMessages = form.querySelectorAll('.error-message');
        errorMessages.forEach(error => error.remove());
    }
});
