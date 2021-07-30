<?php
	require_once __DIR__ . '../../../vendor1/autoload.php';
	 include('../../php/connect.php');
     include_once('../authen.php');

        $id = $_GET['id'];
        echo $id;

$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];	
$mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8', 
            'format' => 'A4',
            'margin_left' => 15,
            'margin_right' => 15,
            'margin_top' => 16,
            'margin_bottom' => 16,
            'margin_header' => 9,
            'margin_footer' => 9,
            'mirrorMargins' => true,

            'fontDir' => array_merge($fontDirs, [
                __DIR__ . 'vendor/mpdf/mpdf/custom/font/directory',
            ]),
            'fontdata' => $fontData + [
                'thsarabun' => [
                    'R' => 'THSarabunNew.ttf',
                    'I' => 'THSarabunNew Italic.ttf',
                    'B' => 'THSarabunNew Bold.ttf',
                    'U' => 'THSarabunNew BoldItalic.ttf'
                ]
            ],
            'default_font' => 'thsarabun',
            'defaultPageNumStyle' => 1
        ]);

$mpdf->setFooter('{PAGENO}');//ตัวรันหน้า
//http://fordev22.com/
            

	$tableh1 = '
	

	<h2 style="text-align:center">ใบอนุญาติขอใช้รถส่วนกลาง </h2>

	<table id="bg-table" width="100%" style="border-collapse: collapse;font-size:12pt;margin-top:8px;" class="table borderless">
	    <tr style="border:0px solid #000;padding:4px;">
	        <td  style="border-right:0px solid #000;padding:4px;text-align:center;"   width="10%">ชื่อ-นามสกุล</td>
	        <td  width="15%" style="border-right:0px solid #000;padding:4px;text-align:center;">&nbsp; สังกัด </td>
	        <td  style="border-right:0px solid #000;padding:4px;text-align:center;"  width="15%">โทรศัพท์ภายใน </td>
	        <td  style="border-right:0px solid #000;padding:4px;text-align:center;" width="15%">ขออนุญาตใช้รถ (สถานที่)</td>
            <td  style="border-right:0px solid #000;padding:4px;text-align:center;" width="15%">เพื่อ</td>
            <td  style="border-right:0px solid #000;padding:4px;text-align:center;" width="15%">วันที่เริ่มต้น</td>
            <td  style="border-right:0px solid #000;padding:4px;text-align:center;" width="15%">วันที่สิ้นสุด</td>
	    </tr>

	</thead>
        <tbody>';
        
		//คำสั่งให้เลือกข้อมูลจาก TABLE ชื่อ tbl_member โดยเรียงจาก member_id และให้เรียงลำดับจากมากไปน้อยคือ DESC และ เปิดดู error เวลามีปัญหา
$sql =    "SELECT * FROM `booking` WHERE `id` = '".$id."'";
 	
	$result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
	
	$content = "";
	// if (mysqli_num_rows($result) > 1) {
		// $i = 1;

			$tablebody .= '<tr style="border:0px solid #000;" class="table borderless">
				<td style="border-right:0px solid #000;padding:3px;text-align:center;"  >'.$_SESSION['prefix']. ' ' .$_SESSION['first_name']. ' ' .$_SESSION['last_name'].'</td>
				<td style="border-right:0px solid #000;padding:3px;">'.test.'</td>
				<td style="border-right:0px solid #000;padding:3px;">'.$row['phonenum'].'</td>
				<td style="border-right:0px solid #000;padding:3px;">'.$row['place'].'</td>
                อ<td style="border-right:0px solid #000;padding:3px;">'.$row['purpose'].'</td>
                อ<td style="border-right:0px solid #000;padding:3px;">'.$row['date_start'].'</td>
                อ<td style="border-right:0px solid #000;padding:3px;">'.$row['date_end'].'</td>
			</tr>';

            
	
//mysqli_close($conn);


$tableend1 = "</tbody>
</table>";
// print_r($result);
// $mpdf->Output();
// exit();

$sql_pass = "SELECT * FROM passenger WHERE b_id = '".$row['id']."' ";
$result_pass = $conn->query($sql_pass);

$passenger  = '<div class="d-flex w-100 justify-content-between"> <p class="mb-1 fs-6 fw-bold">ผู้ร่วมเดินทาง</p></div>'

            $num_pass = 0;
            while ($row_pass = $result_pass->fetch_assoc()) {
            $num_pass++;

'<ul class="mb-1">
<li> '.$row_pass['name'].'</li>
</ul>';



$body_1='
	<style>
		body{

			
			  font-family: "thsarabun"; 


			  /* http://fordev22.com */
       		/* https://www.facebook.com/fordev22/ */

			
		}
	</style>';
$fordev22 ='
<style>
     

div{
       
    }
table {
  
   
  border-collapse: collapse;
  width: 100%;
}

td, th {
    font-size: 18px;
  border: 1px solid #AED6F1;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #AED6F1;
}

</style>


';
	


	

 $mpdf->WriteHTML($fordev22);
  
 $mpdf->WriteHTML($tableh1);

 $mpdf->WriteHTML($tablebody);

$mpdf->WriteHTML($tableend1);

$mpdf->WriteHTML($passenger);

$mpdf->WriteHTML($body_1);
//$output = 'fordev22.com';
$mpdf->Output($output, 'I');
/* http://fordev22.com */
/* https://www.facebook.com/fordev22/ */
//https://monkeywebstudio.com/%E0%B8%AA%E0%B8%A3%E0%B9%89%E0%B8%B2%E0%B8%87%E0%B9%84%E0%B8%9F%E0%B8%A5%E0%B9%8C-pdf-%E0%B8%94%E0%B9%89%E0%B8%A7%E0%B8%A2-mpdf/
?>