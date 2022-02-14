<?php
    session_start();
    require_once 'connect.php';


    $user_name = $_SESSION['user']['login'];
    $room_name = '@'.$_POST['room_name'];
    $room_pass = $_POST['room_pass'];


    $check_room = mysqli_query($connect, "SELECT * FROM `$room_name` WHERE `rooms_name` = '$room_name' AND `rooms_pass` = '$room_pass' ");

    if($check_room) {
        $filename = '../rooms/'.$room_name.'.php';

    mysqli_query($connect, "INSERT INTO `$room_name` (`id`, `rooms_name`, `rooms_pass`, `users`, `messages`) VALUES (NULL, '$room_name', '$room_pass', '$user_name', '$messages')");


        
        $_SESSION['room'] = [
            "rooms_name" => $room_name,
            "user_name"  => $user_name,
        ];

        $_SESSION['message'] = 'Вы подключились!';

        header('Location: ../rooms/'.$filename);

    } else {

        $_SESSION['message'] = 'Комнаты не существует или неверное название комнаты или пароль';
        header('Location: ../profile.php');
    }
?>