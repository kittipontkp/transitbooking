<?php


$dayTH = ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'];
$monthTH = [null, 'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];
$monthTH_brev = [null, 'ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];
function thai_date_and_time($time)
{   // 19 ธันวาคม 2556 เวลา 10:10:43
  global $dayTH, $monthTH;
  $thai_date_return = date("j", $time);
  $thai_date_return .= " " . $monthTH[date("n", $time)];
  $thai_date_return .= " " . (date("Y", $time) + 543);
  $thai_date_return .= " เวลา " . date("H:i", $time);
  return $thai_date_return;
}
function thai_date_fullmonth($time)
{   // 19 ธันวาคม 2556
  global $dayTH, $monthTH;
  $thai_date_return = date("j", $time);
  $thai_date_return .= " " . $monthTH[date("n", $time)];
  $thai_date_return .= " " . (date("Y", $time) + 543);
  return $thai_date_return;
}

$id = $_GET['id'];


// Require composer autoload
require_once __DIR__ . '../../../vendor/autoload.php';
include('../../php/connect.php');
include_once('../authen.php');
// include('authen.php');


$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];
// $stylesheet = file_get_contents('../../assets/css/pdf.css'); // external css

$mpdf = new \Mpdf\Mpdf([
  'mode' => 'utf-8',
  'format' => 'A4',
  'orientation' => 'P',
  'margin_left' => 15,
  'margin_right' => 15,
  'margin_top' => 16,
  'margin_bottom' => 16,
  'margin_header' => 9,
  'margin_footer' => 9,
  'mirrorMargins' => true,

  'fontDir' => array_merge($fontDirs, [
    __DIR__ . '/tmp',
  ]),
  'fontdata' => $fontData + [
    'sarabun' => [
      'R' => 'THSarabunNew.ttf',
      'I' => 'THSarabunNewItalic.ttf',
      'B' =>  'THSarabunNewBold.ttf',
      'BI' => "THSarabunNewBoldItalic.ttf",
    ]
  ],
  'default_font' => 'sarabun',
  'default_font_size' => 16,
  'defaultPageNumStyle' => 1
]);


ob_start(); // Start get HTML code
?>

<!DOCTYPE html>
<html>

<head>
  <title>แบบฟอร์ม 3 ใบขอนุญาตใช้รถส่วนกลาง</title>
  <!-- Fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
  <link href="../../assets/css/pdf.css" rel="stylesheet">
  <!-- Bootstrap 5 -->
  <link rel="stylesheet" href="../../plugins/bootstrap5/dist/css/bootstrap.min.css">

  <style>
    body {
      font-family: sarabun;
      /* font-size: 18px; */
    }

    table {
      border-collapse: collapse;
      width: 100%;
    }

    p {
      font-weight: bold !important;
      /* font-size: 	24px !important; */
    }

    b {
      font-weight: bold !important;
      /* font-size: 	21px !important; */
    }

  </style>


</head>

<body>

  <?php

  $sql = "SELECT * FROM `booking` WHERE `id` = '" . $id . "'";

  $result = $conn->query($sql);
  $row = $result->fetch_assoc();



  ?>

  <div class="container">

    <p align="right">แบบ 3</p>
    <p align="center"><b>ใบขอนุญาตใช้รถส่วนกลาง</b></p>


    <div>

      <table cellpadding=5 cellspacing=0>
        <tr>
          <td align="right" width="50%"> <span></span></td>
          <td align="right" width="50%"><b>วันที่</b><span> <?php echo thai_date_fullmonth(time()) ?></span> </td>
        </tr>
      </table>
    </div>

    <div>
      <table cellpadding=5 cellspacing=0>
        <tr>
          <td align="left"><b>เรียน</b> <span> ผู้อำนวยการสำนักงานสถิติแห่งชาติ </span> </td>
        </tr>
      </table>
    </div>

    <div>
      <table cellpadding=5 cellspacing=0>
        <tr>
          <td align="center" width="50%"><b>ข้าพเจ้า</b> <span> <?php echo $_SESSION['prefix'] . ' ' . $_SESSION['first_name'] . ' ' . $_SESSION['last_name']; ?></span> </td>
          <td align="left" width="50%"><b>ตำแหน่ง</b> <span> นักวิชาการคอมพิวเตอร์ปฏิบัติการ </span> </td>
        </tr>
      </table>
    </div>

    <div>
      <table cellpadding=5 cellspacing=0>
        <tr>
          <td align="left" width="50%"><b>สังกัด</b><span> <?php echo $row['department'] ?> </span> </td>
          <td align="left" width="50%"><b>โทรศัพท์ (ภายใน)</b><span> <?php echo $row['phonenum'] ?></span> </td>
        </tr>
      </table>
    </div>

    <div>
      <table cellpadding=5 cellspacing=0>
        <tr>
          <td align="left" width="50%"><b>ขออนุญาตใช้รถ(สถานที่)</b><span> <?php echo $row['place'] ?></span> </td>
          <td align="left" width="50%"><b>จังหวัด</b><span> <?php echo $row['province'] ?></span> </td>
        </tr>
      </table>
    </div>

    <div>
      <table cellpadding=5 cellspacing=0>
        <tr>
          <td align="left"><b>เพื่อ</b><span> <?php echo strip_tags($row['purpose']) ?></span> </td>
        </tr>
      </table>
    </div>

    <div>
      <table cellpadding=5 cellspacing=0>
        <tr>
          <td align="left" width="50%"><b>ในวันที่</b><span> <?php $datestart = $row['date_start'];
                                                              echo thai_date_and_time(strtotime($datestart)) . " " . 'น.'; ?></span> </td>
          <td align="left" width="50%"><b>ถึงวันที่</b><span> <?php $dateend = $row['date_end'];
                                                              echo thai_date_and_time(strtotime($dateend)) . " " . 'น.'; ?> </td>
        </tr>
      </table>
    </div>

    <?php
    $sql_pass = "SELECT * FROM passenger WHERE b_id = '" . $row['id'] . "' ";
    $result_pass = $conn->query($sql_pass);
    $row_countpassenger = mysqli_num_rows($result_pass);
    ?>



    <div>
      <table cellpadding=5 cellspacing=0>
        <tr>
          <td align="left"><b>จำนวนผู้เดินทาง</b><span> <?php echo $row_countpassenger ?></span> คน ประกอบด้วย</td>
        </tr>
      </table>
    </div>

    <div>
      <table cellpadding=5 cellspacing=0>
        <tr>
          <td align="left"><span>

              <?php
              $num_pass = 0;
              while ($row_pass = $result_pass->fetch_assoc()) {
                $num_pass++;
              ?>
                <ul class="mb-1" width="40%">
                  <li><?php echo $row_pass['name']; ?></li>
                </ul>
              <?php } ?>
            </span>
          </td>
        </tr>
      </table>
    </div>
  </div>

  <!-- <hr> -->
  <br><br><br><br><br>


  <style>

    .test1{
      text-align: center;
    }
    .textwhite{
      color: #fff;
    }
  </style>

  <div class="container">

    <div class="test1 px-3">
      <span>..........................................................</span>
      <span>ผู้ขออนุญาตใช้รถ</span>
    </div>
    <div class="px-3" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ..........................................................ผอ.ศูนย์/กอง/กลุ่ม/เห็นชอบให้ขอใช้รถ</div>



    

    <!-- <div align="center"> ..........................................................ผู้ขออนุญาตใช้รถ</>
    <div class="px-3" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(..........................................................)</div> -->

    <div class="px-3" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ..........................................................ผอ.ศูนย์/กอง/กลุ่ม/เห็นชอบให้ขอใช้รถ</div>
    <div class="px-3" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(..........................................................)</div>

    <div class="px-3" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ..........................................................ตำแหน่ง</div>
    <div align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;..........................................................วัน/เดือน/ปี</div>
    <br>
  </div>
  <?php


  $sql1 = "SELECT * FROM addcars WHERE booking_id = '" . $row['id'] . "' ";
  $result1 = $conn->query($sql1);
  $row1 = $result->fetch_assoc();

  print_r($row1);


  ?>

  <div align="left">กลุ่มช่วยอำนวยการได้จ่ายรถหมายเลขทะเบียน.........................................ฮล-127....................พนักงานขับรถชื่อ..................นำโชค ชุ่มพึ่ง....................................................</div>


  <!-- Bootstrap 5 -->
  <script src="../../plugins/bootstrap5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>



<?php

$html = ob_get_contents();
$mpdf->WriteHTML($html);
$mpdf->Output("MyPDF.pdf");
ob_end_flush()
?>

<div class="text-center mt-3">
  <a href="MyPDF.pdf" class="btn btn-success"> <i class="fas fa-print"></i> พิมพ์แบบฟอร์ม</a>
</div>