// Test Работи ли momentjs
let now = moment();
console.log('NOW', now);

let day = moment('2024-11-29');
console.log('DAY', day._d); //Вече не е добра практика да се използва _d, тъй като това е вътрешно свойство на moment.js. Вместо това използвайте .toDate() за преобразуване в обект Date, ако е необходимо.

day = moment('2024-150');// кой е 150-я ден от годината 2024
console.log('DAY-150/2024:', day.toDate());

day = moment('2024-05-20T08') // set time кръгъл час
console.log('DAY-Time', day.toDate());

// day = moment('2024-11-29 06:30:26');
day = moment('20241129T063026'); //друг синтаксис
console.log('DAY-Time', day.toDate());

day = moment('20241129T063026'); 
day = day.add(20, 'hours'); // Добавяне на 20 часа
console.log('DAY-Time:', day.format('YYYY-MM-DD HH:mm:ss')); // Човешко-четим формат
console.log('JavaScript Date:', day.toDate()); // Конвертиране към обект Date, ако е нужно

day = day.add(20, 'day'); // Добавяне на 20 дни
console.log('Date NOV+20:', day.toDate());


let x = moment().startOf('day').fromNow();
console.log('X=day=', x);

x = moment().startOf('hour').fromNow();
console.log('X=hour=', x);

x = moment('20150405', 'YYYYMMDD').fromNow();
console.log('X=L:', x);

//PRE FORMATING
x = moment('20240520T063026').format('DD-MM-YYYY hh:mm:ss');
console.log('X=formating 1:', x)

x = moment('20240520T063026').format('dddd, MMMM D, YYYY h:mm A');
console.log('X=formating 2:', x)