<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<!-- SweetAlert 2 -->
<link rel="stylesheet" href="../../plugins/sweetalert2/dist/sweetalert2.min.css">
<script src="../../plugins/sweetalert2/dist/sweetalert2.min.js"></script>
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>


</head>
<body>


<?php

include_once('../authen.php');


if (isset($_POST['ok'])) {

    $id = $_POST['id'];
    
    $sql = "UPDATE `booking` 
            SET `status_use` = '".$_POST['status_use']."', 
                `last_updated` = '".date("Y-m-d H:i:s")."' 
            WHERE `id` = '".$id."'; ";

            // echo $sql;
            // exit;

            $result = $conn->query($sql) or die($conn->error);

            if ($result){

                echo "<script>";
                echo    "Swal.fire({
                            icon: 'success',
                            title: 'สำเร็จ',
                            text: 'ยกเลิกข้อมูลการจองเรียบร้อยแล้ว',
                            showConfirmButton: true,
                            timer: 2000
                        }).then((result) => {
                            if (result.isDismissed) {
                                window.location.href = 'form-edit.php?id=$id';
                            }
                          });";
                echo "</script>"; 

                // echo '<script> alert("Finished Updating!")</script>'; 
                // header("Refresh:0; url=form-edit.php?id=$id");

            } else {

                echo "<script>";
                echo    "Swal.fire({
                            icon: 'error',
                            title: 'มีข้อผิดพลาด',
                            text: 'ยกเลิกข้อมูลการจองไม่สำเร็จ',
                            showConfirmButton: true,
                            timer: 2000
                        }).then((result) => {
                            if (result.isDismissed) {
                                window.location.href = 'form-edit.php?id=$id';
                            }
                          });";
                echo "</script>";                 
                // echo '<script> alert("Error Updating!")</script>'; 
                // header('Refresh:0; url=form-edit.php');
            }
        
}else {
    header("Refresh:0; url=form-edit.php?id=$id");
}

?>

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>