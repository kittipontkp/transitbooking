<?php

// $id = $_GET['id'];
// Require composer autoload
require_once __DIR__ . '../../vendor/autoload.php';
include('../php/connect.php');


$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/tmp',
    'fontdata' => $fontData + [
            'sarabun' => [
                'R' => 'THSarabunNew.ttf',
                'I' => 'THSarabunNewItalic.ttf',
                'B' =>  'THSarabunNewBold.ttf',
                'BI' => "THSarabunNewBoldItalic.ttf",
            ]
        ],
]);

ob_start(); // Start get HTML code
?>

<!--Thai Date-Time Formate Function  -->
<?php 
$dayTH = ['อาทิตย์','จันทร์','อังคาร','พุธ','พฤหัสบดี','ศุกร์','เสาร์'];
$monthTH = [null,'มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'];
$monthTH_brev = [null,'ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.'];
function thai_date_and_time($time){   // 19 ธันวาคม 2556 เวลา 10:10:43
    global $dayTH,$monthTH;   
    $thai_date_return = date("j",$time);   
    $thai_date_return.=" ".$monthTH[date("n",$time)];   
    $thai_date_return.= " ".(date("Y",$time)+543);   
    $thai_date_return.= " เวลา ".date("H:i",$time);
    return $thai_date_return;   
} 
function thai_date_and_time_short($time){   // 19  ธ.ค. 2556 10:10:4
    global $dayTH,$monthTH_brev;   
    $thai_date_return = date("j",$time);   
    $thai_date_return.=" ".$monthTH_brev[date("n",$time)];   
    $thai_date_return.= " ".(date("Y",$time)+543);   
    $thai_date_return.= " ".date("H:i:s",$time);
    return $thai_date_return;   
} 
function thai_date_short($time){   // 19  ธ.ค. 2556a
    global $dayTH,$monthTH_brev;   
    $thai_date_return = date("j",$time);   
    $thai_date_return.=" ".$monthTH_brev[date("n",$time)];   
    $thai_date_return.= " ".(date("Y",$time)+543);   
    return $thai_date_return;   
} 
function thai_date_fullmonth($time){   // 19 ธันวาคม 2556
    global $dayTH,$monthTH;   
    $thai_date_return = date("j",$time);   
    $thai_date_return.=" ".$monthTH[date("n",$time)];   
    $thai_date_return.= " ".(date("Y",$time)+543);   
    return $thai_date_return;   
} 
function thai_date_short_number($time){   // 19-12-56
    global $dayTH,$monthTH;   
    $thai_date_return = date("d",$time);   
    $thai_date_return.="-".date("m",$time);   
    $thai_date_return.= "-".substr((date("Y",$time)+543),-2);   
    return $thai_date_return;   
} 
?>
<!-- <br />
<?=time()?><br />
<?=thai_date_and_time(time())?><br />
<?=thai_date_and_time_short(time())?><br />
<?=thai_date_short(time())?><br />
<?=thai_date_fullmonth(time())?><br />
<?=thai_date_short_number(time())?><br />    -->


<!DOCTYPE html>
<html>
<head>
<title>PDF</title>
<link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
<style>
body {
    font-family: sarabun;
}
table {
  border-collapse: collapse;
  width: 100%;
}

td, th {
  /* border: 1px solid #ffffff; */
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #ffffff;
}

h1{
    text-align: center;
}

.underline{
    position: relative;   
}
.underline::before {
    content: "";
    border-bottom: 2px solid #333;
    position: absolute;
    bottom: 0;
}

h2 {
border-bottom: dashed 1px skyblue;
position: relative;
}
h2 :after {
position: absolute;
content: '';
display: block;
border-bottom: dashed 1px #ffc778;
bottom: -3px;
left: 30%;
}
</style>


</head>
<body>

<?php  

$sql = "SELECT * FROM `booking` WHERE `id` = '".$id."'";

$result = $conn->query($sql);
$row = $result->fetch_assoc();



?>

<h3 align="center">ใบขออนุญาตใช้รถส่วนกลาง</h3> <?php // echo $id ?>


<div class="container">

