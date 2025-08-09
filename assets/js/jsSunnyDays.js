console.log("jsSunnyDays.js е зареден");

console.log("DOM напълно зареден");
const forgotForm = document.getElementById("forgotPasswordForm");
console.log("forgotForm е:", forgotForm);

document.addEventListener('DOMContentLoaded', () => {

    //Видимост на паролата

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

        // при registration and reset-password

        const passwordToggles = [
            { inputId: 'newPassword', toggleId: 'toggleNewPassword' },
            { inputId: 'confirmPassword', toggleId: 'toggleConfirmPassword' }
          ];
        
          passwordToggles.forEach(({ inputId, toggleId }) => {
            const input = document.getElementById(inputId);
            const toggle = document.getElementById(toggleId);
            if (input && toggle) {
              toggle.addEventListener('click', () => {
                const type = input.type === 'password' ? 'text' : 'password';
                input.type = type;
                toggle.src = type === 'password'
                  ? '/assets/img/Icons/visibility_18dp_000000.svg'
                  : '/assets/img/Icons/visibility_off_18dp_000000.svg';
              });
            }
          });




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

    // ===== Маркиране на източника на регистрация =====
    function setRegisterValue() {
        if (document.activeElement.id === "enterButtonGoOn") {
            document.getElementById('register').value = "1";
        } else if (document.activeElement.id === "enterButtonReg") {
            document.getElementById('register').value = "2";
        }
        return true; // Позволява формата да бъде изпратена
    }

    // ===== Забравена парола =====
    const forgotForm = document.getElementById("forgotPasswordForm");

    if (forgotForm && !forgotForm.classList.contains("handler-attached")) {
      forgotForm.classList.add("handler-attached");
  
      forgotForm.addEventListener("submit", function (e) {
        e.preventDefault();
  
        const email = document.getElementById("email").value;
  
        fetch("forgot-password.php", {
          method: "POST",
          headers: { "Content-Type": "application/x-www-form-urlencoded" },
          body: "email=" + encodeURIComponent(email),
        })
          .then((res) => res.json())
          .then((data) => {
            alert(data.message);
            if (data.success) {
              window.location.href = "/";
            }
          })
          .catch((err) => {
            alert("Възникна грешка при заявката.");
            console.error(err);
          });
      });
    }
});
  