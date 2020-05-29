<?php
session_start();

require_once "../../helper.php";
require_once "../../config.php";


$user = getUser();

if (!isset($user['id']) || empty($user['id'])) {
    echo 'Необходимо авторизоваться';
}

if ($_GET['id'] && !empty($_GET['id'])) {

    $id = (int)$_GET['id'];

    $DBH = connect($db_name, $db_user, $db_pass);

    $params = [
        ':id' => $id,
        ':user_id' => $user['id'],
    ];

    $sql = "SELECT * FROM `gallery` WHERE `id` = :id AND `user_id` = :user_id";
    $stmt = $DBH->prepare($sql);
    $stmt->execute($params);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);


    if (count($result) > 0) {

        $sql = "DELETE FROM `gallery` WHERE `id` = :id AND `user_id` = :user_id";
        $stmt = $DBH->prepare($sql);
        $stmt->execute($params);

        if ($stmt->execute($params) && unlink("../.." . $result['image'])) {
            location_back();
        } else {
            echo "Error";
        }
    } else {
        echo "Error";
    }


}