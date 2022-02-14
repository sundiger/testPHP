<?php 
session_start();
require_once "../vendor/connect.php";
  $urlRoom = $_SESSION['room']['rooms_name'];

  $query5 = mysqli_query($connect, "SELECT * FROM `$urlRoom` ");
  if(mysqli_num_rows($query5) > 0) {
      while($mes = mysqli_fetch_assoc($query5)) {
        $mes_users = $mes['users'];
        $mes_message = $mes['messages'];
        if ($mes_message == '') {
          print "<h6>Подключился пользователь `".$mes_users."`.</h6>";
        } else {
          print "<h6>".$mes_users.":</h6> <p>".$mes_message."</p>";
        }
      }
  } else {
    print "Нет сообщений";
  }

?>