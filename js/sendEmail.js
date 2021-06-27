document.querySelector('.footer__submit').addEventListener('click', function (e) {
    var email = document.querySelector('.footer__email');
    if (email.validity.valid) {
        if (sendData('handler.php', {key: 5,email: email.value}))  {
            popup('Спасибо! Вы подписаны!', 'send.svg');
            email.value = "";
        }
    }
    e.preventDefault();
});