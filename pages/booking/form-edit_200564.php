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
// echo "<pre>";
// print_r($row);
// echo "</pre>";

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
          <h5 class="m-0 text-dark">แก้ไขข้อมูลบันทึกการจองยานพาหนะ</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../dashboard">หน้าหลัก</a></li>
              <li class="breadcrumb-item"><a href="../articles">จองยานพาหนะ</a></li>
              <li class="breadcrumb-item active">แก้ไขข้อมูลบันทึกการจองยานพาหนะ</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content px-3">

        <div class="col-md-12">
        
        <div class="card">
        <div class="card-header">
              
              <h3 class="card-title float-end">
                <i class="fas fa-edit"></i>
                แก้ไขข้อมูลบันทึกการจองยานพาหนะ
              </h3>
              <a href="index.php" class="btn btn-sm float-start btn-backward"><i class="fas fa-angle-double-left"></i> 
                      ย้อนกลับ
                      </a>

      <div class="card-tools">
        </div>

            </div>


<!-- start card body -->
        <div class="card-body">
  
<!-- form start -->
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
              <label for="sub_department">หน่วยงาน <span style="color:red">*</span> </label>
                    <select class="custom-select" id="sub_department" name="sub_department" required>
                        <option disabled selected>กรุณาเลือก...</option>
                        <option value="1">หน่วยงาน A</option>
                        <option value="2">หน่วยงาน B</option>
                        <option value="3">หน่วยงาน C</option>
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
                <label for="exampleInputFile">เอกสารแนบ <span style="font-size:15px;">(* test กรณีมีหนังสือเชิญประชุมอยากแนบ)</span></label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">เลือกไฟล์...</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
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

    <!-- DateTime-Picker-->

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
                    <label  abel for="">ผู้ร่วมเดินทาง</label>
                      <table class="table table-striped" id="dynamic_field">
                        <thead>
                          <tr class="text-center table-light">
                            <th width="45%">ชื่อ-นามสกุล</th>
                            <th width="45%">หน่วยงาน</th>
                            <th width="45%"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                                <select class="form-select  select2" name="p_name[]"  style="width: 100%;">
                                    <option  value="">กรุณาเลือก...</option>
                                    <?php foreach ($result_pass as $rs) {?>
                                        <option  value="<?php echo $rs['p_name']; ?>">                    
                                        <?php echo $rs['p_name']; ?>
                                        </option>
                                        <?php }?>
                                </select>
                            </td>
                            <td>
                              <select class="form-select  select2" name="test[]"  style="width: 100%;">
                                      <option  value="">กรุณาเลือก...</option>
                                      <?php foreach ($result_pass as $rs) {?>
                                          <option  value="<?php echo $rs['p_name']; ?>">                    
                                          <?php echo $rs['p_name']; ?>
                                          </option>
                                          <?php }?>
                                  </select>
                            </td>
                            <td align="center">
                              <button type="button" name="add" id="add" class="btn btn-sm btn-success" style="width: 100%;"> เพิ่ม
                              </button>
                            </td>
                          </tr>
                          </tbody>
                      </table>
                  </div>    <!-- /table-responsive -->
              </div>
            </div>    <!-- /form-row -->




