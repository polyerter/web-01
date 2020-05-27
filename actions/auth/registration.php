<?php
require_once "../../config.php";
require_once "../../helper.php";

if (isset($_POST['login'], $_POST['password'], $_POST['email'])) {
    $DBH = connect($db_name, $db_user, $db_pass);

    $pass = hash_pass($_POST['password']);

    $params = [
        ':email' => $_POST['email'],
        ':login' => $_POST['login'],
        ':password' => $pass,
    ];

    $file_path = upload_file($_FILES['photo']);

    $params[':avatar'] = $file_path;

    $stmt = $DBH->prepare("INSERT INTO `users` (`email`, `login`, `password`, `avatar`) VALUES (:email, :login, :password, :avatar)");
    if ($stmt->execute($params)) {
        echo "Привет, " . $params[':login'];
        die;
    }
//    dd($params);
}