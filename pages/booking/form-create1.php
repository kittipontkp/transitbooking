<?php include_once('../authen.php');

$sql = "SELECT * FROM booking
        WHERE user_id = '".$_SESSION['authen_id']."'
        ORDER BY id DESC LIMIT 0,1 ";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>ระบบจองยานพาหนะ</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Favicons -->
<link rel="apple-touch-icon" sizes="180x180" href="../../dist/img/favicons/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="../../dist/img/favicons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="../../dist/img/favicons/favicon-16x16.png">
<link rel="manifest" href="../../dist/img/favicons/site.webmanifest">
<link rel="mask-icon" href="../../dist/img/favicons/safari-pinned-tab.svg" color="#5bbad5">
<link rel="shortcut icon" href="../../dist/img/favicons/favicon.ico">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-config" content="../../dist/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#ffffff">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<!-- DateTime Picker ใช้ได้ -->
<link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.38.0/js/tempusdominus-bootstrap-4.min.js" crossorigin="anonymous"></script> -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.38.0/css/tempusdominus-bootstrap-4.min.css" crossorigin="anonymous" /> -->

<!-- Select2 -->
<link rel="stylesheet" href="../../plugins/select2/select2.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../../dist/css/adminlte.min.css">
<link rel="stylesheet" href="../../assets/css/style.css">

<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">

<!-- DataTables -->
<link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap4.min.css">
  
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
          <h5 class="m-0 text-dark">บันทึกข้อมูลการจองยานพาหนะ</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../dashboard">หน้าหลัก</a></li>
              <li class="breadcrumb-item"><a href="../articles">จองยานพาหนะ</a></li>
              <li class="breadcrumb-item active">บันทึกข้อมูลการจองยานพาหนะ</li>
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
              
              <h3 class="card-title float-right">
                <i class="fas fa-edit"></i>
                บันทึกข้อมูลแบบ-3
              </h3>
              <a href="index.php" class="btn btn-sm btn-light float-left"><i class="fas fa-angle-double-left"></i> 
                      ย้อนกลับ
                      </a>

      <div class="card-tools">
        </div>

            </div>

            <!-- <div class="card-header">
            <h5 class="card-title text-secondary float-right" style="line-height: 2.1rem">บันทึกข้อมูลแบบ-3</h5>
            <a href="index.php" class="btn btn-light float-left"><i class="fas fa-angle-double-left"></i> 
                            ย้อนกลับ
                            </a>
            <div class="card-tools">
              </div>
            </div> -->
            <!-- /.card-header -->
            
            
    <!-- form start -->
    <form role="form" action="create.php" method="post">

        <!-- start card body -->
        <div class="card-body">

        <?php echo '<pre>',print_r($row), '</pre>'; 
          // echo $row['phonenum'];
          echo $row['id'];
        
        ?>

        <!-- <p style="text-decoration:underline" class="float-right">ข้อมูลทัวไป </p> -->
            <div class="form-row">
              <div class="col-md-12">
                      <label class="sr-only" for="inlineFormInputGroup"></label>
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
        
      <div class="form-row">
          <div class="col-md-6">
              <div class="form-group">
                  <label>หน่วยงาน <span style="color:red">*</span> </label>
                    <select class="form-control" name="sub_department" required>
                      <option value="" disabled selected>กรุณาเลือก</option>
                        <option value="a">หน่วยงานเอ</option>
                        <option value="b">หน่วยงานบี</option>
                    </select>
              </div>
          </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="phonenum">หมายเลขโทรศัพท์ภายใน <span style="color:red">*</span></label>
            <input type="text" name="phonenum" class="form-control" id="phonenum" placeholder="" value="<?php echo $row['phonenum'];?>">
          </div>
        </div>   
      </div>

      <div class="form-row">
        <div class="col-md-12">
          <div class="form-group">
              <label for="place">ขออนุญาตใช้รถ (สถานที่) <span style="color:red">*</span></label>
              <input type="text" name="place" class="form-control" id="place" placeholder="" value="<?php echo $row['place'];?>">
          </div>
        </div>
      </div>

      <div class="form-row">
        <div class="col-md-12">
            <div class="form-group">
                <label>วัตถุประสงค์การเดินทาง <span style="color:red">*</span></label>
                  <textarea class="d-none" name="purpose" id="purpose" rows="5" cols="80" >
                  <?php echo $row['purpose'];?>
                  </textarea>
            </div>
        </div>
      </div>

    <!-- DateTime-Picker-->
      <div class="form-row">
          <div class="col-md-6">
              <div class="form-group">
              <label>ระหว่างวันที่ <span style="color:red">*</span></label>
                  <div class="input-group date" id="datetimepickertest" data-target-input="nearest">
                    <div class="input-group-append" data-target="#datetimepickertest" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                    <input type="text" name="date_start" class="form-control datetimepicker-input" data-target="#datetimepickertest" value="<?php echo $row['date_start'];?>"/>
                  </div>
              </div>
          </div>

          <div class="col-md-6">
              <div class="form-group">
              <label>ถึง <span style="color:red">*</span></label>
                  <div class="input-group date" id="datetimepickertest1" data-target-input="nearest">
                    <div class="input-group-append" data-target="#datetimepickertest1" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                    <input type="text" name="date_end" class="form-control datetimepicker-input" data-target="#datetimepickertest1" value="<?php echo $row['date_end'];?>"/>
                  </div>
              </div>
          </div>
      </div>

      <button type="submit" name="submit" class="btn btn-primary">บันทึกข้อมูล</button>

      </form>

    </div>    <!-- /card body -->
    </div>    <!-- /card -->
    </div>    <!-- /col-md-12 -->



