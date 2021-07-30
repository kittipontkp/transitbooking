
<!-- การลิ้ง sweetalert2 เเบบ cdn  -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<?php include_once('../authen.php');

    $authen_id = $_SESSION['authen_id'];

// บันทึกผู้ร่วมเดินทางลงฐานข้อมูล 
          if(isset($_POST['ok'])) {
            echo "<pre>";
            print_r($_POST);
            echo "</pre>";
            exit;
            // นับ passengers
            $count = count($_POST['p_name']);
            // print_r($count);
            $names = $_POST['p_name'];
            // print_r($passengers);

            // เช็คค่า count
            if($count >= 1) {
              for ($i =0; $i < $count; $i++){
                // เช็คค่า passengers ไม่ใช่ค่าว่าง ใช้ฟังชัน trim ตัดวรรคและช่องว่าง
                if(trim($_POST['p_name'][$i]) != ''){
                    $sql = mysqli_query($conn, "INSERT INTO passenger(name) VALUES('$names[$i]')");
                }
              }
              echo "<script> alert('บันทึกสำเร็จ')</script>";
            }else{
              echo "<script> alert('กรุณาเลือกข้อมูล')</script>";
            }
          }  


        // หา id ล่าสุดที่บันทึกลง database ใช้ในกรณี auto increment
        // $last_id = mysqli_insert_id($conn);
        // echo $last_id;
        // exit;

 


//             if ($result) {
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


//                 // echo '<script> alert("Finished Creating!")</script>'; 
//                 // header('Refresh:0; url=index.php');
//             }else{
//                 echo '<script> alert("Creating Error! ")</script>'; 
//                 header('Refresh:0; url=index.php');
//             }
//             // echo '<script> alert("Finished Creating!")</script>'; 
//             // header('Refresh:0; url=index.php');
// }else {

//     header('Refresh:0; url=index.php');
// }
    // echo '<script> alert("Finished Creating!")</script>'; 
    // header('Refresh:0; url=index.php');
?>


