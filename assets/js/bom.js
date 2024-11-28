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


//window.location.href -> отваря в СЪЩИЯТ прозорец
document.getElementById('enterButtonLogin').addEventListener('click', () => {

    window.location.href = '/login.php';
});


//window open() -> отваря в НОВ прозорец или промпт
//window.open(url, windowName, [windowFeatures])
document.getElementById('enterButtonReg').addEventListener('click', () => {
    let url = '/reg.php';
    let windowFeatures = 'height=500, width=500';
    let windowRegPage = window.open(url, 'registrationForm', windowFeatures);
    setTimeout(() => {
        windowRegPage.resizeTo(1400, 700);
        windowRegPage.moveTo(100, 300);
    }, 5000)
});

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

// confirm message във футъра "онлайн мониторинг"
document.getElementById('onlinMonitoring').onclick = () => {
    const userConfirmed = confirm('Необходима е регистрация');
    if (userConfirmed) {
        window.location.href = '/login.php';
        console.log('Потребителят избра OK');
    } else {
        window.location.href = '#';
        console.log('Потребителят избра Cancel');
    }
};
