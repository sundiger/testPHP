<?php
    session_start();
    if(!$_SESSION['user']) {
        header('Location:  /');
    }
    if(!$_SESSION['room']) {
      header('Location:  /profile.php');
    }
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <title>Комната</title>

    <link rel="stylesheet" href="../assets/css/room.css"/>

  </head>
  <body>
        
    <header class="header row container-fluid" id="header">
        <div class="col-6 header_room">
          <h6 style="color: black">
            комната :
            <? echo $_SESSION['room']['rooms_name'] ?>
          </h6>
        </div>

        <div class="col-6 header_room">
          <h6  style="color: black;" >
            Ник: 
            <?= $_SESSION['user']['login'] ?> 
            
          </h6>
        </div>
          
    </header>
    
    <!--Container Main start-->
    <div class="bg-light row container-fluid">
        <div class="col-2 users_list">
          <h6 style="margin-top: 20px;">Пользователи</h6>

          <a href="../vendor/back.php" style="margin-bottom: 20px;">
            <button class="btn btn-primary">
                Вернуться
            </button>
          </a>

          <a href="../vendor/logout.php" style="margin-bottom: 20px;">
            <button class="btn btn-primary">
                Выйти
            </button>
          </a>
        </div>

        <div class="col-10 chat" style="position: relative; height: 300px;">
          <div class="messages overflow-auto" style="display: flex; justify-content: flex-end; flex-direction: column; position: relative; height: 200px; border: 1px solid gray; border-radius: 5px;">
            <div id="WebChatFormForm" style="overflow-y: scroll;">
              
            </div>
          </div>
          <form method="post" action="../vendor/chat.php" class="input-group mb-3" style="position: absolute; bottom: 0;" id="send">
            <input name="common_text" type="text" class="form-control msg" placeholder="Введите сообщение" aria-describedby="button-addon2" id="WebChatTextID">
            <input type="text" value="<?= $_SESSION['user']['login'] ?>" id="WebChatNameID" hidden>
            <input name="common_submit" type="submit" value="Отправить"  class="btn btn-outline-secondary" >
          </form>
        </div>
    </div>
        <?php
          if($_SESSION['message']) {
            echo '<p class="msgAlert alert">' . $_SESSION['message'] . '</p>';
          }
          unset($_SESSION['message']);
        ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script>
        setInterval(()=> {
            var room = '../vendor/show.php';
            $( "#WebChatFormForm" ).load( room );
            var WebChatFormForm = document.querySelector('#WebChatFormForm')
            WebChatFormForm.scrollTop = WebChatFormForm.scrollHeight;
        }, 500)
        
    </script>

  </body>
</html>