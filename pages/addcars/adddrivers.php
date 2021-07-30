<?php include_once('../authen.php') ?>

<?php
    // echo '<script> alert("Finished Creating!")</script>'; 
    // header('Refresh:0; url=index.php');
    print_r($_POST);

    if (isset($_POST['submit'])){

            $sql = "INSERT INTO `drivers_list` (`name`, `phone`, `driver_status`, `last_updated`) 
            VALUES ('".$_POST['name']."', 
                    '".$_POST['phone']."', 
                    '".$_POST['driver_status']."', 
                    '".date("Y-m-d H:i:s")."');";


            $result = $conn->query($sql) or die($conn->error);
            if ($result) {
  
                echo '<script> alert("Finished Creating!")</script>'; 
                header('Refresh:0; url=index.php');
            }else{
                echo '<script> alert("Creating Error! ")</script>'; 
                header('Refresh:0; url=index.php');
            }
        }else {
            echo '<script> alert("Username is already esits! ")</script>'; 
            header('Refresh:0; url=index.php');
        }
        
?>