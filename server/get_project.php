<?php
if ($_POST['key'] == 2) {
    require_once 'bd.php';
    require_once 'templeter.php';
    $errors = [];
    $limit = $_POST['limit'];
    $offset = $_POST['offset'];
    $connect = mysqli_connect("localhost", "$user", "$pass", "$bd");
    if (!$connect) {
        $errors[] = 'Ошибка подключения к базе данных';
        http_response_code(502);
    }
    mysqli_set_charset( $connect, 'utf8');
    $sql = "SELECT * FROM project ORDER BY id DESC LIMIT ? OFFSET ?";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, 'ii', $limit, $offset);
    mysqli_stmt_execute($stmt);
    if (!$stmt) {
        $errors[] = 'Ошибка при запросе к базе данных';
        http_response_code(502);
    }
    $res = mysqli_stmt_get_result($stmt);
    while ($project = mysqli_fetch_array($res)) {
        $layout = render_template('templates/projects.php', $project);
        print $layout;
    }
    mysqli_stmt_close($stmt);
}
?>