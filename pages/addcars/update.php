<?php 
    include_once('../authen.php');

    // echo '<script> alert("Finished Updating!")</script>'; 
    // header('Refresh:0; url=index.php');

    if (isset($_POST['submit'])) {
        $sql = "UPDATE `admin` 
                SET `first_name` = '".$_POST['first_name']."', 
                `last_name` = '".$_POST['last_name']."', 
                `status` = '".$_POST['status']."', 
                `last_login` = '".date("Y-m-d H:i:s")."' 
                WHERE `id` = '".$_POST['id']."';";

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
    // print_r($_POST);
?>