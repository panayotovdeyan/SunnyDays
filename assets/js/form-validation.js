document.querySelector("[name='firstName']").addEventListener('keyup', () => {
    const firstName = document.forms['registration']['firstName'].value;
    if (firstName === '') {
        document.querySelector("[name='firstName'] ~ .error").innerHTML = 'Грешка: Полето не може да бъде празно';
        return false
    } else if (firstName.length < 3 || firstName.length > 20){
        document.querySelector("[name='firstName'] ~ .error").innerHTML = 'Въведете между 3 и 20 символа';
        return false
    } else {
        document.querySelector("[name='firstName'] ~ .error").innerHTML = '';
    }
});


// Валидация за Last Name

document.querySelector("[name='lastName']").addEventListener('keyup', validateLastName);
function validateLastName() {
    let lastNameValue = document.querySelector('[name="lastName"]').value;
    let errorElem = document.querySelector('[name="lastName"] ~ .error');
    if (lastNameValue === '') {
        errorElem.innerHTML = 'Грешка: Полето не може да бъде празно';
    } else if (lastNameValue.length < 3 || lastNameValue.length > 20) {
        errorElem.innerHTML = 'Въведете между 3 и 20 символа';
    } else {
        errorElem.innerHTML = '';
    }
}

// Валидация за Email
document.querySelector('[name="registerEmail"]').addEventListener('keyup', validateEmail);
function validateEmail() {
    let emailValue = document.querySelector('[name="registerEmail"]').value;
    let emailRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    let errorElem = document.querySelector('[name="registerEmail"] ~ .error');
    if (emailValue === '') {
        errorElem.innerHTML = 'Грешка: Полето не може да бъде празно';
    } else if (!emailRegex.test(emailValue)) {
        errorElem.innerHTML = 'При валиден имейл това съобщение ще се скрие';
    } else {
        errorElem.innerHTML = '';
    }
}


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
document.querySelector('[name="password"]').addEventListener('keyup', validatePassword);

function validatePassword() {
    var passwordValue = document.querySelector('[name="password"]').value;
    var errorElem = document.querySelector('[name="password"] ~ .error');
    if (passwordValue.length === 0) {
        errorElem.innerHTML = 'Напишете парола (latin)';
    } else if (!/[A-Z]/.test(passwordValue)) {
        errorElem.innerHTML = 'Напишете поне една главна буква (latin)';
    } else if (!/[a-z]/.test(passwordValue)) {
        errorElem.innerHTML = 'Напишете поне една малка буква (latin)';
    } else if (!/[0-9]/.test(passwordValue)) {
        errorElem.innerHTML = 'Напишете поне една цифра (latin)';
    } else if (!/[?!@#%&]/.test(passwordValue)) {
        errorElem.innerHTML = 'Напишете поне един символ от: ?!@#%&';
    } else if (passwordValue.length < 6) {
        errorElem.innerHTML = 'Дължината на паролата трябва да е най-малко 6';
    } else {
        errorElem.innerHTML = '';
    }
}

// Валидация за Confirm Password
document.querySelector('[name="confirmPassword"]').addEventListener('keyup', validateConfirmPassword);

function validateConfirmPassword() {
    let confirmPasswordValue = document.querySelector('[name="confirmPassword"]').value;
    let passwordValue = document.querySelector('[name="password"]').value;
    let errorElem = document.querySelector('[name="confirmPassword"] ~ .error');
    if (confirmPasswordValue !== passwordValue) {
        errorElem.innerHTML = 'Паролите не съвпадат';
    } else {
        errorElem.innerHTML = '';
    }
}

// Добавяне на класове на полетата
document.querySelectorAll('input[type="password"]').forEach((el) => {
    el.classList.add('password');
});
document.querySelectorAll('selected').forEach((el) => {
    el.classList.add('selected');
});
document.querySelectorAll('input:checked').forEach((el) => {
    el.classList.add('checked');
});



// Вземане на данни от формата
document.querySelector('[name="registration"]').addEventListener('submit', function (event) {
    let formData = new FormData(this);
    console.log('formData', [...formData.entries()]); // Логва сериализираните данни
    event.preventDefault(); // Предотвратява изпращането на формата
});


// querySelector
// querySelectorAll


//submit session

let formValue = {};

document.forms['registration'].addEventListener('submit', (event) => {
        // event.preventDefault(); // същaта роля като return false
        formValue = {
        register_name: document.forms['registration']['register_name'].value,
        lastName: document.forms['registration']['lastName'].value,
        email: document.forms['registration']['email'].value,
        egn: document.forms['registration']['egn'].value
    }
    localStorage.setItem('regData', JSON.stringify(formValue));
    alert('Your registration is successful');
    window.location.href = '/'; // Пренасочва към началната страница (например index.html)
  
    console.log('formValue', formValue);
});

let data = localStorage.getItem('regData');
// console.log('DATA', data);

function clearStorageData() {
    alert('Are You sure to Log Out?');
    localStorage.clear();
}

// document.getElementById('logOut').onclick = () => {
//     // localStorage.clear(); -> Изчиства всички данни от localStorage. Това означава, че всички ключове и стойности, които са съхранени в localStorage, ще бъдат премахнати
//     localStorage.removeItem('regData');  // Премахва само 'regData'
// }



// За да вградите CSV файл с имената на градовете в HTML код и да запълните <select> елемента, 
//може да използвате JavaScript и библиотека като PapaParse за четене на CSV файлове. 
//Ето как да го направите:
// Път към CSV файла
const csvFilePath = '/assets/js/municipalities.csv';

// Елементът <select>, в който ще добавим градовете
const selectElement = document.getElementById('city-select');

// Функция за зареждане на CSV файла
function loadCSV(filePath, callback) {
    fetch(filePath)
        .then(response => response.text())
        .then(data => {
            const rows = data.split('\n');
            callback(rows);
        })
        .catch(error => console.error('Грешка при зареждането на CSV файла:', error));
}

// Функция за добавяне на градове в <select>
function populateSelect(cities) {
    cities.forEach(city => {
        if (city.trim()) { // Проверка за празни редове
            const option = document.createElement('option');
            option.value = city.trim();
            option.textContent = city.trim();
            selectElement.appendChild(option);
        }
    });
}

// Зареждане на CSV файла и добавяне на градове
loadCSV(csvFilePath, populateSelect);


// Показване/Скриване на паролата с икона в рег. формата
document.getElementById('toggle-password').addEventListener('click', function () {
    const passwordField = document.querySelector('[name="password"]');
    const toggleIcon = document.getElementById('toggle-password');

    if (passwordField.type === 'password') {
        passwordField.type = 'text'; // Превключване на типа на "text"
        toggleIcon.innerHTML = '&#128064;'; // Смяна на иконата
    } else {
        passwordField.type = 'password'; // Превключване обратно на "password"
        toggleIcon.innerHTML = '&#128065;'; // Връщане на оригиналната икона
    }
});

// Показване/Скриване на паролата с икона в логин страницата
