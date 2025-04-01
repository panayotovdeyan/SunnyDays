$(document).ready(() => {
    $('#hero1').html('Welcome TO SUNNY Days');
    $('#hero2').html('Изграждане, ремонт и поддръжка на фотоволтаични системи и конструкции. Анализ на добива и потреблението, чрез WEB базирано решение за наблюдение на данните в реално време');
    $('#registration-text').html('REGISTRATION FORM');
    $('.reg-hidden').hide();
    $('.footer-newsletter').click(() => {
        $('.e-hidden').hide(500); // Скрива елементите с клас 'e-hidden' с 0.5-секундна анимация
        $('.emailNewsletter').show(500); // Показва елементите с клас 'emailNewsletter'
    });
    // $('[class^=\'twit\']').css('display', 'none');

    // (Лекция 24)
    //form field selection 

    $(':password').addClass('password');
    $('selected').addClass('selected');
    $(':checked').addClass('checked');

    $('#agreement').click(()=>{
        alert('Yes, I comfirm agreement');
        console.log($(this))
        $('#agreement').attr('checked', true);
    })

    $('.reg-form').css('padding: 10px, 15px');

    //  да си вземем информацията през формата

    // $("[name='registration']").submit(function(event) {
    //     console.log('formData', $(this).serializeArray()); // Логва сериализираните данни
    //     event.preventDefault(); // Предотвратява изпращането на формата
        
    // });

    $('#onlineMonitoring').on('click', function () {
        const userConfirmed = confirm('Трябва да сте регистриран потребител. Вход?');
        if (userConfirmed) {
            window.location.href = '/login.php';
            console.log('Потребителят избра OK');
        } else {
            window.location.href = '#';
            console.log('Потребителят избра Cancel');
        }
    });
 

    $(document).ready(function () {
        $("#enterButtonGoOn").on("click", function (e) {
            e.preventDefault(); // Спира стандартното изпращане на формата
        
            let email = $("#regEmail").val().trim();
        
            if (email === "") {
                alert("Моля, въведете имейл!");
                return;
            }
        
            $.post("/reg.php", { "register": 1, regEmail: email }, function (response) {
                if (response.success) {
                    if (response.registered) {
                        alert(response.message); // Имейлът е регистриран
                        window.location.href = "/login.php";
                    } else {
                        // alert(response.message); // Имейлът не е регистриран
                        $(".reg-hidden").show(); // Показва допълнителните полета
                        $("#enterButtonGoOn").hide(); // Скрива "Продължи"
                        $("#enterButtonReg").show(); // Показва "Регистрирай"
                    }
                } else {
                    alert(response.message); // Грешка
                }
            }, "json").fail(function () {
                alert("Възникна грешка. Опитайте отново.");
            });
        });
        
    });
    


});