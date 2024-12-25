document.addEventListener('DOMContentLoaded', () => {
    // Унифицирана функция за скриване/показване на парола
    document.querySelectorAll('.toggle-password').forEach(toggleIcon => {
        toggleIcon.addEventListener('click', function () {
            const passwordField = document.querySelector(this.dataset.target); // Свързано поле
            const isPassword = passwordField.type === 'password';
            passwordField.type = isPassword ? 'text' : 'password';
            this.innerHTML = isPassword ? '&#128064;' : '&#128065;'; // Смяна на иконата
        });
    });

    // Универсална валидация
    function validateField(selector, validationRules) {
        const field = document.querySelector(selector);
        const errorElem = document.querySelector(`${selector} ~ .error`);

        field.addEventListener('input', () => {
            const value = field.value;
            let errorMessage = '';

            for (let rule of validationRules) {
                if (!rule.validate(value)) {
                    errorMessage = rule.message;
                    break;
                }
            }

            errorElem.innerHTML = errorMessage;
        });
    }

    // Валидация за полета
    validateField("[name='firstName']", [
        { validate: value => value !== '', message: 'Полето не може да бъде празно' },
        { validate: value => value.length >= 3 && value.length <= 20, message: 'Въведете между 3 и 20 символа' },
    ]);

    validateField("[name='lastName']", [
        { validate: value => value !== '', message: 'Полето не може да бъде празно' },
        { validate: value => value.length >= 3 && value.length <= 20, message: 'Въведете между 3 и 20 символа' },
    ]);

    validateField("[name='registerEmail']", [
        { validate: value => value !== '', message: 'Полето не може да бъде празно' },
        {
            validate: value => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value),
            message: 'Въведете валиден имейл',
        },
    ]);

    validateField("[name='regPassword']", [
        { validate: value => value !== '', message: 'Въведете парола' },
        { validate: value => /[A-Z]/.test(value), message: 'Поне една главна буква' },
        { validate: value => /[a-z]/.test(value), message: 'Поне една малка буква' },
        { validate: value => /[0-9]/.test(value), message: 'Поне една цифра' },
        { validate: value => /[?!@#%&]/.test(value), message: 'Поне един символ (? ! @ # % &)' },
        { validate: value => value.length >= 6, message: 'Дължината трябва да е поне 6 символа' },
    ]);

    validateField("[name='confirmPassword']", [
        { 
            validate: (value) => value === document.querySelector("[name='regPassword']").value, 
            message: 'Паролите не съвпадат' 
        },
    ]);
});
