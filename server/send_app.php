<?php
if ($_POST['key'] == 6) {
    require_once 'bd.php';
    print_r($_POST);
    $type = $_POST['type'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $text = $_POST['text'];
    $connect = mysqli_connect("localhost", "$user", "$pass", "$bd");
    mysqli_set_charset( $connect, 'utf8');
    $sql = "INSERT INTO appeals (type, name, email, text) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, 'ssss', $type, $name, $email, $text);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}