<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
</head>
<body>

<form action="actions/auth/registration.php" method="POST" enctype="multipart/form-data">

    <label for="email">
        Email
        <br>
        <input type="email" placeholder="Email" name="email" id="email" required/>
    </label>
    <br>
    <label for="login">
        Login
        <br>
        <input type="text" placeholder="Login" name="login" id="login" required/>
    </label>
    <br>
    <label for="password">
        Password
        <br>
        <input type="password" placeholder="password" name="password" id="password" required />
    </label>
    <br>
    <label for="photo">
        Photo
        <input type="file" name="photo" id="photo">
    </label>
    <br>

    <button type="submit" name="submit">Submit</button>
</form>

</body>
</html>