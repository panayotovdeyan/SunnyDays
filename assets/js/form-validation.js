// document.querySelector("[name='firstName']").addEventListener('keyup', () => {
//     const firstName = document.forms['registration']['firstName'].value;
//     if (firstName === '') {
//         document.querySelector("[name='firstName'] ~ .error").innerHTML = 'Грешка: Полето не може да бъде празно';
//         return false
//     } else if (firstName.length < 3 || firstName.length > 20){
//         document.querySelector("[name='firstName'] ~ .error").innerHTML = 'Въведете между 3 и 20 символа';
//         return false
//     } else {
//         document.querySelector("[name='firstName'] ~ .error").innerHTML = '';
//     }
// });


// // Валидация за Last Name

// document.querySelector("[name='lastName']").addEventListener('keyup', validateLastName);
// function validateLastName() {
//     let lastNameValue = document.querySelector('[name="lastName"]').value;
//     let errorElem = document.querySelector('[name="lastName"] ~ .error');
//     if (lastNameValue === '') {
//         errorElem.innerHTML = 'Грешка: Полето не може да бъде празно';
//     } else if (lastNameValue.length < 3 || lastNameValue.length > 20) {
//         errorElem.innerHTML = 'Въведете между 3 и 20 символа';
//     } else {
//         errorElem.innerHTML = '';
//     }
// }

// // Валидация за Email
// document.querySelector('[name="registerEmail"]').addEventListener('keyup', validateEmail);
// function validateEmail() {
//     let emailValue = document.querySelector('[name="registerEmail"]').value;
//     let emailRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
//     let errorElem = document.querySelector('[name="registerEmail"] ~ .error');
//     if (emailValue === '') {
//         errorElem.innerHTML = 'Грешка: Полето не може да бъде празно';
//     } else if (!emailRegex.test(emailValue)) {
//         errorElem.innerHTML = 'При валиден имейл това съобщение ще се скрие';
//     } else {
//         errorElem.innerHTML = '';
//     }
// }

    //egn validation
    // numberValidator = egn.match(regexOnlyNumbers); - не се ползва за сега

// document.querySelector("[name='egn']").addEventListener('keyup', () => {
//     const egn = document.forms['registration']['egn'].value;
//     const regexOnlyNumbers = /^\d{2}(0[1-9]|1[0-2]|[2-3][0-9])(0[1-9]|[12][0-9]|3[01])\d{3}\d$/;
    
//     if (egn === '') {
//         document.querySelector("[name='egn'] ~ .error").innerHTML = '';
//         return false
//     } else if (!regexOnlyNumbers.test(egn)) {
//         document.querySelector("[name='egn'] ~ .error").innerHTML = 'ENG is wrong';
//         return false
//     } else {
//         document.querySelector("[name='egn'] ~ .error").innerHTML = '';
//     }
// });



        
// Валидация за Password
// // document.querySelector('[name="password"]').addEventListener('keyup', validatePassword);

// // function validatePassword() {
// //     var passwordValue = document.querySelector('[name="password"]').value;
// //     var errorElem = document.querySelector('[name="password"] ~ .error');
// //     if (passwordValue.length === 0) {
// //         errorElem.innerHTML = 'Напишете парола (latin)';
// //     } else if (!/[A-Z]/.test(passwordValue)) {
// //         errorElem.innerHTML = 'Напишете поне една главна буква (latin)';
// //     } else if (!/[a-z]/.test(passwordValue)) {
// //         errorElem.innerHTML = 'Напишете поне една малка буква (latin)';
// //     } else if (!/[0-9]/.test(passwordValue)) {
// //         errorElem.innerHTML = 'Напишете поне една цифра (latin)';
// //     } else if (!/[?!@#%&]/.test(passwordValue)) {
// //         errorElem.innerHTML = 'Напишете поне един символ от: ?!@#%&';
// //     } else if (passwordValue.length < 6) {
// //         errorElem.innerHTML = 'Дължината на паролата трябва да е най-малко 6';
// //     } else {
// //         errorElem.innerHTML = '';
// //     }
// // }

// // Валидация за Confirm Password
// document.querySelector('[name="confirmPassword"]').addEventListener('keyup', validateConfirmPassword);

// function validateConfirmPassword() {
//     let confirmPasswordValue = document.querySelector('[name="confirmPassword"]').value;
//     let passwordValue = document.querySelector('[name="password"]').value;
//     let errorElem = document.querySelector('[name="confirmPassword"] ~ .error');
//     if (confirmPasswordValue !== passwordValue) {
//         errorElem.innerHTML = 'Паролите не съвпадат';
//     } else {
//         errorElem.innerHTML = '';
//     }
// }

// // Добавяне на класове на полетата
// document.querySelectorAll('input[type="password"]').forEach((el) => {
//     el.classList.add('password');
// });
// document.querySelectorAll('selected').forEach((el) => {
//     el.classList.add('selected');
// });
// document.querySelectorAll('input:checked').forEach((el) => {
//     el.classList.add('checked');
// });

// Универсална функция за валидация вместо целия горен код
// Обяснение на кода:
// Функция validateField:

// Приема селектор за полето и масив с правила за валидация.
// Всяко правило съдържа:
// validate: функция, която връща true или false в зависимост от това дали правилото е изпълнено.
// message: съобщение за грешка, което се показва, ако правилото не е изпълнено.
// Проверява всички правила при събитие keyup.
// Изчистване на грешките:

// Ако всички правила са изпълнени, полето за грешка остава празно.
// Пример за добавяне на нови правила:

// Можете лесно да добавите нови правила към всяко поле, като добавите нови обекти в масива validationRules.
// Ползи:
// Логиката за валидация е обобщена, което я прави лесна за поддръжка и разширяване.
// Намалявате дублирането на код.
// Лесно добавяне на нови полета за валидация.

//Ето как изглежда кода:

// Универсална функция за валидация
function validateField(selector, validationRules) {
    const field = document.querySelector(selector);
    const errorElem = document.querySelector(`${selector} ~ .error`);
    
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
    const errorElem = document.querySelector(`${selector} ~ .error`);

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



// Вземане на данни от формата
// document.querySelector('[name="registration"]').addEventListener('submit', function (event) {
//     let formData = new FormData(this);
//     console.log('formData', [...formData.entries()]); // Логва сериализираните данни
//     event.preventDefault(); // Предотвратява изпращането на формата
// });


// querySelector
// querySelectorAll


//submit session

// let formValue = {};

// document.forms['registration'].addEventListener('submit', (event) => {
//         // event.preventDefault(); // същaта роля като return false
//         formValue = {
//         register_name: document.forms['registration']['register_name'].value,
//         lastName: document.forms['registration']['lastName'].value,
//         email: document.forms['registration']['email'].value,
//         egn: document.forms['registration']['egn'].value
//     }
//     localStorage.setItem('regData', JSON.stringify(formValue));
//     alert('Your registration is successful');
//     window.location.href = '/'; // Пренасочва към началната страница (например index.html)
  
//     console.log('formValue', formValue);
// });

// let data = localStorage.getItem('regData');
// // console.log('DATA', data);

// function clearStorageData() {
//     alert('Are You sure to Log Out?');
//     localStorage.clear();
// }

// document.getElementById('logOut').onclick = () => {
//     // localStorage.clear(); -> Изчиства всички данни от localStorage. Това означава, че всички ключове и стойности, които са съхранени в localStorage, ще бъдат премахнати
//     localStorage.removeItem('regData');  // Премахва само 'regData'
// }