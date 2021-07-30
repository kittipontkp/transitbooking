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
    
<?php include_once('../authen.php');

// echo '<pre>', print_r($_POST), '</pre>';
    $authen_id = $_SESSION['authen_id'];
    // $purpose = $mysqli -> real_escape_string($_POST['purpose']);

if (isset($_POST['submit'])) {


    $sql = "INSERT INTO `booking` (`department`, `phonenum`, `place`, `province`, `purpose`, `date_start`, `date_end`, `user_id`, `created_at`) 
            VALUES ('".$_POST['department']."', 
                    '".$_POST['phonenum']."', 
                    '".$_POST['place']."', 
                    '".$_POST['province']."', 
                    '".$_POST['purpose']."', 
                    '".$_POST['date_start']."', 
                    '".$_POST['date_end']."', 
                    '".$authen_id."', 
                    '".date("Y-m-d H:i:s")."');";

    $result = $conn->query($sql) or die($conn->error);

    // หา id ล่าสุดที่บันทึกลง database ใช้ในกรณี auto increment
    $last_id = mysqli_insert_id($conn);
    // echo $last_id;
    // exit;


if ($result) {

// นับ passengers
        $count = count($_POST['p_name']);
        // print_r($count);
        $names = $_POST['p_name'];
        // print_r($names);
        // เช็คค่า count
        $sequence = $_POST['sequence'];
        if ($count >= 1) {
            for ($i =0; $i < $count; $i++) {
                // เช็คค่า passengers ไม่ใช่ค่าว่าง ใช้ฟังชัน trim ตัดวรรคและช่องว่าง
                // $name = mysqli_real_escape_string($conn, $_POST['p_name'][$i]);                
                if (trim($_POST['p_name'][$i]) != '') {
                    $sql1 = "INSERT INTO passenger (sequence, name, b_id) 
                            VALUES('".$sequence[$i]."','".$names[$i]."',  '".$last_id."');";
                    $result1 = $conn->query($sql1) or die($conn->error);
                    // exit;
                }
            }



            
            if ($result || $result1){

                    echo "<script>";
                    echo    "Swal.fire({
                                icon: 'success',
                                title: 'จองยานพาหนะสำเร็จ',
                                text: 'สถานะรอการอนุมัติ',
                                showConfirmButton: false,
                                timer: 3000
                            }).then((result) => {
                                if (result.isDismissed) {
                                    window.location.href = 'index.php';
                                }
                              });";
                    echo "</script>";

            } else {

                echo "<script>";
                echo    "Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        });";
                echo "</script>";

            }
            
        } else {

            header('Refresh:0; url=index.php');
        }
    }
}

?>

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>






