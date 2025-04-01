document.addEventListener('DOMContentLoaded', () => {

var myName = 'Deyan Panayotov';

var showName =() =>console.log(myName);

// console.log(window.myName);
window.showName();

var width = window.innerWidth; // променлива за ширина
console.log(width); // дава ни ширината на страницата но само на видимата част на прозореца
width = window.outerWidth; 
console.log(width);// дава ни ширината на страницата но на цялата част на страницата

var height = window.innerHeight; // създаваме променлива за височина
console.log(height); // дава ни височината на видимата част на страницата
height = window.outerHeight;
console.log(height); // дава ни височината на страницата но на цялата част на страницата

var toLoginPage = () => window.location.href = '/login.php';
var toRegPage = () => window.location.href = '/reg.php';

//window.location.href -> отваря в СЪЩИЯТ прозорец
    document.getElementById('enterButtonLogin').addEventListener('click', () => {
        toLoginPage();
    });

    document.getElementById('enterButtonReg').addEventListener('click', () => {
        toRegPage();
    });

//window open() -> отваря в НОВ прозорец или промпт
// window.open(url, windowName, [windowFeatures])
// document.getElementById('enterButtonReg').addEventListener('click', () => {
//     let url = '/reg.php';
//     let windowFeatures = 'height=500, width=500';
//     let windowRegPage = window.open(url, 'registrationForm', windowFeatures);
//     setTimeout(() => {
//         windowRegPage.resizeTo(1400, 700);
//         windowRegPage.moveTo(100, 300);
//     }, 5000)
// });

//setInterval()
// let counter = 0;

// const intervalId = setInterval(() => {
//     console.log(counter);
//     counter += 2;

//     if (counter > 5) { // Спиране при достигане на 6, защото увеличава през 2
//         clearInterval(intervalId);
//         console.log("Броячът е спрян."); // ще показва 4, защото следващото е 6, но вече брояча е спрян
//     }

// }, 2000);


//Видимост на паролата

    // Регистрация
    const toggleRegPassword = document.getElementById("toggleRegPassword");
    if (toggleRegPassword) {
        toggleRegPassword.addEventListener("click", function () {
            const passwordInput = document.getElementById("regPassword");
            const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
            passwordInput.setAttribute("type", type);

            const newIconPath = type === "password" 
                ? "/assets/img/Icons/visibility_18dp_000000.svg" 
                : "/assets/img/Icons/visibility_off_18dp_000000.svg";
            this.setAttribute("src", newIconPath);
        });
    }

    // Вход
    const toggleLoginPassword = document.getElementById("toggleLoginPassword");
    if (toggleLoginPassword) {
        toggleLoginPassword.addEventListener("click", function () {
            const passwordInput = document.getElementById("loginPassword");
            const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
            passwordInput.setAttribute("type", type);

            const newIconPath = type === "password" 
                ? "/assets/img/Icons/visibility_18dp_000000.svg" 
                : "/assets/img/Icons/visibility_off_18dp_000000.svg";
            this.setAttribute("src", newIconPath);
        });
    }

// За да вградите CSV файл с имената на градовете в HTML код и да запълните <select> елемента, 
//може да използвате JavaScript и библиотека като PapaParse за четене на CSV файлове. 
//Ето как да го направите:
// Път към CSV файла
const csvFilePath = '/assets/js/municipalities.csv';

// Елементът <select>, в който ще добавим градовете
const selectElement = document.getElementById('regCity');

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



});

// document.getElementById('enterButtonGoOn').addEventListener('click', function (e) {
//     e.preventDefault(); // Спира стандартното изпращане на формата


// });

function setRegisterValue() {
    if (document.activeElement.id === "enterButtonGoOn") {
        document.getElementById('register').value = "1";
    } else if (document.activeElement.id === "enterButtonReg") {
        document.getElementById('register').value = "2";
    }
    return true; // Позволява формата да бъде изпратена
}
