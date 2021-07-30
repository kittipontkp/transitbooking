<?php include_once('../authen.php') ?>
<?php

    $id = $_GET['id'];

    if (isset($id)){
        $sql = "DELETE FROM `admin` WHERE `id` = '".$id."' ";
        $result = $conn->query($sql);

        if ($conn->affected_rows){
            echo '<script> alert("Finished Deleting!")</script>'; 
            header('Refresh:0; url=index.php');
        } else {
            echo '<script> alert("NO!")</script>'; 
            header('Refresh:0; url=index.php');
        }
    } else {
        header('Refresh:0; url=index.php');
    }
    
?>