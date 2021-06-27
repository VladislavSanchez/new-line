function popup(title, imgName) {
    document.querySelector('.message__title').textContent = title;
    document.querySelector('.message__img').setAttribute('src', 'img/' + imgName);
    document.querySelector('.ms_block').classList.remove('hidden');
}

async function sendData(fileName, data, className) {
    if (data) {
        var params = new URLSearchParams();
        for (var key in data) {
            params.append(key, data[key]);
        }
        var body = params.toString();
    }
    var news = await fetch('server/' + fileName, {
        'method': 'POST',
        'headers': {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        },
        'body': body
    });
    if (news.ok) {
        if (className) {
            if (document.querySelector(className)) {
                document.querySelector(className).insertAdjacentHTML('beforeEnd', await news.text());
            } else {
                popup('Ошибка на стороне клиента', 'error.svg');
                console.log('Элемент соответствующий селектору '+className+' отсутствует на странице!');
                return false;
            }
        } else {
            return await news.text();
        }
    } else if (news.status === 404) {
        popup('Ошибка 404. Не найдено', 'error.svg');
        return false;
    } else {
        popup('Ошибка при запросе к ' + fileName, 'error.svg');
        console.log(news);
        return false;
    }
}

function getParams(paramName = '') {
    if (window.location.search) {
        var params = window.location.search.substring(1).split('&');
        for (var item in params) {
            var tmp = params[item].split('=');
            if (tmp[0] === paramName) {
                var result = tmp[1];
                return decodeURIComponent(result);
            }
        }
        if (!result) {
            return false;
        }
    } else {
        return false;
    }
}