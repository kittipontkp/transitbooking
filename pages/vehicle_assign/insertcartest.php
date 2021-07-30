<?php include_once('../authen.php') ?>
<?php
    // exit;
    echo '<pre>', print_r($_POST), '</pre>';
   
//     exit;
    
    $id = $_POST['id'];
    
  if (isset($_POST['submit'])) {

      // update สถานะแอดมินหมวดยานฯ
//       $update_status = "UPDATE `booking` 
//                         SET `status` = '".$_POST['status']."'
//                         WHERE `id` = '".$_POST['id']."';";

//       $update_result = $conn->query($update_status) or die($conn->error);

      // บันทึกข้อมูลรถและคนขับ
//       foreach ($_POST['cars'] as $car) {

//         foreach ($_POST['drivers'] as $driver){
//                 // $driver_id =  $driver_id.'|'.$driver;
//        }
for ($i=1; $i <=5; $i++) {
        $car = $_POST['car'.$i];
        $driver = $_POST['driver'.$i];
}    

echo $car;
exit;

// $sql = "INSERT INTO addcars (booking_id, car_id,driver_id, created_date) 
//                 VALUE ('".$id."',
//                         '".$car."',
//                         '".$driver."',
//                         '".date("Y-m-d H:i:s")."');"; 

//         $result = $conn->query($sql) or die($conn->error);

//         }     
//       if ($result) {
//             echo '<script> alert("เพิ่่มข้อมูลรถ-คนขับเรียบร้อยแล้ว")</script>'; 
//             header('Refresh:0; url=index.php');
//     }else {
//             echo '<script> alert("ไม่สามารถเพิ่มข้อมูลได้")</script>'; 
//             header('Refresh:0; url=index.php');
  }
?>