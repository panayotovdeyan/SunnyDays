/**
 * SunnyDays Main JavaScript File
 */

console.log("jsSunnyDays.js е зареден успешно");

document.addEventListener('DOMContentLoaded', () => {
    console.log("DOM е напълно зареден");

    // ==========================================
    // 1. ВИДИМОСТ НА ПАРОЛИТЕ (Login, Reg, Reset)
    // ==========================================
    const passwordToggles = [
        { inputId: 'loginPassword', toggleId: 'toggleLoginPassword' },
        { inputId: 'newPassword', toggleId: 'toggleNewPassword' },
        { inputId: 'confirmPassword', toggleId: 'toggleConfirmPassword' }
    ];

    passwordToggles.forEach(({ inputId, toggleId }) => {
        const input = document.getElementById(inputId);
        const toggle = document.getElementById(toggleId);
        
        if (input && toggle) {
            toggle.addEventListener('click', function() {
                const isPassword = input.type === 'password';
                input.type = isPassword ? 'text' : 'password';
                
                // Смяна на иконата
                this.src = isPassword 
                    ? "/assets/img/Icons/visibility_off_18dp_000000.svg" 
                    : "/assets/img/Icons/visibility_18dp_000000.svg";
            });
        }
    });

    // ==========================================
    // 2. ЗАРЕЖДАНЕ НА ГРАДОВЕ (Само ако елементът съществува)
    // ==========================================
    const selectElement = document.getElementById('regCity');
    if (selectElement) {
        const csvFilePath = '/assets/js/municipalities.csv';

        fetch(csvFilePath)
            .then(response => {
                if (!response.ok) throw new Error("CSV файлът не беше намерен");
                return response.text();
            })
            .then(data => {
                const rows = data.split('\n');
                rows.forEach(city => {
                    const cleanCity = city.trim();
                    if (cleanCity) {
                        const option = document.createElement('option');
                        option.value = cleanCity;
                        option.textContent = cleanCity;
                        selectElement.appendChild(option);
                    }
                });
            })
            .catch(error => console.warn('Инфо: Елементът за градове не е запълнен:', error.message));
    }

    // ==========================================
    // 3. ЗАБРАВЕНА ПАРОЛА (AJAX + reCAPTCHA)
    // ==========================================
    const forgotForm = document.getElementById("forgotPasswordForm");
    if (forgotForm) {
        forgotForm.addEventListener("submit", function (e) {
            e.preventDefault();

            // Проверка за Google reCAPTCHA
            if (typeof grecaptcha === 'undefined') {
                alert("Системата за сигурност Google reCAPTCHA не е заредена. Моля, опреснете страницата.");
                return;
            }

            const recaptchaResponse = grecaptcha.getResponse();
            if (recaptchaResponse.length === 0) {
                alert("Моля, потвърдете, че не сте робот.");
                return;
            }

            // Визуална обратна връзка
            const btn = document.getElementById("forgotPasswordBtn");
            const preloader = document.getElementById("form-preloader");

            if (btn) {
                btn.disabled = true;
                btn.innerText = "Изпращане...";
            }
            if (preloader) preloader.style.display = "block";

            const email = document.getElementById("email").value;

            // Изпращане на данните
            fetch("forgot-password.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: "email=" + encodeURIComponent(email) + "&g-recaptcha-response=" + encodeURIComponent(recaptchaResponse)
            })
            .then(res => res.json())
            .then(data => {
                alert(data.message);
                if (data.success) {
                    window.location.href = "login.php";
                }
            })
            .catch(err => {
                console.error("Fetch Error:", err);
                alert("Възникна грешка при връзката със сървъра.");
            })
            .finally(() => {
                // Възстановяване на формата
                if (btn) {
                    btn.disabled = false;
                    btn.innerText = "Нова парола";
                }
                if (preloader) preloader.style.display = "none";
                grecaptcha.reset(); 
            });
        });
    }
});

// Функцията за източник на регистрация (извън DOMContentLoaded, ако се вика от HTML)

function validateRegForm() {
    const registerType = document.getElementById('register').value;
    const recaptchaResponse = grecaptcha.getResponse();

    // Ако се опитваме да направим финална регистрация (бутон 2)
    if (registerType === "2") {
        if (recaptchaResponse.length === 0) {
            alert("Моля, потвърдете, че не сте робот чрез отметката.");
            return false; // Спира изпращането на формата
        }
    }

    // Логиката за задаване на стойността (оригинален код)
    if (document.activeElement.id === "enterButtonGoOn") {
        document.getElementById('register').value = "1";
    } else if (document.activeElement.id === "enterButtonReg") {
        document.getElementById('register').value = "2";
    }
    
    const preloader = document.getElementById("form-preloader");
    if (preloader) preloader.style.display = "block"; // Показваме го при изпращане на потвърдителен имейл

    return true; // Позволява изпращането
}