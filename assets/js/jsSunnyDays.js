document.addEventListener('DOMContentLoaded', () => {

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

    function setRegisterValue() {
        if (document.activeElement.id === "enterButtonGoOn") {
            document.getElementById('register').value = "1";
        } else if (document.activeElement.id === "enterButtonReg") {
            document.getElementById('register').value = "2";
        }
        return true; // Позволява формата да бъде изпратена
    }


});

var width = window.innerWidth; // променлива за ширина
console.log( 'ширината на видимата част', width); // дава ни ширината на страницата но само на видимата част на прозореца
width = window.outerWidth; 
console.log('ширината на цялата част', width);// дава ни ширината на страницата но на цялата част на страницата

var height = window.innerHeight; // създаваме променлива за височина
console.log('височината на видимата част', height); // дава ни височината на видимата част на страницата
height = window.outerHeight;
console.log('височината на цялата част', height); // дава ни височината на страницата но на цялата част на страницата
