<?php
    session_start();
    
    unset($_SESSION['room']);
    
    header('Location: ../profile.php')
?>