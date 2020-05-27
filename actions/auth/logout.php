<?php
session_start();

if (isset($_GET['do']) && $_GET['do'] == 'logout') {
    unset($_SESSION['login']);

    session_destroy();

    header('Location: /');
    exit();
}
