<?php 
    session_start();
    require_once('php/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <link rel="stylesheet" href="assets/css/signin.css"> -->
    <!-- <link rel="stylesheet" href="../../assets/css/colors_bt5.css"> -->
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="plugins/bootstrap5/dist/css/bootstrap.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">


    <title>User Page</title>
</head>
<body>
    
    <div class="container mt-5">
        <div class="row">
            <h1>ยินดีต้อนรับ คุณ <?php echo $_SESSION['first_name']. '' .$_SESSION['last_name'] ?></h1>
            <hr>
            <div class="col-md-12">
            <a href="index.php" class="btn btn-success">ไปหน้าระบบจองยานพาหนะ</a>
            </div>
            <div class="col-md-12">
                <h1>Welcome to user page</h1>
                <a 
                    href="logout.php" class="btn btn-danger"
                    onclick="return confirm('ต้องการออกจากระบบใช่ไหม')
                    ;"
                >
                    ออกจากระบบ
                </a>
            </div>
        </div>
    </div>

</body>
</html>