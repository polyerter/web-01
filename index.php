<?php
require_once "helper.php";

session_start();

$user = getUser();

//dd($_SERVER);
//dd($user);
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>

<?php
if (isset($user['login'])) { ?>
    <p>
        Привет, <?= $user['login']; ?>.
    </p>

    <p>
        <img src="<?= $user['avatar'] ?>" style="height: 80px;">
    </p>

    <p><a href="/gallery">Gallery</a></p>

    <p>
        <a href="actions/auth/logout.php?do=logout">Выйти</a>
    </p>
<?php } else { ?>
    <form method="POST" action="actions/auth/login.php">
        <label for="user">
            Username <br>
        </label>
        <input id="user" type="text" name="user">
        <br>
        <label for="pass">
            Password <br>
            <input id="pass" type="password" name="pass">
        </label>
        <br>
        <br>
        <button name="submit">Submit</button>
    </form>
    <br>
    <a href="registration.php">Registration</a>
<?php } ?>

</body>
</html>