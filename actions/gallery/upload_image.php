<?php
session_start();

require_once "../../config.php";
require_once "../../helper.php";

$user = getUser();

if (!isset($user['id']) || empty($user['id'])) {
    echo 'Необходимо авторизоваться';
}

if (isset($_FILES['attachment'])) {

    $path = upload_file($_FILES['attachment'], 'gallery/admin');

    if ($path) {

        $DBH = connect($db_name, $db_user, $db_pass);

        $params = [
            ':user_id' => $user['id'],
            ':name' => $_FILES['attachment']['name'],
            ':comment' => isset($_POST['comment']) ? $_POST['comment'] : null,
            ':image' => $path,
        ];

        $sql = "INSERT INTO `gallery` (`user_id`, `name`, `comment`, `image`) VALUES (:user_id, :name, :comment, :image)";

        $stmt = $DBH->prepare($sql);


        if ($stmt->execute($params)) {
            location_back();
        } else {
            echo "Upload error";
        }

        die;
    }
}
