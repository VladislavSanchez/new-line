<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Панель администратора</title>
    <style>
        main {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
        }
    </style>
</head>
<body>
<main>
<?php
if (empty($_POST['key'])) {
    echo '<form action="admin_handler.php" method="post">
            <input name="login" type="text">
            <input name="password" type="password">
            <input type="submit" name="key" class="login" value="1">
        </form>';
}
if ($_POST['key'] == 1) {
    if ($_POST['login'] == "vlad12345g" and $_POST['password'] == "2505080208022505ZaZa") {
        echo '<form action="admin_handler.php" method="post">
            <input name="key" value="2"  type="submit">
            <input name="key" value="3" type="submit">
            <input name="key" value="4" type="submit">
        </form>';
        } else {
        echo '<form action="admin_handler.php" method="post">
            <input name="login" type="text">
            <input name="password" type="password">
            <input type="submit" name="key" class="login" value="1">
        </form>';
    }
    }
if ($_POST['key'] == 2) {
    echo '<h1>Добавить статью</h1>
    <form action="admin_handler.php" method="post" enctype="multipart/form-data">
        <label><p>Название</p><input name="title" type="text" required></label>
        <label><p>Текст статьи</p><textarea name="text" required></textarea></label>
        <label><p>Интро</p><input name="userfile[]" type="file" required></label>
        <label><p>Картинки</p><input name="userfile[]" type="file" multiple="true"></label>
        <input name="key" type="submit" value="5">
    </form>';
}
if ($_POST['key'] == 5) {

    $title = $_POST['title'];
    $text = $_POST['text'];
    $intro = '<img class="news__articles_fon" src="server/files/articles/' . $_FILES['userfile']['name'][0] . '">';
    $i = 0;
    foreach ($_FILES['userfile']['tmp_name'] as $key => $value) {
        $name = $_FILES['userfile']['name'][$i];
        $dir = 'C:/OpenServer/domains/new-line/server/files/articles/' . $name;
        if (!empty($_FILES['userfile']['name'][$i])) {
            if ($_FILES['userfile']['type'][$i] == "image/jpeg" or $_FILES['userfile']['type'][$i] == "image/png" or $_FILES['userfile']['type'][$i] == "image/gif") {
                if(move_uploaded_file($value, $dir)) {
                    echo 'Файл(' . $i .') загружен успешно!<br>';
                } else {
                    echo 'error';
                    exit();
                }
            } else {
                echo "формат файла не подходит!";
                exit();
            }
            if ($i > 0) {
                $img = $img . '<img src="server/files/articles/' . $name . '">';
            }
            $i++;
        }
    }
    require_once 'bd.php';
    $connect = mysqli_connect("localhost", "$user", "$pass", "$bd");
    mysqli_set_charset( $connect, 'utf8');
    $sql = "INSERT INTO article (title, text, intro, img, date) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, 'sssss', $title, $text, $intro, $img, date(d.m.Y));
    mysqli_stmt_execute($stmt);
    if (!$stmt) {
        echo 'Данные не записаны';
    } else {
        echo 'Данные записаны!';
        echo '<form action="admin_handler.php" method="post">
            <input type="submit" name="key" class="login" value="1">
        </form>';
    }
    mysqli_stmt_close($stmt);
}
if ($_POST['key'] == 3) {
    echo '<h1>Добавить проект</h1>
    <form action="admin_handler.php" method="post" enctype="multipart/form-data">
        <label><p>Название</p><input name="title" type="text" required></label>
        <label><p>Описание</p><textarea name="text" required></textarea></label>
        <label><p>Интро</p><input name="userfile[]" type="file" required></label>
        <label><p>Картинки</p><input name="userfile[]" type="file" multiple="true"></label>
        <label><p>Статус</p><select name="status"><option>завершён</option><option>монтируем</option><option>снимаем</option><option>готовимся</option><option>отменён</option></select></label>
        <input name="key" type="submit" value="6">
    </form>';
}
if ($_POST['key'] == 6) {
    $title = $_POST['title'];
    $text = $_POST['text'];
    $status  = $_POST['status'];
    $intro = '<img class="news__articles_fon" src="server/files/projects/' . $_FILES['userfile']['name'][0] . '">';
    $i = 0;
    foreach ($_FILES['userfile']['tmp_name'] as $key => $value) {
        $name = $_FILES['userfile']['name'][$i];
        $dir = 'C:/OpenServer/domains/new-line/server/files/projects/' . $name;
        if (!empty($_FILES['userfile']['name'][$i])) {
            if ($_FILES['userfile']['type'][$i] == "image/jpeg" or $_FILES['userfile']['type'][$i] == "image/png" or $_FILES['userfile']['type'][$i] == "image/gif") {
                if(move_uploaded_file($value, $dir)) {
                    echo 'Файл(' . $i .') загружен успешно!<br>';
                } else {
                    echo 'error';
                    exit();
                }
            } else {
                echo "формат файла не подходит!";
                exit();
            }
            if ($i > 0) {
                $img = $img . '<img src="server/files/projects/' . $name . '">';
            }
            $i++;
        }
    }
    require_once 'bd.php';
    $connect = mysqli_connect("localhost", "$user", "$pass", "$bd");
    mysqli_set_charset( $connect, 'utf8');
    $sql = "INSERT INTO project (title, description, intro, img, status) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, 'sssss', $title, $text, $intro, $img, $status);
    mysqli_stmt_execute($stmt);
    if (!$stmt) {
        echo 'Данные не записаны';
    } else {
        echo 'Данные записаны!';
        echo '<form action="admin_handler.php" method="post">
            <input type="submit" name="key" class="login" value="1">
        </form>';
    }
    mysqli_stmt_close($stmt);
}
?>
</main>
</body>
</html>