<!-- ข้อมูลผู้ร่วมเดินทาง -->
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title float-left">
                  <i class="fas fa-edit"></i>
                  ข้อมูลผู้ร่วมเดินทาง
                </h3>
            <div class="card-tools">
              </div>
            </div>
            <!-- /.card-header -->


        <!-- start card body -->
        <div class="card-body">

      <?php
          include_once('../authen.php');
          // query ชื่อผู้ร่วมเดินทาง
          $select_pass = "SELECT * FROM passengers_list"
                          or die ("Error : ".mysqlierror($select_pass));
          $result_pass = $conn->query($select_pass);
          $pass_row = $result_pass->fetch_assoc();

          // query หน่วยงาน
          // $select_dept = "SELECT * FROM department_list"
          //                 or die ("Error : ".mysqlierror($select_dept));; 
          // $result_dept = $conn->query($select_dept);
          // $pass_row = $result_dept->fetch_assoc();


          // บันทึกผู้ร่วมเดินทางลงฐานข้อมูล 
          if(isset($_POST['ok'])) {
            echo "<pre>";
            print_r($_POST);
            echo "</pre>";
            // exit;
            // นับ passengers
            $count = count($_POST['p_name']);
            // print_r($count);
            $names = $_POST['p_name'];
            // print_r($passengers);

            // เช็คค่า count
            if($count >= 1) {
              for ($i =0; $i < $count; $i++){
                // เช็คค่า passengers ไม่ใช่ค่าว่าง ใช้ฟังชัน trim ตัดวรรคและช่องว่าง
                if(trim($_POST['p_name'][$i]) != ''){
                    $sql = mysqli_query($conn, "INSERT INTO passenger(name) VALUES('$names[$i]')");
                }
              }
              echo "<script> alert('บันทึกสำเร็จ')</script>";
            }else{
              echo "<script> alert('กรุณาเลือกข้อมูล')</script>";
            }
          }  

    ?>

    <?php
          include_once('../authen.php');
          // query ชื่อผู้ร่วมเดินทาง
          $select_pass = "SELECT * FROM passengers_list"
                          or die ("Error : ".mysqlierror($select_pass));
          $result_pass = $conn->query($select_pass);
          $pass_row = $result_pass->fetch_assoc();

          // query หน่วยงาน
          // $select_dept = "SELECT * FROM department_list"
          //                 or die ("Error : ".mysqlierror($select_dept));; 
          // $result_dept = $conn->query($select_dept);
          // $pass_row = $result_dept->fetch_assoc();

    ?>
     <!-- form start -->
        <form role="form" action="add_passenger.php" method="post">       
            <div class="form-row">
              <div class="col-md-12">
              <form role="form" action="add_passenger.php" method="post">
                  <div class="table-responsive">
                    <label  abel for="">ผู้ร่วมเดินทาง</label>
                      <table class="table table-striped" id="dynamic_field">
                        <thead>
                          <tr class=" table-active">
                            <th width="45%">ชื่อ-นามสกุล</th>
                            <th width="45%">หน่วยงาน</th>
                            <th width="45%"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>

                            <!-- List Option ผู้ร่วมเดินทาง -->
                                <select class="form-control select2" name="p_name[]"  style="width: 100%;">
                                    <option  value="">--Select--</option>

                                      <?php foreach ($result_pass as $rs) {?>
                                        <option  value="<?php echo $rs['p_name']; ?>">                    
                                        <?php echo $rs['p_name']; ?>
                                        </option>
                                        <?php }?>

                                </select>
                              <!-- <input type="text" name="skill[]" placeholder="test" class="form-control name_list"> -->
                            </td>
                            <td>

                            <!-- List Option หน่วยงาน -->
                                <select class="form-control select2" name="dept[]" style="width: 100%;">
                                    <option  value="">--Select--</option>

                                      <?php foreach ($result_pass as $rs) {?>
                                        <option  value="<?php echo $rs['p_name']; ?>">                    
                                        <?php echo $rs['p_name']; ?>
                                        </option>
                                        <?php }?>

                                </select>
                              <!-- <input type="text" name="test[]" placeholder="test" class="form-control name_list"> -->
                            </td>
                            <td align="center">
                              <button type="button" name="add" id="add" class="btn btn-sm btn-success" style="width: 100%;"> เพิ่ม
                              </button>
                            </td>
                          </tr>
                          </tbody>
                      </table>
                    <!-- <input type="submit" name="ok" id="ok" class="btn btn-info"> -->
                  </div>    <!-- /table-responsive -->
              </div>
            </div>    <!-- /form-row -->
        </div>    <!-- /card body -->
      </div>    <!-- /card -->
  </div>    <!-- /col-md-12 -->


          <div class="card-footer text-center">
              <button type="submit"  name="ok" class="btn btn-block btn-primary">ส่งข้อมูลการจอง</button>
          </div>
        </form>

      </div>   <!-- /.content-wrapper -->  
    </section>
    <!-- /.content -->  
  </div>    <!-- /.wrapper --> 
  

  <!-- footer -->
  <?php include_once('../includes/footer.php') ?>
  
