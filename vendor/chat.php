<?php 
session_start();

require_once "connect.php";

if (isset($_POST['common_submit'])) {

  $urlRoom       = $_SESSION['room']['rooms_name'];

  $text = trim(htmlspecialchars($_POST['common_text']));
  $name = $_SESSION['user']['login'];
  $nameId = $_SESSION['user']['id'];


  $query4 = mysqli_query($connect, "INSERT INTO `$urlRoom` ( `rooms_name`, `rooms_pass`, `users`, `messages`) VALUES ('$urlRoom', '', '$name','$text')");

   if ($query4) {
     header("Location: ../rooms/".$urlRoom.".php");
   }
   
}

?>