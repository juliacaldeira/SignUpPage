<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signUp.css" type="text/css">
    <link rel="icon" type="image/ico" href="splash.ico">
    <title>Sign In</title>
</head>
<body>
<div id="box">
        <form method="POST">
            <h2>Login</h2>
            <div id="logos">
            <img src="logoG.png" class="logo"><img src="logoF.png" class="logo">
            </div> 
            <label for="name"> Name
                <input id="name" name="name" type="text" required>
            </label>
            <label for="password"> Password
                <input id="password" name="password" type="password" required>
            </label>
            <button id="but">Sign Up</button>
        </form>
    <div id="options">
        <img src="">
    </div>
</div>
</body>
</html>

<?php 


if (!empty($_POST['name']) && !empty($_POST['password'])) {

    $nome = $_POST['name'];
    $senha = $_POST['password'];

$link = mysqli_connect("localhost", "root", "", "form");
$string_sql = "INSERT INTO usuario (id,nome,senha) VALUES (null,'$nome','$senha')";

mysqli_query($link, $string_sql);

if(mysqli_affected_rows($link) > 0) {
    echo "Foi";
} else {
    echo "não foi";
}

mysqli_close($link);
}
?>