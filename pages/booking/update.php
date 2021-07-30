<?php include_once('../authen.php'); ?>


<!DOCTYPE html>
<html>
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
// echo '<pre>', print_r($_POST), '</pre>';


if (isset($_POST['submit'])) {


    // $sql = "UPDATE `booking` 
    //         SET `department` = '".$_POST['department']."', 
    //             `phonenum` = '".$_POST['phonenum']."', 
    //             `place` = '".$_POST['place']."', 
    //             `province` = '".$_POST['province']."', 
    //             `purpose` = '".$_POST['purpose']."', 
    //             `date_start` = '".$_POST['date_start']."', 
    //             `date_end` = '".$_POST['date_end']."', 
    //             `last_updated` = '".date("Y-m-d H:i:s")."' 
    //         WHERE `id` = '".$_POST['id']."'; ";


    //         $result = $conn->query($sql) or die($conn->error);


                // นับ passengers
                    $count = count($_POST['p_name']);
                    print_r($count);



                    $names = $_POST['p_name'];


                    print_r($names);
                    // เช็คค่า count
                    if ($count >= 1) {
                        for ($i =0; $i < $count; $i++) {


                    //         // เช็คค่า passengers ไม่ใช่ค่าว่าง ใช้ฟังชัน trim ตัดวรรคและช่องว่าง           
                            if (trim($_POST['p_name'][$i]) != '') {
                                $sql1 = "UPDATE `passenger`
                                        SET `name` = '".$names[$i]."'
                                        WHERE `b_id` = '".$_POST['id']."'; ";

                                        echo $sql1;
                                        exit();
                               
                                        

                    //             // $result1 = $conn->query($sql1) or die($conn->error);
                            }
                        }


                            // if ($result || $result1) {

                            //     echo "<script>";
                            //     echo    "Swal.fire({
                            //                 icon: 'success',
                            //                 title: 'แก้ไขข้อมูลสำเร็จ',
                            //                 showConfirmButton: false,
                            //                 timer: 2000
                            //             }).then((result) => {
                            //                 if (result.isDismissed) {
                            //                     window.location.href = 'index.php';
                            //                 }
                            //             });";
                            //     echo "</script>";  

                            // }else {
                            //     echo '<script> alert("Update Error")</script>'; 
                            //     header('Refresh:0; url=index.php');
                            }

        // }
}

?>

</body>
</html>