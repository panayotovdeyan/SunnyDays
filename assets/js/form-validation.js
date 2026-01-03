console.log("form-validation.js е зареден успешно");
document.addEventListener('DOMContentLoaded', () => {
    console.log("DOM-form-validation.js е напълно зареден");

        // Универсална функция за валидация
        function validateField(selector, validationRules) {
            const field = document.querySelector(selector);
            if (!field) return; // Спри, ако полето го няма на тази страница
            const errorElem = field.closest('.form-group').querySelector('.error');
            
            field.addEventListener('keyup', () => {
                const value = field.value;
                let errorMessage = '';

                // Преглед на всички правила за валидация
                for (let rule of validationRules) {
                    if (!rule.validate(value)) {
                        errorMessage = rule.message;
                        break;
                    }
                }

                // Показване на грешката или изчистване
                errorElem.innerHTML = errorMessage;
            });
        }

        // Валидация на свързани полета (пример: confirmPassword)
        function validateRelatedFields(selector, relatedSelector, validationRules) {
            const field = document.querySelector(selector);
            const relatedField = document.querySelector(relatedSelector);
            if (!field || !relatedField) return; // Спри, ако полетата ги няма
            const errorElem = field.closest('.form-group').querySelector('.error');

            field.addEventListener('keyup', () => {
                const value = field.value;
                const relatedValue = relatedField.value;
                let errorMessage = '';

                for (let rule of validationRules) {
                    if (!rule.validate(value, relatedValue)) {
                        errorMessage = rule.message;
                        break;
                    }
                }
                errorElem.innerHTML = errorMessage;
            });
        }

        // Добавяне на валидация за първо име, фамилия и имейл
        validateField("[name='firstName']", [
            { validate: value => value !== '', message: 'Грешка: Полето не може да бъде празно' },
            { validate: value => value.length >= 3 && value.length <= 20, message: 'Въведете между 3 и 20 символа' },
        ]);

        validateField("[name='lastName']", [
            { validate: value => value !== '', message: 'Грешка: Полето не може да бъде празно' },
            { validate: value => value.length >= 3 && value.length <= 20, message: 'Въведете между 3 и 20 символа' },
        ]);

        validateField("[name='regEmail']", [
            { validate: value => value !== '', message: 'Грешка: Полето не може да бъде празно' },
            { 
                validate: value => /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value), 
                message: 'Въведете валиден имейл' 
            },
        ]);

        // Добавяне на валидация за парола
        validateField("[name='regPassword']", [
            { validate: value => /[A-Z]/.test(value), message: 'Напишете поне една главна буква (latin)' },
            { validate: value => /[a-z]/.test(value), message: 'Напишете поне една малка буква (latin)' },
            { validate: value => /[0-9]/.test(value), message: 'Напишете поне една цифра' },
            { validate: value => /[?!@#%&]/.test(value), message: 'Напишете поне един символ от: ?!@#%&' },
            { validate: value => value.length >= 6, message: 'Дължината на паролата трябва да е най-малко 6' },
        ]);

        // Валидация за потвърждение на парола
        validateRelatedFields("[name='confirmPassword']", "[name='regPassword']", [
            { validate: (value, relatedValue) => value === relatedValue, message: 'Паролите не съвпадат' },
        ]);

        // Добавяне на класове на полетата
        document.querySelectorAll('input[type="password"]').forEach(el => el.classList.add('password'));
        document.querySelectorAll('select').forEach(el => el.classList.add('selected'));
        document.querySelectorAll('input:checked').forEach(el => el.classList.add('checked'));

        // Проверка дали сме на страницата за ресет на парола
        const newPassField = document.querySelector("[name='new_password']");
        if (newPassField) {
            // Валидация за новата парола
            validateField("[name='new_password']", [
                { validate: value => /[A-Z]/.test(value), message: 'Напишете поне една главна буква (latin)' },
                { validate: value => /[a-z]/.test(value), message: 'Напишете поне една малка буква (latin)' },
                { validate: value => /[0-9]/.test(value), message: 'Напишете поне една цифра' },
                { validate: value => /[?!@#%&]/.test(value), message: 'Напишете поне един символ от: ?!@#%&' },
                { validate: value => value.length >= 6, message: 'Дължината на паролата трябва да е най-малко 6' },
            ]);

            // Валидация за потвърждение
            validateRelatedFields("[name='confirm_password']", "[name='new_password']", [
                { validate: (value, relatedValue) => value === relatedValue, message: 'Паролите не съвпадат' },
            ]);
        }

});