<?php include_once('../authen.php');

    $id = $_GET['id'];
    // เช็คการส่งค่า id มา
    if ( !isset($_GET['id']) ) {
    header('Location:index.php');
    }


    $sql = "SELECT * FROM `booking` WHERE `id` = '".$id."'";
    // echo $id = $_GET['id'];
    $result = $conn ->query($sql);
    // เช็คถ้าไม่มีข้อมูลให้กลับไปหน้า index
    if (!$result->num_rows){
    header('Location:index.php');
    }

    $row = $result->fetch_assoc();


// ดึงข้อมูลมาแสดงบน Select
    $sql_pass = "SELECT * FROM passengers_list";
    $result_pass = $conn->query($sql_pass);
    $pass_row = $result_pass->fetch_assoc();


    $sql_dept = "SELECT * FROM departments_list";
    $result_dept = $conn->query($sql_dept);
    $rowdept = $result_pass->fetch_assoc();


    $sql_province = "SELECT * FROM province ORDER BY province_name ASC";
    $result_province = $conn->query($sql_province);
    $rowprovince = $result_province->fetch_assoc();

?>

<?php

        $sql_passen = "SELECT * FROM passenger WHERE b_id = '".$id."'";
        $resultpassen = $conn->query($sql_passen);
        $cnt = mysqli_num_rows($resultpassen);      //2


        while($rowcheck = $resultpassen->fetch_assoc()){
            $num_passen[] = $rowcheck['name'];
}


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>ระบบจองยานพาหนะ</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Fontawesome 5 -->
<link rel="stylesheet" href="../../plugins/fontawesome5/css/fontawesome.min.css">
<link rel="stylesheet" href="../../plugins/fontawesome5/css/all.min.css">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" /> -->
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- <link rel="stylesheet" href="../../assets/css/colors_bt5.css"> -->
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="../../plugins/bootstrap5/dist/css/bootstrap.min.css">
    <!-- SweetAlert 2 -->
<link rel="stylesheet" href="../../plugins/sweetalert2/dist/sweetalert2.min.css">
<script src="../../plugins/sweetalert2/dist/sweetalert2.min.js"></script>
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
<!-- SweetAlert 2 -->
    <link rel="stylesheet" href="../../plugins/sweetalert2/dist/sweetalert2.min.css">

    <!-- fullCalendar -->
    <!-- <link rel="stylesheet" href="../../plugins/fullcalendar5/lib/main.css"> -->

    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables_new/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../../plugins/datatables_new/select.bootstrap5.min.css">

      <!-- bootstrap-toggle -->
  <link rel="stylesheet" href="../../plugins/ToggleSwitches/css/bootstrap-toggle.min.css">



