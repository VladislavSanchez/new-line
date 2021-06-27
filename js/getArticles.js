if (getParams('type') === 'article') {
    if (sendData('handler.php', {key: 3, id: getParams('id')}, 'main')) {
        document.querySelector('title').textContent = getParams('title');
    } else {
        document.querySelector('title').textContent = 'Не найдено';
    }
}
if (getParams('type') === 'project') {
    if (sendData('handler.php', {key: 4, id: getParams('id')}, 'main')) {
        document.querySelector('title').textContent = getParams('title');
    } else {
        document.querySelector('title').textContent = 'Не найдено';
    }
}