<?php include_once('../authen.php') ?>
<?php

if (isset($_POST['submit'])) {
    // print_r ($_POST);

    $sql = "INSERT INTO `booking` (`prefix`, `fname`, `lname`, `sub_department`, `phonenum`, `place`, `goal`, `date_start`, `date_end`) 
            VALUES ('".$_POST['prefix']."', 
                    '".$_POST['fname']."', 
                    '".$_POST['lname']."', 
                    '".$_POST['sub_department']."', 
                    '".$_POST['phonenum']."', 
                    '".$_POST['place']."', 
                    '".$_POST['goal']."', 
                    '".date("Y-m-d")."', 
                    '".date("Y-m-d")."');";


            $result = $conn->query($sql) or die($conn->error);

            if ($result) {
                echo '<script> alert("Finished Creating!")</script>'; 
                header('Refresh:0; url=index.php');
            }else{
                echo '<script> alert("Creating Error! ")</script>'; 
                header('Refresh:0; url=index.php');
            }
            // echo '<script> alert("Finished Creating!")</script>'; 
            // header('Refresh:0; url=index.php');
}else {

    header('Refresh:0; url=index.php');
}
    // echo '<script> alert("Finished Creating!")</script>'; 
    // header('Refresh:0; url=index.php');
?>


