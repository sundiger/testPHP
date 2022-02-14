<?php
    session_start();
    require_once 'connect.php';
    

    $rooms_name = '@'.$_POST['rooms_name'];
    $rooms_pass = $_POST['rooms_pass'];
    $user_name  = $_SESSION['user']['login'];
    $messages   = $_POST['messages'];
    
    $conn = mysqli_connect("localhost", "root", "", "u1239258_chat");
    if (!$conn) {
      die("Ошибка: " . mysqli_connect_error());
    }
    $sql = "CREATE TABLE `u1239258_chat`.`${rooms_name}` ( `id` INT NOT NULL AUTO_INCREMENT , `rooms_name` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `rooms_pass` VARCHAR(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `users` VARCHAR(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `messages` VARCHAR(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;";
    if(mysqli_query($conn, $sql)){
        
        
        
        $filename = '../rooms/'.$rooms_name.'.php';
        $text = file_get_contents('../room.php'); 
        $f_hdl = fopen($filename, 'w');

        fwrite($f_hdl, $text);

        fclose($f_hdl);
        
        
        
        
        $_SESSION['room'] = [
            "rooms_name" => $rooms_name,
            "user_name"  => $user_name,
        ];
        
        
        
        
        mysqli_query($connect, "INSERT INTO `${rooms_name}` (`id`, `rooms_name`, `rooms_pass`, `users`, `messages`) VALUES (NULL, '$rooms_name', '$rooms_pass', '$user_name', '$messages')");
        $_SESSION['message'] = 'Комната создана!';
        header('Location: ../rooms/'.$filename);
    } else{
        echo "Комната с таким названием уже существует: '" . $rooms_name . "'. Вернитесь на предыдущую страницу и попробуйте ввести другое название комнаты.";
    }
    
?>