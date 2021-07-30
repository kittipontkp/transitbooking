
<!-- การลิ้ง sweetalert2 เเบบ cdn  -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<?php include_once('../authen.php');

echo '<pre>', print_r($_POST), '</pre>';
    $authen_id = $_SESSION['authen_id'];

if (isset($_POST['submit'])) {
    // echo "<pre>";
    // print_r($_POST);
    // print_r($_SESSION['authen_id']);
    // echo "</pre>";
    // exit;

    
    $sql = "INSERT INTO `booking` (`sub_department`, `phonenum`, `place`, `purpose`, `date_start`, `date_end`, `user_id`, `created_at`) 
            VALUES ('".$_POST['sub_department']."', 
                    '".$_POST['phonenum']."', 
                    '".$_POST['place']."', 
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
        print_r($count);
        $names = $_POST['p_name'];
        print_r($names);
// exit;
        // เช็คค่า count
        if ($count >= 1) {
            for ($i =0; $i < $count; $i++) {
                // เช็คค่า passengers ไม่ใช่ค่าว่าง ใช้ฟังชัน trim ตัดวรรคและช่องว่าง
                
                // $name = mysqli_real_escape_string($conn, $_POST['p_name'][$i]);
                
                if (trim($_POST['p_name'][$i]) != '') {
                    $sql1 = "INSERT INTO passenger (name, b_id) 
                            VALUES('".$names[$i]."', '".$last_id."');";

                    $result1 = $conn->query($sql1) or die($conn->error);
                    // exit;
                }
            }
            if ($_SESSION['status'] == 'user'){

                // echo
                // "<script> 
                //     Swal.fire({
                //         position: 'center',
                //         icon: 'success',
                //         title: 'บันทึกข้อมูลสำเร็จ',
                //         showConfirmButton: false,
                //         timer: 6500
                    
                //     }).then(()=> location = 'indexuser.php')
                // </script>";


                echo "<script> alert('user บันทึกสำเร็จ')</script>";
                header('Refresh:0; url=indexuser.php');

                // echo '<script type="text/javascript">';
                // echo 'alertSuccess("ส่งข้อมูลการจองเรียบร้อยแล้ว","indexuser.php")';
                // echo '</script>';
                
            } else {
                echo "<script> alert('admin บันทึกสำเร็จ')</script>";
                header('Refresh:0; url=index.php');
            }
            
        } else {
            echo "<script> alert('')</script>";
        }
    }
}


// echo
//                 "<script> 
//                     Swal.fire({
//                         position: 'center',
//                         icon: 'success',
//                         title: 'บันทึกข้อมูลสำเร็จ',
//                         showConfirmButton: false,
//                         timer: 6500
                    
//                     }).then(()=> location = 'index.php')
//                 </script>";


                // echo '<script> alert("Finished Creating!")</script>'; 
                // header('Refresh:0; url=index.php');
            // }else{
            //     echo '<script> alert("Creating Error! ")</script>'; 
            //     header('Refresh:0; url=index.php');
            // }
            // echo '<script> alert("Finished Creating!")</script>'; 
            // header('Refresh:0; url=index.php');
// }else {

//     header('Refresh:0; url=index.php');
// }
    // echo '<script> alert("Finished Creating!")</script>'; 
    // header('Refresh:0; url=index.php');
?>


<!-- <link rel="stylesheet" href="plugins/toastr-master/build/toastr.min.css"> -->
<!-- jQuery -->
<!-- <script src="plugins/jquery/jquery.min.js"></script> -->
<!-- <script src="plugins/toastr-master/build/toastr.min.js"></script> -->

<!-- <script type="text/javascript">
  function alertSuccess(massage,url){
    $(function(){
      toastr.options.onHidden = function(){
        window.location.href = url;
      }
      toastr.success(massage, 'Success', {timeOut: 1000})
    })
  }
</script> -->


<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>


