<?php include_once('../authen.php');
    // exit;
//     $driver_id = '';
    echo '<pre>', print_r($_POST), '</pre>';
    // exit;
        $id = $_POST['id'];
        // print_r($cars);
        // print_r($drivers);

// exit;

  if (isset($_POST['submit'])) {

      // update สถานะแอดมินหมวดยานฯ

      $update_status = "UPDATE `booking`
                        SET `status` = '".$_POST['status']."',
                            `last_updated` = '".date("Y-m-d H:i:s")."'
                        WHERE `id` = '".$_POST['id']."';";

      $update_result = $conn->query($update_status) or die($conn->error);


        $carstest = $_POST['carstest'];
        $driverstest = $_POST['driverstest'];      

        // $cars = $_POST['cars'.$i];
        // $drivers = $_POST['drivers'.$i];

        if($carstest && $driverstest){

          $sql = "INSERT INTO addcars (booking_id, car_id, driver_id, created_date) 
                VALUE ('".$id."',
                        '".$carstest."',
                        '".$driverstest."',
                        '".date("Y-m-d H:i:s")."');"; 
    //     // echo $sql;
        $result = $conn->query($sql) or die($conn->error);

        if ($update_result && $result) {
          echo '<script> alert("เพิ่่มข้อมูลเรียบร้อยแล้ว")</script>'; 
          header('Refresh:0; url=index.php');
        } else {
          echo '<script> alert("ไม่สามารถเพิ่มข้อมูลได้")</script>'; 
          header('Refresh:0; url=index.php');
        }
        
        } elseif ($cars && $drivers) {

          for ($i=1; $i<=2; $i++) {

            $cars = $_POST['cars'.$i];
            $drivers = $_POST['drivers'.$i];

            if($cars && $drivers){

              $sql = "INSERT INTO addcars (booking_id, car_id, driver_id, created_date) 
                VALUE ('".$id."',
                        '".$cars."',
                        '".$drivers."',
                        '".date("Y-m-d H:i:s")."');"; 
        // echo $sql;
        $result = $conn->query($sql) or die($conn->error);
            }

        }

          

      // วนรับค่า car_id , driver_id มาบันทึกลงตาราง addcars
    //   for ($i=1; $i<=6; $i++) {

    //     $cars = $_POST['cars'.$i];
    //     $drivers = $_POST['drivers'.$i];


        
    //     if($cars && $drivers){


    //       $sql = "INSERT INTO addcars (booking_id, car_id, driver_id, created_date) 
    //             VALUE ('".$id."',
    //                     '".$cars."',
    //                     '".$drivers."',
    //                     '".date("Y-m-d H:i:s")."');"; 
    //     // echo $sql;
    //     $result = $conn->query($sql) or die($conn->error);

    //     // exit;
    //   }
    // }

    if ($update_result && $result) {
        echo '<script> alert("เพิ่่มข้อมูลเรียบร้อยแล้ว")</script>'; 
        header('Refresh:0; url=index.php');
      } else {
        echo '<script> alert("ไม่สามารถเพิ่มข้อมูลได้")</script>'; 
        header('Refresh:0; url=index.php');
      }
      
      // }

      // บันทึกข้อมูลรถและคนขับกรณีคนขับมากกว่า 1 คน : รถ 1 คัน
//       foreach ($_POST['cars'] as $car) {

//         foreach ($_POST['drivers'] as $driver){
//                 // $driver_id =  $driver_id.'|'.$driver;
//         }
// echo $driver_id;
        // $result = $conn->query($sql) or die($conn->error);
  //  }

//       if ($result) {
//             echo '<script> alert("เพิ่่มข้อมูลเรียบร้อยแล้ว")</script>'; 
//             header('Refresh:0; url=index.php');
//     }else {
//             echo '<script> alert("ไม่สามารถเพิ่มข้อมูลได้")</script>'; 
//             header('Refresh:0; url=index.php');
        }
      }
?>