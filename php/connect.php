<?php

error_reporting(E_ALL);         // เปิด error ทุกอย่าง

// error_reporting(0);         // ปิด error ในกรณีที่ต้องการแสดง error ของเราเอง

// เชื่อมต่อ Database
$conn = new mysqli('localhost', 'root', '', 'transitbooking');
$conn->set_charset('utf8');
    if ($conn->connect_errno) {
        echo "Connect Error ".$conn->connect_error;
        exit();
    }

    /*
    บันทึกคำสั่ง 
        *** เป็นตัวเลขของ error code
        echo $conn->connect_errno;
        *** เป็น error message
        echo $conn->connect_error;

    */ 
// ตั้งค่า TimeZone
date_default_timezone_set('Asia/Bangkok');
?>