<h4 align="right">แบบ 3</h4>
<div class="t1">
  <table cellpadding=0 cellspacing=0>
    <tr>
      <td align="center"> <h3>ใบขอนุญาตใช้รถส่วนกลาง</h3> </td>
    </tr>
  </table>
</div>

<div class="t1">
  <table cellpadding=5 cellspacing=0>
    <tr>
      <td align="right">วันที่ <span class="dot"> 24 มีนาคม พ.ศ. 2564</span> </td>
    </tr>
  </table>
</div>

<div class="t1">
  <table cellpadding=5 cellspacing=0>
    <tr>
      <td align="left">เรียน <span class="dot"> คุณ Lorem ipsum dolor, sit amet consectetur adipisicing elit.</span> </td>
    </tr>
  </table>
</div>

<div class="t1">
  <table cellpadding=5 cellspacing=0>
    <tr>
      <td align="center">ข้าพเจ้า <span class="dot"> นาย Lorem ipsum dolor, sit amet consectetur adipisicing elit.</span> </td>
      <td align="right">ตำแหน่ง <span class="dot"> Lorem ipsum dolor, sit amet consectetur adipisicing elit.</span> </td>
    </tr>
  </table>
</div>

<div class="t1">
  <table cellpadding=5 cellspacing=0>
    <tr>
      <td align="left">สังกัด <span class="dot"> นาย Lorem ipsum dolor, sit amet consectetur adipisicing elit.</span> </td>
      <td align="left">โทรศัพท์ (ภายใน) <span class="dot"> Lorem ipsum dolor, sit amet consectetur adipisicing elit.</span> </td>
    </tr>
  </table>
</div>

<div class="t1">
  <table cellpadding=5 cellspacing=0>
    <tr>
      <td align="left">ขออนุญาตใช้รถ (สถานที่) <span class="dot"> นาย Lorem ipsum dolor, sit amet consectetur adipisicing elit.</span> </td>
      <td align="left">จังหวัด <span class="dot"> Lorem ipsum dolor, sit amet consectetur adipisicing elit.</span> </td>
    </tr>
  </table>
</div>

<div class="t1">
  <table cellpadding=5 cellspacing=0>
    <tr>
      <td align="left">เพื่อ <span class="dot"> Lorem ipsum dolor, sit amet consectetur adipisicing elit.</span> </td>
    </tr>
  </table>
</div>

<div class="t1">
  <table cellpadding=5 cellspacing=0>
    <tr>
      <td align="left">ในวันที่ <span class="dot"> Lorem ipsum dolor, sit amet consectetur adipisicing elit.</span> </td>
      <td align="left">ถึงวันที่ <span class="dot"> Lorem ipsum dolor, sit amet consectetur adipisicing elit.</span> </td>
    </tr>
  </table>
</div>

<div class="t1">
  <table cellpadding=5 cellspacing=0>
    <tr>
      <td align="left">จำนวนผู้เดินทาง <span class="dot"> Lorem ipsum dolor, sit amet consectetur adipisicing elit.</span> คน ประกอบด้วย</td>
    </tr>
  </table>
</div>

<div class="t1">
  <table cellpadding=5 cellspacing=0>
    <tr>
      <td align="center">1. <span class="dot"> Lorem ipsum dolor, sit amet consectetur adipisicing elit.</span></td>
      <td align="right"></td>
    </tr>
  </table>
</div>

<div class="t1">
  <table cellpadding=5 cellspacing=0>
    <tr>
      <td align="center">2. <span class="dot"> Lorem ipsum dolor, sit amet consectetur adipisicing elit.</span></td>
    </tr>
  </table>
</div>

<div class="t1">
  <table cellpadding=5 cellspacing=0>
    <tr>
      <td align="center">3. <span class="dot"> Lorem ipsum dolor, sit amet consectetur adipisicing elit.</span></td>
    </tr>
  </table>
</div>

<div class="t1">
  <table cellpadding=5 cellspacing=0>
    <tr>
      <td align="center">4. <span class="dot"> Lorem ipsum dolor, sit amet consectetur adipisicing elit.</span></td>
    </tr>
  </table>
</div>
</div>