<link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap.css">
<!-- Select2 -->
<link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">  
<link rel="stylesheet" href="../../plugins/select2/css/select2-bootstrap-5-theme.min.css"> 
  
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar & Main Sidebar Container -->
  <?php include_once('../includes/sidebar.php') ?>

  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
            <h5 class="m-0 text-dark">การจัดการข้อมูลการจองยานพาหนะ</h5>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../dashboard">หน้าหลัก</a></li>
                <li class="breadcrumb-item"><a href="../articles">จองยานพาหนะ</a></li>
                <li class="breadcrumb-item active">การจัดการข้อมูลการจองยานพาหนะ</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </div>

        <!-- Main content -->
        <section class="content px-3">
            <div class="col-md-12">
                <div class="card card shadow">
                    <div class="card-header">
                        <span class="float-start fs-5 float-end" style="line-height: 3.0rem"> <i class="fas fa-edit"></i>&nbsp;&nbsp;แก้ไขข้อมูล | ยกเลิกการจองยานพาหนะ</span>
                            <a href="index.php" class="btn btn-sm float-start btn-backward mt-2">
                                <i class="fas fa-arrow-circle-left"></i> 
                                    ย้อนกลับ
                            </a>
                    </div>
                <!-- start card body -->
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">แก้ไขข้อมูลการจองยานพาหนะ</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">ยกเลิกการจองยานพาหนะ</button>
                                </li>
                            </ul>

                <!-- Start Tab -->
                            <div class="tab-content" id="myTabContent">

                <!-- Tab การแก้ไขข้อมูลการจองฯ -->
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">               
                                    A Tab

                                    <div class="card card shadow mt-4">
                                        <div class="card-body">
                                            <!-- Form_start  -->
                                            <form  action="update.php" method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="input-group mb-2">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                <i class="far fa-clock"></i>&nbsp;&nbsp;วันที่ทำรายการ</div>
                                                            </div>
                                                                <input style="background-color: #fff" type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username" 
                                                                    value="<?php echo thai_date_fullmonth(time()) ?>" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="department">หน่วยงาน <span style="color:red">*</span> </label>
                                                                <select class="form-select dept" id="department" name="department">
                                                                    <option value="">กรุณาเลือก...</option>

                                                                        <?php foreach ($result_dept as $rowdept)  { ?>

                                                                            <?php  if ($rowdept['d_name'] == $row['department']) { ?>
                                                                                <option value="<?php echo $rowdept['d_name'] ?>" selected>
                                                                                    <?php echo $rowdept['d_name'] ?>
                                                                                </option>
                                                                            <?php } ?>

                                                                    <option value="<?php echo $rowdept['d_name'] ?>">
                                                                        <?php echo $rowdept['d_name'] ?>
                                                                    </option>
                                                                        <?php } ?>
                                                                </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="phonenum">หมายเลขโทรศัพท์ภายใน <span style="color:red">*</span></label>
                                                            <input type="text" name="phonenum" class="form-control" id="phonenum" placeholder="" value="<?php echo $row['phonenum'] ?>">
                                                        </div>
                                                    </div>   
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="place">ขออนุญาตใช้รถ (สถานที่) <span style="color:red">*</span></label>
                                                            <input type="text" name="place" class="form-control" id="place" placeholder="สถานที่" value="<?php echo $row['place'] ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="province">จังหวัด <span style="color:red">*</span> </label>
                                                                    <select class="form-select province" id="province" name="province">
                                                                        <option value="">กรุณาเลือก...</option>
                                                                            <?php foreach ($result_province as $rowprovince)  { ?>

                                                                                <?php if ($rowprovince['province_name'] == $row['province']) { ?> 
                                                                                    <option value="<?php echo $rowprovince['province_name'] ?>" selected> 
                                                                                        <?php echo $rowprovince['province_name'] ?>
                                                                                    </option>
                                                                                <?php } ?>    
                                                                        <option value="<?php echo $rowprovince['province_name'] ?>"> 
                                                                            <?php echo $rowprovince['province_name'] ?>
                                                                        </option>
                                                                            <?php } ?>
                                                                    </select>
                                                            </div> 
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>วัตถุประสงค์การเดินทาง <span style="color:red">*</span></label>
                                                            <textarea class="d-none" name="purpose" id="purpose" rows="5" cols="80">
                                                                <?php echo $row['purpose'] ?>
                                                            </textarea>
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                        <label class="h6">ระหว่างวันที่ <span style="color:red">*</span></label>
                                                            <div class="input-group date" id="datetimestart" data-target-input="nearest">
                                                                <div class="input-group-prepend" data-target="#datetimestart" data-toggle="datetimepicker">
                                                                <span class="input-group-text"><span class="far fa-calendar-alt"></span></span>
                                                                </div>
                                                                <input type="text" name="date_start" class="form-control datetimepicker-input" data-target="#datetimestart" placeholder="เลือกวันที่เริ่มต้น" value="<?php echo $row['date_start'] ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                        <label class="h6">ถึง <span style="color:red">*</span></label>
                                                            <div class="input-group date" id="datetimeend" data-target-input="nearest">
                                                                <div class="input-group-prepend" data-target="#datetimeend" data-toggle="datetimepicker">
                                                                <span class="input-group-text"><span class="far fa-calendar-alt"></span></span>
                                                                </div>
                                                                <input type="text" name="date_end" class="form-control datetimepicker-input" data-target="#datetimeend" placeholder="เลือกวันที่สิ้นสุด" value="<?php echo $row['date_end'] ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>







                                                

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <label for="">ผู้ร่วมเดินทาง</label>
                                                            <table class="table table-striped" id="dynamic_field">
                                                                <thead>
                                                                <tr class="text-center table-light">
                            <th width="15%">ลำดับ</th>
                            <th width="70%">ชื่อ-นามสกุล</th>
                            <th width="15%"></th>
                          </tr>
                                                                </thead>
                                                                <tbody>

                                                                <?php for($i = 1; $i <= $cnt; $i++) { 
                                                                    
                                                                        echo $i;
                                                                        $j = $i-1;   
                                                            
                                                                ?>

                                                                <tr>

                                                                <td>

                              <select class="form-select" name="sequence[]" aria-label="Default select example">
                                <option value="">-- กรุณาเลือก --</option>
                                <?php foreach ($resultpassen as $rs) { ?>

                                    <?php   if ($cnt >= $i){
                                                if ($rs['sequence'] == $num_passen[$j]) { ?>

                                                    <option  value="<?php echo $rs['sequence']; ?>" selected>     
                                                        <?php echo $rs['sequence']; ?>
                                                    </option>
                                                <?php } else { ?>
                                                    <option  value="<?php echo $rs['sequence']; ?>">     
                                                        <?php echo $rs['sequence']; ?>                                                                               
                                                    </option>
                                                <?php }?>
                                    <?php } else { ?>

                                            <option  value="<?php echo $rs['sequence']; ?>">     
                                                <?php echo $rs['sequence']; ?>                                                                               
                                            </option>
                                            <?php } ?>
                                <?php } ?>
                              </select>
                            </td>

                                                <td>                                                                        
                                                    <select class="form-select select2" name="p_name[]"  style="width: 100%;">
                                                        <option  value="">กรุณาเลือก...</option>
                                                        <?php foreach ($result_pass as $rs) {?>
                                                            <?php   if ($cnt >= $i){
                                                                        if ($rs['p_name'] == $num_passen[$j]) { ?>

                                                                            <option  value="<?php echo $rs['p_name']; ?>" selected>     
                                                                                <?php echo $rs['p_name']; ?>
                                                                            </option>
                                                                        <?php } else { ?>
                                                                            <option  value="<?php echo $rs['p_name']; ?>">     
                                                                                <?php echo $rs['p_name']; ?>                                                                               
                                                                            </option>
                                                                        <?php }?>
                                                            <?php } else { ?>

                                                                <option  value="<?php echo $rs['p_name']; ?>">     
                                                                    <?php echo $rs['p_name']; ?>                                                                               
                                                                </option>
                                                            <?php }?>
                                                        <?php }?>
                                                    </select>
                                                </td>

                                                                    <td align="center">
                                                                        <button type="button" name="add" id="add" class="btn btn-sm btn-success" style="width: 100%;"> 
                                                                            เพิ่ม
                                                                        </button>
                                                                    </td>
                                                                </tr>

                                                                <?php } ?>

                                                                </tbody>
                                                            </table>
                                                        </div>    <!-- /table-responsive -->
                                                    </div>
                                                </div>    <!-- /form-row -->

                                                <!-- เรียก id ซ่อนไว้ -->
                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            

                                        </div> <!-- /card-body -->
                                        <div class="card-footer text-muted">
                                            <div class="d-grid gap-2 col-6 mx-auto">
                                                <button class="btn btn-primary" type="submit" name="submit">
                                                <i class="fas fa-save"></i>
                                                บันทึกข้อมูลการแก้ไข</button>
                                            </div>
                                        </div>
                                    </div>

                                </div> <!-- tab-pane fade show active home -->

                                </form>