</div>
<!-- ./wrapper -->



<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>

<!-- popper -->
<script src="../../dist/js/plugins/popper/umd/popper.min.js"></script>

<!-- bootstrap.min.js -->
<script src="../../dist/js/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- datepicker -->
<!-- <script src="../../plugins/datepicker/bootstrap-datepicker.js"></script> -->
<!-- <script src="../../plugins/daterangepicker/daterangepicker.js"></script> -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="../../plugins/moment-develop/locale/th.js"></script>

<!-- <script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script> -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>

<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- DataTables -->
<script src="https://adminlte.io/themes/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- CKEditor -->
<script src="../../plugins/ckeditorfull/ckeditor.js"></script>

<!-- Select2 -->
<script src="../../plugins/select2/select2.full.min.js"></script>
<script src="../../plugins/select2/select2.min.js"></script>

<!-- <?php
for ($i=1; $i < $j; $i++) { 
  $name = test[$i];
  $position = num_passenger[$i];
}
?> -->
<script type="text/javascript">	
    $(document).ready(function() {
    $('.select2').select2({
    closeOnSelect: true
    });
    });
  </script>
   
        <script type="text/javascript">
            $(function () {
                $('#datetimepickertest').datetimepicker({
                  
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
                $('#datetimepickertest1').datetimepicker({

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

    //Initialize Select2 Elements
    $('.select2').select2()


    // CKEDITOR
    CKEDITOR.replace( 'purpose' ,{
      language: 'th',
      filebrowserBrowseUrl : '../../plugins/responsive_filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
      filebrowserUploadUrl : '../../plugins/responsive_filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
      filebrowserImageBrowseUrl : '../../plugins/responsive_filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
});

  });

</script>

<!-- เพิ่ม-ลบ จำนวนผู้ร่วมเดินทาง -->
<script>
    $(document).ready(function() {
        let i = 1;
        $('#add').click(function() {
          i++;

// select2 ใชได้ล่าสุด

            $('#dynamic_field').append('<tr id="row'+i+'"><td><select class="form-control select2" name="p_name[]" style="width: 100%;"><option  value="">--Select--</option><?php foreach ($result_pass as $rs) {?><option  value="<?php echo $rs['p_name']; ?>"><?php echo $rs['p_name']; ?></option><?php }?></select></td><td><select class="form-control select2" name="p_name[]" style="width: 100%;"><option  value="">--Select--</option><?php foreach ($result_pass as $rs) {?><option  value="<?php echo $rs['p_name']; ?>"><?php echo $rs['p_name']; ?></option><?php }?></select></td><td align="center"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>')


            

// ใช้ได้้
          // $('#dynamic_field').append('<tr id="row'+i+'"><td><select class="form-control select2" name="passenger[]" style="width: 100%;"><option selected="selected">-- เลือกรายชื่อ --</option><option>Alaska</option><option>California</option></select></td><td><select class="form-control select2" name="department[]" style="width: 100%;"><option selected="selected">-- เลือกหน่วยงาน --</option><option>Alaska</option><option>California</option></select></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>')

          $('.select2').select2();
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