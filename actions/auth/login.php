<?php
require_once "../../config.php";
require_once "../../helper.php";

session_start();

/*
 * $user = 'admin';
 * $pass = 'a8f5f167f44f4964e6c998dee827110c';
*/

if (isset($_POST['submit'])) {

    if (isset($_POST['user'], $_POST['pass'])) {
        $DBH = connect($db_name, $db_user, $db_pass);

        $params = [
            ':login' => $_POST['user'],
            ':pass' => hash_pass($_POST['pass'])
        ];

        $stmt = $DBH->prepare("SELECT * FROM `users` WHERE `login` = :login  AND `password` = :pass");
        $stmt->execute($params);

        $items = $stmt->fetch(PDO::FETCH_ASSOC);

        if (is_array($items) && count($items) > 0) {

            $_SESSION['login'] = $_POST['user'];
            $_SESSION['avatar'] = $items['avatar'];

            header('Location: /');
            exit();
        } else {
            echo "<p>Логин или пароль неверны!</p>";
        }
    }

} else {
    echo "<p>asdasd!</p>";
}
