<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>เข้าสู่ระบบ</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/adminlte.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<!-- Bootstrap 5 -->
<link rel="stylesheet" href="plugins/bootstrap5/dist/css/bootstrap.min.css">
<!-- SweetAlert 2 -->
<script src="plugins/jquery/jquery.min.js"></script>
<link rel="stylesheet" href="plugins/sweetalert2/dist/sweetalert2.min.css">
<script src="plugins/sweetalert2/dist/sweetalert2.min.js"></script>
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">


</head>
<body class="text-center">
<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      html,
body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  padding-top: 60px;
  padding-bottom: 60px;
  /* background-color: #f5f5f5; */
  background-color: #C7EAFE;
}

.form-signin {
  width: 100%;
  max-width: 700px;
  padding: 100px;
  margin: auto;
}

.form-signin .checkbox {
  font-weight: 400;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="text"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-control{
  background-color: #F5F5F5 !important;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
.mb-4 {
    margin-bottom: 0.5rem !important;
}
</style>

    
</head>


<?php 
  session_start();
  require_once('php/connect.php');
      if (isset($_POST['submit'])) {
        // $_SESSION['authen_id'] = 1; 
        // header('Location: pages/dashboard');

        // print_r($_POST);

        $username = $conn->real_escape_string($_POST['username']);
        $password = $conn->real_escape_string($_POST['password']);

        $sql = "SELECT * FROM `admin` WHERE `username` = '".$username."'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        // echo '<pre>', print_r($row), '</pre>';

        if (!empty($row) && password_verify($password, $row['password'] )) {
            $_SESSION['authen_id'] = $row['id'];
            $_SESSION['prefix'] = $row['prefix'];
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name'] = $row['last_name'];
            $_SESSION['status'] = $row['status'];
            $_SESSION['last_login'] = $row['last_login'];

            $update = "UPDATE `admin` SET `last_login` = '".date("Y-m-d H:i:s")."' WHERE `id` = '".$row['id']."'";
            $result_update = $conn->query($update);

            if ($result_update) {
     
              echo "<script>";
              echo    "Swal.fire({
                          icon: 'success',
                          title: 'เข้าสู่ระบบสำเร็จ',
                          showConfirmButton: false,
                          timer: 2000
                      }).then((result) => {
                          if (result.isDismissed) {
                              window.location.href = 'pages/dashboard';
                          }
                        });";
              echo "</script>";  

            }else {
              echo '<script> alert("Error") </script>';
            } 
          }else {

            echo "<script>";
              echo    "Swal.fire({
                          icon: 'warning',
                          title: 'ชื่อผู้ใช้งาน และ รหัสผ่านไม่ถูกต้อง',
                          showConfirmButton: true,
                      }).then((result) => {
                          if (result.isDismissed) {
                              window.location.href = 'login.php';
                          }
                        });";
              echo "</script>";  
            // echo '<script> alert("ชื่อผู้ใช้งาน และ รหัสผ่านไม่ถูกต้อง") </script>';

          }
        }
?>
 
<main class="form-signin">
    <img class="mb-4" src="dist/img/LOGO_NSO.png" alt="" width="250" height="75">
        <h1 class="h3 fw-bold" style="color:#076EA6;">ระบบจองยานพาหนะ</h1><br>
        <h4 class="fw-normal fs-5 py-2">กรุณาลงชื่อเข้าใช้งาน</h4>
            <form action="" method="post">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" name="username" placeholder="ชื่อผู้ใช้งาน" required>
                    <label for="floatingInput">ชื่อผู้ใช้งาน</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="รหัสผ่าน" required>
                    <label for="floatingPassword">รหัสผ่าน</label>
                </div>

                <div class="checkbox mb-3">
                <!-- <label>
                  <input type="checkbox" value="remember-me"> Remember me
                </label> -->
                </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">เข้าสู่ระบบ</button>
                    <p class="mt-5 mb-3 text-muted">&copy; nsocars</p>
            </form>
</main>

</body>
</html>
