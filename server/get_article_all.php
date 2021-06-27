<?php
if ($_POST['key'] == 3) {
    require_once 'bd.php';
    require_once 'templeter.php';
    $errors = [];
    $id = $_POST['id'];
    $connect = mysqli_connect("localhost", "$user", "$pass", "$bd");
    if (!$connect) {
        $errors[] = 'Ошибка подключения к базе данных';
        http_response_code(502);
    }
    mysqli_set_charset($connect, 'utf8');
    $sql = "SELECT * FROM article WHERE id=?";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    if (!$stmt) {
        $errors[] = 'Ошибка при запросе к базе данных';
        http_response_code(502);
    }
    $res = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_array($res);
    if (empty($data)) {
        http_response_code(404);
    }
    $layout = render_template('templates/article.php', $data);
    print $layout;
    mysqli_stmt_close($stmt);
}