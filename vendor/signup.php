<?php
    session_start();
    require_once 'connect.php';

    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email' ");
    
    function is_valid_domain_name($login)
    {
        return (preg_match("/^([a-z\d](-*[a-z\d])*)(\.([a-z\d](-*[a-z\d])*))*$/i", $login) //valid chars check
                && preg_match("/^.{3,253}$/", $login) //overall length check
                && preg_match("/^[^\.]{3,63}(\.[^\.]{3,63})*$/", $login)   ); //length of each label
    }

    if (!is_valid_domain_name($login)) {
        $_SESSION['message'] = 'Логин должен быть не менее 3х букв на английском!';
        header('Location: ../register.php');
        die();
    } else if(mysqli_num_rows($check_user) > 0) {
        $_SESSION['message'] = 'Email уже зарегистрирован';
        header('Location: ../register.php');
    } else if (strlen($password) < 6) {
        $_SESSION['message'] = 'Пароль должен быть не меньше 6 символов!';
        header('Location: ../register.php');
        die();
    } else if (strlen($password) < 6) {
        $_SESSION['message'] = 'Пароль должен быть не меньше 6 символов!';
        header('Location: ../register.php');
        die();
    } else if($password_confirm === $password) {

        $password = md5($password);
        
        mysqli_query($connect, "INSERT INTO `users` (`id`, `login`, `email`, `password`) VALUES (NULL, '$login', '$email', '$password')");
        $_SESSION['message'] = 'Регистрация прошла успешно!';
        header('Location: ../index.php');
    } else {
        $_SESSION['message'] = 'пароли не совпадают';
        header('Location: ../register.php');
    }

?>