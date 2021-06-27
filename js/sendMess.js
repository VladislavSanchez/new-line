document.querySelector('.form-ms').addEventListener('submit', function (e) {
    if (document.querySelector('.user-info__name').validity.valid && document.querySelector('.user-info__email').validity.valid && document.querySelector('.user-info__ms').validity.valid) {
        if (sendData('handler.php', {
            key: 6,
            type: document.querySelector('.user-info__select').value,
            name: document.querySelector('.user-info__name').value,
            email: document.querySelector('.user-info__email').value,
            text: document.querySelector('.user-info__ms').value
        })) {
            popup('Сообщение принято!', 'send.svg');
            document.querySelector('.user-info__select').value = "";
            document.querySelector('.user-info__name').value = "";
            document.querySelector('.user-info__email').value = "";
            document.querySelector('.user-info__ms').value = "";
        }
    }
    e.preventDefault();
});