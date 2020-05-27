<?php
require_once "helper.php";

session_start();
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
if (isset($_SESSION['login'])) { ?>
    <p>
        Привет, <?= $_SESSION['login']; ?>.
    </p>

    <p>
        <img src="<?= $_SESSION['avatar'] ?>" style="height: 80px;">
    </p>

    <p>
        <a href="actions/auth/logout.php?do=logout">Выйти</a>
    </p>
<?php } else { ?>
    <form method="POST" action="actions/auth/login.php">
        <label for="user">
            Username <br>
            <input id="user" type="text" name="user">
        </label>
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