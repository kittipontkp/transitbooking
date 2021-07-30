<?php include_once('../authen.php') ?>
<?php
    // echo '<pre>', print_r($_POST), '</pre>';
  
  if (isset($_POST['submit'])) {
    $sql = "UPDATE `booking` 
            SET `status` = '".$_POST['status']."'
            WHERE `id` = '".$_POST['id']."';";

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