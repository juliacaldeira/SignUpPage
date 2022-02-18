<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signUp.css" type="text/css">
    <link rel="icon" type="image/ico" href="splash.ico">
    <script>
        function sucess() {
            alert('Cadastro realizado com sucesso!');
        }
        function exist() {
            alert('Erro ao realizar cadastro! Nome de usuário já existe.');
        }
        function senha() {
            let senha = document.getElementById('password');
            let show = document.getElementById('show');
            if(!senha.length >= 4) {
                show.innerHTML = 'A senha precisa ter pelo menos 4 caracteres.';
                if(!senha.matches(/d+/)) {
                    show.innerHTML = 'A senha precisa ter apenas números.';
                }
            }
        }
    </script>
    <title>Sign In</title>
</head>
<body>
<div id="box">
        <form method="POST" action="signUp.php">
            <h2>Login</h2>
            <div id="logos">
            <img src="logoG.png" class="logo"><img src="logoF.png" class="logo">
            </div> 
            <label for="name"> Username
                <input id="name" name="name" type="text" required>
            </label>
            <label for="password"> Password
                <input id="password" name="password" type="password" required>
            </label>
            <div id="show"></div>
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

    echo '<script>senha();</script>';

$con = mysqli_connect("localhost", "root", "", "form");
$verif = mysqli_query($con, "SELECT * FROM usuario where nome = '$nome'");
$num_rows = mysqli_num_rows($verif);

if (!$num_rows > 0) {
$string_sql = "INSERT INTO usuario (id,nome,senha) VALUES (null,'$nome','$senha')";

mysqli_query($con, $string_sql);

if(mysqli_affected_rows($con) > 0) {
    echo '<script>sucess();</script>';
} 
mysqli_close($con);
}
else {
    echo '<script>exist();</script>';
}}
?>