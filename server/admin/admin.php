<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>Вход</title>
    <link rel="stylesheet" type="text/css" href="../../style.css">
    <link rel="stylesheet" type="text/css" href="../../frame/animate.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

</head>
<body>
<nav>
    <img class="nav__logo" src="img/logo.png" alt="logo">
    <button class="nav__button"><img src="img/menu.svg" width="40vw" height="40vw"></button>
    <ul class="nav__list nav__list_close">
        <li class="nav__list_item"><a class="nav__list_link" href="../../index.html">Главная</a></li>
        <li class="nav__list_item nav__list_logo-cont"><img class="nav__list_logo" src="../../img/logo.png" alt="logo" width="20%"></li>
    </ul>
</nav>
<header>

</header>
<main>
<form class="login" method="post">
    <input type="email" name="email" class="login__email">
    <input type="password" name="pass" class="login__password">
    <input type="submit" value="LOGIN" class="login__sbm">
</form>
</main>
<footer>
    <ul class="footer__list">
        <li class="footer__list_item footer__list_logo"><a>New Line</a></li>
        <li class="footer__list_item">
            <form class="footer__form">
                <input class="footer__email" type="text" placeholder="Введите адрес эл. почты" required>
                <input class="footer__submit" type="button" value="Подписаться">
            </form>
        </li>
        <li class="footer__list_item">
            <ul class="footer__list_contacts">
                <li class="footer__list_contacts-item"><a class="footer__link" href="https://vk.com/newlinenew?from=groups%253Fact%253Dlist" target="_blank">ВКонтакте</a></li>
                <li class="footer__list_contacts-item"><a class="footer__link" href="messages.html">Написать нам</a></li>
            </ul>
        </li>
    </ul>
</footer>
<div class="ms_block">
    <dialog class="message">
        <h2 class="message__title"></h2>
        <img src="" alt="error" class="message__img">
        <img src="img/close.svg" alt="close" class="message__close">
    </dialog>
</div>
</body>
<script src="frame/wow.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="js/js.js"></script>
<script src="js/news-block.js"></script>
<script>
    new WOW().init();
</script>
</html>