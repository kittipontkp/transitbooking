<?php include_once('../authen.php') ?>
<?php

    
    // echo '<script> alert("Finished Creating!")</script>'; 
    // header('Refresh:0; url=index.php');
    // print_r($_POST);

    if (isset($_POST['submit'])){

        // เช็ค Username ว่าซ้ำกันหรือไม่ 
        $sql_check_username = "SELECT * FROM `admin` WHERE `username` = '".$_POST['username']."' ";
        $check_username = $conn->query($sql_check_username);

        // print_r($check_username);

        if (!$check_username->num_rows){
            // echo "ไม่มีข้อมูล";
            $hashed = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $sql = "INSERT INTO `admin` (`prefix`, `first_name`, `last_name`, `username`, `password`, `email`, `phone_number`, `status`, `last_login`, `updated_at`, `created_at`) 
            VALUES ('".$_POST['prefix']."', 
                    '".$_POST['first_name']."', 
                    '".$_POST['last_name']."', 
                    '".$_POST['username']."', 
                    '".$hashed."', 
                    '".$_POST['email']."', 
                    '".$_POST['phone_number']."', 
                    '".$_POST['status']."', 
                    '".date("Y-m-d H:i:s")."', 
                    '".date("Y-m-d H:i:s")."', 
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
            echo '<script> alert("Username is already exits! ")</script>'; 
            header('Refresh:0; url=index.php');
        }
        



    }else{
        header('Refresh:0; url=index.php');
    }
?>