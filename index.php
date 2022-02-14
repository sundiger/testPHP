<?php
    session_start();
    if($_SESSION['user']) {
        header('Location:  profile.php');
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

    <title>Авторизация</title>

    <link rel="stylesheet" href="./assets/css/main.css"/>

  </head>
  <body>
    <h1>Авторизация</h1>
    <form action="vendor/signin.php" method="post" class="form needs-validation" novalidate>
        <input type="text" name="email" placeholder="Email" class="inpAuth form-control" required/>
        <input type="password" name="password" placeholder="Пароль" class="inpAuth inpAuthPass form-control" required />
        <button class="btn btn-success" style="margin-top: 20px;" type="submit">Авторизоваться</button>
        <p class="pAuth" style="margin-top: 20px; text-align: center;">Еще не зарегистрированы? <a href="/register.php">Зарегистрироваться</a></p>
        <p>Связь с администрацией сайта: <b>alex@sundiger.ru</b></p>
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
        })()
    </script>

  </body>
</html>