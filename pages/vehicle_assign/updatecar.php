<?php include_once('../authen.php') ?>
<?php
    echo '<pre>', print_r($_POST), '</pre>';
  
    exit;
  if (isset($_POST['submit'])) {

    $sql = "UPDATE `booking` 
            SET `status` = '".$_POST['status']."', 
                `car_id` = '".$_POST['car_id']."', 
                `driver_id` = '".$_POST['driver_id']."', 
                `last_updated` = '".date("Y-m-d H:i:s")."' 
            WHERE `id` = '".$_POST['id']."'; ";

            // echo $sql;
            // exit;

            $result = $conn->query($sql) or die($conn->error);
            
            if ($result) {
                echo '<script> alert("Finished Updating!")</script>'; 
                header('Refresh:0; url=index.php');
            }else {
                echo '<script> alert("Update Error")</script>'; 
                header('Refresh:0; url=index.php');
            }
}else {
    header('Refresh:0; url=index.php');
}
?>