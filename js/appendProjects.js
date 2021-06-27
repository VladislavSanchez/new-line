var button = document.querySelector('.news__more-button');
var offset = 0;

button.addEventListener('click', async function () {
    offset += 10;
    var project = await sendData('handler.php', {key: 1, limit: 10, offset: offset});
    if (project) {
        document.querySelector('.news__articles_list').insertAdjacentHTML('beforeEnd', await project);
    } else {
        button.disabled = true;
    }
});