<!-- ทดสอบดึงรายชื่อ -->
<?php 
        if (isset($_POST['delete'])){
            if (count($_POST['ids']) > 0){
                $all = implode("," , $_POST['ids']);
                $sql_delete = mysqli_query($conn, "DELETE FROM passenger WHERE sequence in ($all) ");
                if ($sql_delete){
                    echo "<script>alert('ลบข้อมูลเรียบร้อย')</script>";
                } else {
                    echo "<script>alert('ลบข้อมูลไม่สำเร็จ')</script>";
                }
            } else {
                echo "<script>alert('กรุณาเลือกข้อมูลที่ต้องการลบ')</script>";
            }
        }
?>

<form method="post">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <td colspan="4">
                                                                        <input type="submit" name="delete" value="delete" class="btn btn-danger" onClick="return confirm('Are you sure yo want to delete');">
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>
                                                                        <input type="checkbox" class="form-check-input" id="select_all">
                                                                        <label class="form-check-label">Select All</label>
                                                                    </td>
                                                                    <td>ลำดับ id</td>
                                                                    <td>รายการ (sequence)</td>
                                                                    <td>ชื่อ-นามสกุล</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            <?php

                                                                $sql_person = "SELECT * FROM passenger WHERE b_id = '".$id."' ";
                                                                $result_person = $conn->query($sql_person);
                                                                $cnt_per = mysqli_num_rows($result_person); 


                                                                    $num_per = 0;
                                                                while ($row_per = $result_person->fetch_assoc()) {
                                                                    $num_per++;
                                                    ?>

                                                                <tr>
                                                                    <td><input type="checkbox" class="checkbox" name="ids[]"
                                                                    value="<?php echo $row_per['sequence'] ?>"></td>
                                                                    <td><?php echo $num_per ?></td>
                                                                    <td><?php echo $row_per['sequence'] ?></td>
                                                                    <td><?php echo $row_per['name'] ?></td>
                                                                </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                        
                                                    </div>
                                                </div>
                                                </form>






                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">               


B Tab

<form action="cancel.php" method="post">
                                    <div class="card mt-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                        <div class="table-responsive">

                                                            <table class="table table-sm table-bordered text-center">
                                                                <thead class="table-light">
                                                                    <tr>
                                                                        <td width="50%">ความคืบหน้า</td>
                                                                        <td width="50%">สถานะรายการจอง</td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>

                                                                                <div class="container">
                                                                                    <div class="row mt-1">
                                                                                        <div class="col">
                                                                                            บันทึกรายการจองแล้ว
                                                                                        </div>
                                                                                        <div class="col">
                                                                                            กำลังดำเนินการ
                                                                                        </div>
                                                                                        <div class="col">
                                                                                            อนุมัติแล้ว
                                                                                        </div>
                                                                                    </div>

                                                                                <?php if ($row['status'] == 'wait') { ?>
                                                                                    <div class="progress mt-1">
                                                                                        <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: 15%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                    </div>
                                                                                <?php } elseif ($row['status'] == 'true') { ?>
                                                                                    <div class="progress mt-1">
                                                                                        <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: 55%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                    </div>
                                                                                <?php } elseif ($row['status'] == 'success') { ?>
                                                                                    <div class="progress mt-1">
                                                                                        <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                    </div>
                                                                                <?php } ?>
                                                                                </div>
                                                                        </td>
                                                                        <td>
                                                                        <?php if ($row['status'] == 'wait') { ?>
                                                                            <p>
                                                                                <div class="form-group">
                                                                                        <div class="form-check form-check-inline">
                                                                                            <input class="form-check-input" type="radio" name="status_use" value="used" <?php if ($row['status_use'] == 'used') echo "checked"; ?> >
                                                                                            <label class="form-check-label" for="inlineRadio1">ใช้งาน</label>
                                                                                        </div>
                                                                                        <div class="form-check form-check-inline">
                                                                                            <input class="form-check-input" type="radio" name="status_use" value="cancel" <?php if ($row['status_use'] == 'cancel') echo "checked"; ?> >
                                                                                            <label class="form-check-label" for="inlineRadio1">ยกเลิก</label>
                                                                                        </div>
                                                                                </div>
                                                                            </p>

                                                                        <?php } else { ?>
                                                                            <p>
                                                                                <div class="form-group">
                                                                                        <div class="form-check form-check-inline">
                                                                                            <input class="form-check-input" type="radio" name="status_use" value="used" <?php if ($row['status_use'] == 'used') echo "checked"; ?> disabled >
                                                                                            <label class="form-check-label" for="inlineRadio1">ใช้งาน</label>
                                                                                        </div>
                                                                                        <div class="form-check form-check-inline">
                                                                                            <input class="form-check-input" type="radio" name="status_use" value="cancel" <?php if ($row['status_use'] == 'cancel') echo "checked"; ?> disabled >
                                                                                            <label class="form-check-label" for="inlineRadio1">ยกเลิก</label>
                                                                                        </div>
                                                                                </div>
                                                                            </p>
                                                                        <?php } ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>                                                                     
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <div class="d-grid gap-2">
                                                                                <button class="btn btn-primary" type="submit" name="ok">
                                                                                <i class="fas fa-save"></i>
                                                                                บันทึกข้อมูลการยกเลิก</button>
                                                                            </div>
                                                        </div>
                                                        <!-- เรียก id ซ่อนไว้ -->
                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                        </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 


                                </div> <!-- tab-pane fade show active home -->

                            </div>  <!-- /tab-content -->



                    </div>   <!-- /.card body -->  
                </div>    <!-- /.card -->
            </div>  <!-- /.col-md-12 -->  
        </section> <!-- /Section-content -->
    </div>  <!--/.content-wrapper -->
          <!-- footer -->
  <?php include_once('../includes/footer.php') ?>
</div>  <!--/.wrapper -->
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 5 -->
<script src="../../plugins/bootstrap5/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="../../plugins/jQueryUI/jquery-ui.min.js"></script>
<!-- SweetAlert 2 -->
<script src="../../plugins/sweetalert2/dist/sweetalert2.min.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- Main js-files -->
<script src="../../assets/js/main.js"></script>
<!-- Datatable -->
<script src="../../plugins/datatables_new/jquery.dataTables.min.js"></script>
<!-- Datetime picker -->
<script type="text/javascript" src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap.js"></script>
<!-- fullCalendar 2.2.5 -->
<!-- <script src="../../plugins/moment/moment.min.js"></script> -->

<!-- <script src="../../plugins/fullcalendar5/lib/main.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script src="../../plugins/moment/locale/th.js"></script>
<!-- CKEditor -->
<script src="../../plugins/ckeditor/ckeditor.js"></script>

<!-- Select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>

<!-- bootstrap-toggle -->
<script src="../../plugins/ToggleSwitches/js/bootstrap-toggle.min.js"></script>

<script>
      $(".select2").select2({
        theme: "bootstrap-5",
        placeholder: "-- เลือกรายชื่อ --",
        allowClear: true,
        selectionCssClass: "select2--medium"
    });

      $(".select2 > option").removeAttr("selected");
      // $("#test").trigger("change");
  </script>
   
        <script type="text/javascript">
            $(function () {
                $('#datetimestart').datetimepicker({
                  
                    allowInputToggle: true,
                    showTodayButton: true,
                    toolbarPlacement: 'bottom',
                    sideBySide: true,
                    format: 'yyyy/MM/DD HH:mm',
                    stepping:30,
                    locale: 'th',
                    autclose: 'true',

                    icons: {
                    // time: "fas fa-clock",
                    date: "fas fa-calendar-alt",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down",
                    previous: "fas fa-chevron-circle-left",
                    next: "fas fa-chevron-circle-right",
                    today: "far fa-calendar-check",
                    
                }

                });
            });

            $(function () {
                $('#datetimeend').datetimepicker({

                    allowInputToggle: true,
                    showTodayButton: true,
                    toolbarPlacement: 'bottom',
                    sideBySide: true,
                    format: 'yyyy/MM/DD HH:mm',
                    stepping:30,
                    locale: 'th',
                    autclose: 'true',
                    icons: {
                    // time: "fas fa-clock",
                    date: "fas fa-calendar-alt",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down",
                    previous: "fas fa-chevron-circle-left",
                    next: "fas fa-chevron-circle-right",
                    today: "far fa-calendar-check",
                }
                });
            });

</script>

<script>
  $(function () {
    $('#dataTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });

    $('.custom-file-input').on('change', function(){
        var fileName = $(this).val().split('\\').pop()
        $(this).siblings('.custom-file-label').html(fileName)
        if (this.files[0]) {
            var reader = new FileReader()
            $('.figure').addClass('d-block')
            reader.onload = function (e) {
                $('#imgUpload').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0])
        }
    })

// ckeditor
CKEDITOR.replace( 'purpose' ,{
  language: 'th',
	filebrowserBrowseUrl : '../../plugins/responsive_filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
	filebrowserUploadUrl : '../../plugins/responsive_filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
	filebrowserImageBrowseUrl : '../../plugins/responsive_filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
});


    //Initialize Select2 Elements
    // $('.select2').select2()

  });

</script>

<!-- เพิ่ม-ลบ จำนวนผู้ร่วมเดินทาง -->
<script>
    $(document).ready(function() {
        let i = 1;
        $('#add').click(function() {
          i++;

          // $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="p_name[]" placeholder="name" class="form-control name_list"></td><td align="center"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>')

        //   $('#dynamic_field').append('<tr id="row'+i+'"><td><select class="form-select select2" name="p_name[]" style="width: 100%;"><option  value="">--Select--</option><?php foreach ($result_pass as $rs) {?><option  value="<?php echo $rs['p_name']; ?>"><?php echo $rs['p_name']; ?></option><?php }?></select></td><td align="center"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>')



          $('#dynamic_field').append('<tr id="row' + i + '"><td><select class="form-select" name="sequence[]" aria-label="Default select example"><option  value="" selected disabled>-- กรุณาเลือก --</option><?php for ($i = 1; $i <= 50; $i++) { ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select></td><td><select class="form-select select2" name="p_name[]" style="width: 100%;"><option  value="">--Select--</option><?php foreach ($result_pass as $rs) { ?><option  value="<?php echo $rs['p_name']; ?>"><?php echo $rs['p_name']; ?></option><?php } ?></select></td><td align="center"><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>')




          // $('.select2').select2();
          $(".select2").select2({
        theme: "bootstrap-5",
        placeholder: "-- เลือกรายชื่อ --",
        allowClear: true,
        selectionCssClass: "select2--medium"
    });

      $(".select2 > option").removeAttr("selected");
      // $("#test").trigger("change");

        })
        $(document).on('click', '.btn_remove', function() {
          let button_id = $(this).attr('id');
          $('#row'+button_id+'').remove();
        })
    })
</script>

<script>
      $(".dept").select2({
        theme: "bootstrap-5",
        placeholder: "-- กรุณาเลือกหน่วยงาน --",
        allowClear: true,
        selectionCssClass: "select2--medium"
    });

    $(".province").select2({
        theme: "bootstrap-5",
        placeholder: "-- กรุณาเลือกจังหวัด --",
        allowClear: true,
        selectionCssClass: "select2--medium"
    });
</script>

<script>
    $(document).ready(function (){
        $('#select_all').on('click', function () {
            if (this.checked) {
                $('.checkbox').each(function(){
                    this.checked = true;
                })
            } else {
                $('.checkbox').each(function(){
                    this.checked = false;
                })
            }
        })
        $('.checkbox').on('click', function(){
            if ($('.checkbox:checked').length == $('.checkbox').length){
                $('#select_all').prop('checked', true);
            } else {
                $('#select_all').prop('checked', false);
            }
        })
    });
</script>


</body>
</html>