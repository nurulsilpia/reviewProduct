<?php
    include "config/koneksi.php";
    include "library/controller.php";

    $go = new controller();

    $tabel = "login";
    @$username = $_POST['user'];
    @$password = base64_encode($_POST['pass']);
    $redirect = "dashboard.php";

    if(isset($_POST['login'])){
        $go->login($con, $tabel, $username, $password, $redirect);
    }
?>


<!doctype html>
<html lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Login</title>
  </head>
  <body>
    <center>
    <img src="images/login.svg" width="500" class="mt-2">
    <form method="post" class="w-25 mt-4">
        <div class="mb-2">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text" name="user" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" style="text-align:center;">
            <div id="emailHelp" class="form-text">We'll never share your account with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="pass" required class="form-control"  id="showPass" style="text-align:center;" autocomplete="off">
            <p class="mt-3 text-secondary"><input type="checkbox" onclick="myFunction()"> Show Password</p>
        </div>
        <button type="submit" name="login" value="LOGIN" class="btn btn-primary">LOGIN</button>
    </form>
    </center>

    <!-- SHOW PASSWORD -->
    <script>
    function myFunction() {
        var x = document.getElementById("showPass");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    </script>
    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>