<?php
if ($_POST['key'] == 5) {
    require_once 'bd.php';
    $email = $_POST['email'];
    $connect = mysqli_connect("localhost", "$user", "$pass", "$bd");
    mysqli_set_charset( $connect, 'utf8');
    $sql = "INSERT INTO emails (email, ip) VALUES (?, ?)";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $email, $_SERVER['HTTP_CLIENT_IP']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
?>