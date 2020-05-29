<?php
function dd($item = '')
{
    echo "<pre>";
    print_r($item);
    echo "</pre>";
    die;
}

if (!function_exists("connect")) {
    function connect($db_name, $db_user, $db_pass, $db_host = "localhost")
    {
        try {
            return new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}

function hash_pass($pass)
{
    return md5("salt") . md5($pass);
}

function upload_file($file, $dir = "files", $name = null): string
{
    $path = "/images/$dir/";
    $fullpath = __DIR__ . $path;

    if (!is_dir($fullpath)) {
        if (!mkdir($fullpath, 0777, true)) {
            dd("Error create folder");
        }
    }

    $file_name = strtolower(genFileName() . "_" . $file['name']);

    if (move_uploaded_file($file['tmp_name'], $fullpath . $file_name)) {
        return $path . $file_name;
    } else {
        return false;
    }
}

function genFileName()
{
    return uniqid();
}

function getUser()
{
    return isset($_SESSION['user']) && !empty($_SESSION['user']) ? $_SESSION['user'] : null;
}

function location_back()
{
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die;
}