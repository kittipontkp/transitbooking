<?php include_once('../authen.php');

$id = $_GET['id'];
$sql = "SELECT department	, phonenum, place, purpose, date_start, date_end, status FROM `booking` 
        WHERE `id` = '".$id."'";

$result = $conn->query($sql);

$row = $result->fetch_assoc();

// print_r($row);


// count passenger
          $sql_pass = "SELECT * FROM passenger WHERE b_id = '".$_GET['id']."' ";
          $result_pass = $conn->query($sql_pass);
          $row_countpassenger = mysqli_num_rows($result_pass); 



          $sql_checkcars = "SELECT * FROM addcars WHERE booking_id = '".$id."'";
          $resultcheck = $conn->query($sql_checkcars);
          $cnt = mysqli_num_rows($resultcheck);
          
          while($rowcheck = $resultcheck->fetch_assoc()){
            $car_id[] = $rowcheck['regis_car'];
            $driver[] = $rowcheck['name_driver'];
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

    <!-- fullCalendar -->
    <!-- <link rel="stylesheet" href="../../plugins/fullcalendar5/lib/main.css"> -->

    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables_new/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../../plugins/datatables_new/select.bootstrap5.min.css">


<link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap.css">
<!-- Select2 -->
<link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">  
<link rel="stylesheet" href="../../plugins/select2/css/select2-bootstrap-5-theme.min.css">  
  
  <!-- bootstrap-toggle -->
  <link rel="stylesheet" href="../../plugins/ToggleSwitches/css/bootstrap-toggle.min.css">
  <link rel="stylesheet" href="../../plugins/ToggleSwitches/css/switcher.css">

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
          <h5 class="m-0 text-dark">การอนุมัติการจองยานพาหนะ</h5> <?php echo implode(" , ",$car_id); ?>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../dashboard">หน้าหลัก</a></li>
              <li class="breadcrumb-item"><a href="../articles">จองยานพาหนะ</a></li>
              <li class="breadcrumb-item active">การอนุมัติการจองยานพาหนะ</li>
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
                <!-- <i class="fas fa-edit"></i> -->
                รายละเอียดข้อมูลการจองยานพาหนะ
              </h3>
              <a href="index.php" class="btn btn-sm float-start btn-backward"><i class="fas fa-angle-double-left"></i> 
                      ย้อนกลับ
                      </a>

      <div class="card-tools">
        </div>

            </div>
      

<!-- start card body -->
        <div class="card-body">

              <table class="table table-hover">
                  <thead>
                      <tr class="table-success">
                          <th width="10%" scope="col">ลำดับ</th>
                          <th width="30%" scope="col">รายการ</th>
                          <th width="60%" scope="col">รายละเอียด</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td scope="row">1</td>
                          <td scope="row" class="fst-italic">วันที่ทำรายการ</td>
                          <!-- <td><span class="fst-italic">lllllll</span></td> -->
                          <td><?php echo thai_date_fullmonth(time()) ?></td>
                      </tr>
                      <tr>
                          <td scope="row">2</td>
                          <td scope="row" class="fst-italic">หน่วยงาน</td>
                          <td>ศูนย์เทคโนโลยีสารสนเทศและการสื่อสาร</td>
                      </tr>
                      <tr>
                          <td scope="row">3</td>
                          <td scope="row" class="fst-italic">หมายเลขโทรศัพท์ภายใน</td>
                          <td colspan="2"><?php echo $row['phonenum'] ?></td>
                      </tr>
                      <tr>
                          <td scope="row">4</td>
                          <td scope="row" class="fst-italic">ขออนุญาตใช้รถ (สถานที่)</td>
                          <td colspan="2"><?php echo $row['place'] ?></td>
                      </tr>
                      <tr>
                          <td scope="row">5</td>
                          <td scope="row" class="fst-italic">วัตถุประสงค์การเดินทาง</td>
                          <td colspan="2"><?php echo strip_tags($row['purpose']) ?></td>
                      </tr>
                      <tr>
                          <td scope="row">6</td>
                          <td scope="row" class="fst-italic">วัน | เวลา เริ่มต้น</td>
                          <td colspan="2"><?php $datestart = $row['date_start']; echo thai_date_and_time(strtotime($datestart)). " ". 'น.'; ?></td>
                      </tr>
                      <tr>
                          <td scope="row">7</td>
                          <td scope="row" class="fst-italic">วัน | เวลา สิ้นสุด</td>
                          <td colspan="2"><?php $dateend = $row['date_end']; echo thai_date_and_time(strtotime($dateend)). " ". 'น.'; ?></td>
                      </tr>
                      <tr>
                          <td scope="row">8</td>
                          <td scope="row" class="fst-italic">จำนวนผู้ร่วมเดินทาง</td>
                          <td colspan="2"><?php echo $row_countpassenger ?> คน</td>
                      </tr>
                      <tr>
                          <td scope="row">9</td>
                          <td scope="row" class="fst-italic">รายชื่อผู้ร่วมเดินทาง</td>

                          

                          <td colspan="2">
                            
                          <?php
                  $num_pass = 0;
                  while ($row_pass = $result_pass->fetch_assoc()) {
                  $num_pass++;
              ?>
                          <ul>
                            <li><?php echo $row_pass['name']; ?></li>
                          </ul>
<?php } ?>
                          </td>

                          
                      </tr>
                  </tbody>
              </table>

        <!-- form start -->
        <form  action="update.php" method="post" enctype="multipart/form-data">

              <div class="card border-light mt-3">
                  <div class="card-header">การอนุมัติ | ไม่อนุมัติ</div>
                  <div class="card-body text-secondary">
                      <h6 class="text-muted">#สิทธิ์การอนุมัติของกลุ่มช่วยอำนวยการ</h6>
                      <p>
                          <div class="form-group">
                              <label for="approval">การอนุมัติ/ไม่อนุมัติ:</label>
                              <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="true" <?php if ($row['status'] == 'true') echo "checked"; ?> >
                                  <label class="form-check-label" for="inlineRadio1">รออนุมัติ</label>
                              </div>
                              <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="success" <?php if ($row['status'] == 'success') echo "checked"; ?> >
                                  <label class="form-check-label" for="inlineRadio1">อนุมัติแล้ว</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="false" <?php if ($row['status'] == 'false') echo "checked"; ?> >
                                <label class="form-check-label" for="inlineRadio2">ไม่อนุมัติ</label>
                              </div>
                          </div>
                      </p>
                  </div>
              </div>                        
        </div>    <!-- /card body -->
    </div>    <!-- /card -->
</div>    <!-- /col-md-12 -->

          <div class="card-footer text-center">

          <div class="d-grid gap-2">
              <button class="btn btn-primary" type="submit" name="submit">
              <i class="fas fa-save"></i>
              บันทึกข้อมูล</button>
            </div>
          </div>

<!-- เรียก id ซ่อนไว้ -->
<input type="hidden" name="id" value="<?php echo $id; ?>">

        </form>

      </div>   <!-- /.content-wrapper -->

  <!-- footer -->
  <?php include_once('../includes/footer.php') ?>
  
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 5 -->
<script src="../../plugins/bootstrap5/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="../../plugins/jQueryUI/jquery-ui.min.js"></script>
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
<script src="../../plugins/ToggleSwitches/js/jquery.switcher.js"></script>

<script>
  $.switcher();</script>
  <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<!-- Date-Time -->
<script type="text/javascript">
            $(function () {
                $('#datetimepickertest').datetimepicker({

                    allowInputToggle: true,
                    showTodayButton: true,
                    toolbarPlacement: 'bottom',
                    sideBySide: true,
                    format: 'yyyy/MM/DD HH:mm',
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

    ClassicEditor
      .create(document.querySelector('#detail'))
      .then(function (editor) {
        // The editor instance
      })
      .catch(function (error) {
        console.error(error)
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
</body>
</html>