<form action="cancel.php" method="post" name="form1">
<!-- Cancel-Booking Card -->

            <div class="card border-light mt-3">
                <div class="card-header bg-dark">สถานะรายการจองฯ | การยกเลิกรายการจองยานพาหนะ</div>
                    <div class="card-body text-secondary">
                        <div class="row">
                            <div class="col-md-12">
                                  <div class="table-responsive">

                                        <table class="table table-sm table-bordered text-center">
                                            <thead class="table-light">
                                                <tr>
                                                    <td width="50%">สถานะรายการจองยานพาหนะ</td>
                                                    <td width="50%">การยกเลิก</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td rowspan="2">
                                                        <p class="fw-bold">สถานะ :</p>
                                                            <?php if ($row['status'] == 'true') { ?>
                                                              <a data-toggle="modal" data-target="#modalstatus<?php echo $num_user ?>" href="">
                                                                  <p style="font-size:1.1rem;"><span class="badge rounded-pill bg-info text-dark"><i class="fa fa-spinner"></i> <?php echo 'กำลังดำเนินการ' ?></span></p>
                                                              </a>
                                                            <?php } elseif ($row['status'] == 'false') { ?>
                                                              <a data-toggle="modal" data-target="#modalstatus<?php echo $num_user ?>" href="">
                                                                  <p style="font-size:1.1rem;"><span class="badge rounded-pill bg-danger"><i class="fa fa-times-circle"></i> <?php echo 'ไม่อนุมัติ' ?></span></p>
                                                              </a>
                                                            <?php } elseif ($row['status'] == 'success') { ?>
                                                              <a data-toggle="modal" data-target="#modalstatus<?php echo $num_user ?>" href="">
                                                                  <p style="font-size:1.1rem;"><span class="badge rounded-pill bg-success"><i class="fa fa-hourglass-start"></i> <?php echo 'อนุมัติแล้ว' ?></span></p>
                                                              </a>
                                                            <?php } else { ?>
                                                              <a a data-toggle="modal" data-target="#modalstatus<?php echo $num_user ?>" href="">
                                                                  <p style="font-size:1.1rem;"><span class="badge rounded-pill bg-warning"><i class="fa fa-hourglass-start"></i> <?php echo 'รออนุมัติ' ?></span></p>
                                                              </a>
                                                            <?php } ?>      
                                                    </td>
                                                    <td>

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

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-grid gap-2">
                                                            <button class="btn btn-warning" type="submit" name="ok">
                                                            <i class="fas fa-save"></i>
                                                            บันทึกข้อมูลสถานะ</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                  </div>
                            </div>
                        </div>
                    </div>
            </div> 



    </div>    <!-- /card body -->
    </div>    <!-- /card -->
    </div>    <!-- /col-md-12 -->


<!-- เรียก id ซ่อนไว้ -->
<input type="hidden" name="id" value="<?php echo $id; ?>">
</form>
          <div class="card-footer text-center">
              <button type="submit"  name="submit" class="btn btn-block btn-primary">บันทึกการแก้ไข</button>
          </div>

        </form>

      </div>   <!-- /.content-wrapper -->  
    </section>
    <!-- /.content -->  
  </div>    <!-- /.wrapper -->



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


// for ($i=1; $i < $j; $i++) { 
//   $name = test[$i];
//   $position = num_passenger[$i];
// }

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

          $('#dynamic_field').append('<tr id="row'+i+'"><td><select class="form-select select2" name="p_name[]" style="width: 100%;"><option  value="">--Select--</option><?php foreach ($result_pass as $rs) {?><option  value="<?php echo $rs['p_name']; ?>"><?php echo $rs['p_name']; ?></option><?php }?></select></td><td><select class="form-select select2" name="test[]" style="width: 100%;"><option  value="">--Select--</option><?php foreach ($result_dep as $rs) {?><option  value="<?php echo $rs['d_name']; ?>"><?php echo $rs['d_name']; ?></option><?php }?></select></td><td align="center"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>')

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



<!-- <script>
  $(function(){
    var row = 1;
    $('button').on('click', function(e){
      var html = '';
      html =  '<tr id="row_'+ row +'">' +
              '<td><select class="form-control select2" name="p_name[]"  style="width: 100%;"><option  value="">--Select--</option></select></td>'+
              '<td><select class="form-control select2" name="dept[]"  style="width: 100%;"><option  value="">--Select--</option></select></td>'+
              '<td><button type="button" class="btnRemove" data-id="'+ row +'" style="width: 100%;"> ลบ</button></td>'+
              '</tr>';

              
        $('#table').append(html);
        row++;
    });

    $(document).off('click.remove').on('click.remove', 'btnRemove', function(e){
        $('#row_'+ $(this).data('id')+'').remove();
    });
  });
</script> -->


</body>
</html>