<!-- <ul class="list-group">
  <li class="list-group-item">Cras justo odio</li>
  <li class="list-group-item">Dapibus ac facilisis in</li>
  <li class="list-group-item">Morbi leo risus</li>
  <li class="list-group-item">Porta ac consectetur ac</li>
  <li class="list-group-item">Vestibulum at eros</li>
</ul> -->

<!-- <div>
    Some text to start with

    <div style="float: right; width: 28%;">
        วันที่
    </div>

    <div style="float: left; width: 54%;">
        This is text that is set to float:left.
    </div>

    <div style="clear: both; margin: 0pt; padding: 0pt; "></div>

    This is text that follows the clear:both.
</div> -->

<table cellpadding=0 cellspacing=0>
  <tr >
    <td width="45%"></td>
    <td width="45%"></td>
    <td align="right"><b>แบบฟอร์ม 3</b></td>
  </tr>
</table>

  <table cellpadding=5 cellspacing=0>
    <tr>
      <td align="left">เรียน <span class="dot"> คุณ Lorem ipsum dolor, sit amet consectetur adipisicing elit.</span> </td>
    </tr>
  </table>

<table>
<tr >
    <td align="left"><b>ข้าพเจ้า </b><?php echo $_SESSION['prefix']. ' ' .$_SESSION['first_name']. ' ' .$_SESSION['last_name']; ?> </td>
    <td style="width:20px">ตำแหน่ง</td>
    <td align="right"><b></b></td>
  </tr>
</table>

<table cellpadding=5 cellspacing=0>
    <tr>
      <td align="center">ข้าพเจ้า <span> นาย Lorem ipsum dolor, sit amet consectetur adipisicing elit.</span> </td>
      <td align="right">ตำแหน่ง <span> Lorem ipsum dolor, sit amet consectetur adipisicing elit.</span> </td>
    </tr>
  </table>
  

<div style="width: 30px;">
fdghkjghklh
</div>

<table>
  <tr>
    <th>ชื่อ</th>
    <th>ตำแหน่ง</th>
    <th>สังกัด</th>
    <th>โทรศัพท์(ภายใน)</th>
    <th>ขออนุญาตใช้รถ (สถานที่)</th>
    <th>เพื่อ</th>
    <th>วันที่เริ่มต้น</th>
    <th>วันที่สิ้นสุด</th>
  </tr>
  <tr>
    <td>ข้าพเจ้า <?php echo $_SESSION['prefix']. ' ' .$_SESSION['first_name']. ' ' .$_SESSION['last_name']; ?></td>
    <td><?php echo 'test' ?></td>
    <td><?php echo 'test' ?></td>
    <td><?php echo $row['phonenum'] ?></td>
    <td><?php echo $row['place'] ?></td>
    <td><?php echo $row['purpose'] ?></td>
    <td><?php $datestart = $row['date_start']; echo thai_date_and_time(strtotime($datestart)). " ". 'น.'; ?></td>
    <td><?php $dateend = $row['date_end']; echo thai_date_and_time(strtotime($dateend)). " ". 'น.'; ?></td>
  </tr>
</table>

<a href="#" class="list-group-item list-group-item-action" aria-current="true">
    <div class="d-flex w-100 justify-content-between">
      <p class="mb-1 fs-6 fw-bold">ผู้ร่วมเดินทาง</p>
    </div>
    <?php
                  $sql_pass = "SELECT * FROM passenger WHERE b_id = '".$row['id']."' ";
                  $result_pass = $conn->query($sql_pass);
                  $num_pass = 0;
                  while ($row_pass = $result_pass->fetch_assoc()) {
                      $num_pass++;
    ?>
    <ul class="mb-1">
    <li><?php echo $row_pass['name']; ?></li>
    </ul>
    <?php } ?>
  </a>

</body>
</html>






<?php
$stylesheet = file_get_contents('../../plugins/bootstrap-3.3.7/css/bootstrap.min.css');
$html = ob_get_contents();
$mpdf->WriteHTML($html);
$mpdf->Output("MyPDF.pdf");
ob_end_flush()
?>

ดาวโหลดรายงานในรูปแบบ PDF <a href="MyPDF.pdf">คลิกที่นี้</a>