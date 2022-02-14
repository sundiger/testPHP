<?php
    session_start();
    if(!$_SESSION['user']) {
        header('Location:  /');
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Профиль</title>

    <link rel="stylesheet" href="./assets/css/main.css"/>

  </head>
  <body>
    <h2>Профиль</h1>
    <div class="form">
        <h4 style="margin-bottom: 20px;">
            <?=
                $_SESSION['user']['email']
            ?>
        </h4>
        <a href="game/index.html" style="margin-top: 20px; margin-bottom: 20px;">
            <button class="btn btn-success">
                Игра
            </button>
        </a>
        <form style="border: 1px solid black; border-radius: 10px;" class="form needs-validation" action="vendor/join_room.php" method="post" novalidate>
            <h6>Подключение к комнате</h6>
            <div class="input-group mb-3" style="margin-top: 20px;">
              <span class="input-group-text" id="basic-addon1">@</span>
              <input type="text" class="form-control" placeholder="Название комнаты" aria-label="Username" aria-describedby="basic-addon1" name="room_name" required>
            </div>
            <div class="form-check form-switch" style="margin-bottom: 20px;">
              <input class="form-check-input passRoomSwitch" type="checkbox" id="flexSwitchCheckDefault" >
              <label class="form-check-label" for="flexSwitchCheckDefault">Пароль от комнаты</label>
            </div>
            <input type="hidden" class="form-control passRoom" placeholder="Пароль" aria-label="PasswordRoom" aria-describedby="basic-addon1" name="room_pass" required>
            <button class="btn btn-success" style="margin-top: 20px;" type="submit">Подключиться</button>
            <?php
              if($_SESSION['message']) {
                echo '<p class="msgAlert alert">' . $_SESSION['message'] . '</p>';
              }
              unset($_SESSION['message']);
            ?>
            <script>
              if (document.querySelector('.msgAlert')) {
                setTimeout(()=> {
                  document.querySelector('.msgAlert').remove();
                }, 3000)
              }
            </script>
        </form>
        
        <form action="vendor/create_room.php" method="post" style="border: 1px solid black; border-radius: 10px; margin-top: 40px;" class="form needs-validation" novalidate>
            <h6>Создание комнаты</h6>
            <div class="input-group mb-3" style="margin-top: 20px;">
              <span class="input-group-text" id="basic-addon1">@</span>
              <input name="rooms_name" type="text" class="form-control" placeholder="Название комнаты" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>
            <div class="form-check form-switch" style="margin-bottom: 20px;">
              <input class="form-check-input passRoomSwitch2" type="checkbox" id="flexSwitchCheckDefault">
              <label class="form-check-label" for="flexSwitchCheckDefault">Пароль от комнаты</label>
            </div>
            <input name="rooms_pass" type="hidden" class="form-control passRoom2" placeholder="Пароль комнаты" aria-label="PasswordRoom2" aria-describedby="basic-addon2" required>
            <button class="btn btn-success" style="margin-top: 20px;" type="submit">Создать</button>
        </form>
        
        <a href="vendor/logout.php" style="margin-top: 20px;">
            <button class="btn btn-primary">
                Выйти
            </button>
        </a>
    </div>

    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script type="text/javascript">
        (function () {
          'use strict'

          var forms = document.querySelectorAll('.needs-validation')

          Array.prototype.slice.call(forms)
            .forEach(function (form) {
              form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                  event.preventDefault()
                  event.stopPropagation()
                }

                form.classList.add('was-validated')



              }, false)
            })

            let passRoom = document.querySelector('.passRoom')
            let passRoomSwitch = document.querySelector('.passRoomSwitch')

            passRoomSwitch.onclick = () => {
                passRoom.type === 'hidden' ? passRoom.type = 'text' : passRoom.type = 'hidden'
            }
            let passRoom2 = document.querySelector('.passRoom2')
            let passRoomSwitch2 = document.querySelector('.passRoomSwitch2')

            passRoomSwitch2.onclick = () => {
                passRoom2.type === 'hidden' ? passRoom2.type = 'text' : passRoom2.type = 'hidden'
            }

        })()
    </script>

  </body>
</html>