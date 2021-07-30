<?php include_once('../authen.php') ?>
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

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- datepicker -->
  <!-- <link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker-bs3.css">
  <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.css">
  <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.css"> -->
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">


  <!-- <link rel="stylesheet" href="../../Datepicker Using Jquery Bootstrap/lib/bootstrap-datepicker.css">
  <link rel="stylesheet" href="../../Datepicker Using Jquery Bootstrap/lib/bootstrap-datepicker.js">
  
  <link rel="stylesheet" href="../../Bootstrap Timepicker Using Jquery/lib/tpicker.css">
  <script type="text/javascript" src="../../Bootstrap Timepicker Using Jquery/lib/tpicker.js"></script>

  <link rel="stylesheet" href="../../bootstrap-datetimepicker-0.0.11/css/bootstrap-datetimepicker.min.css">
  <script type="text/javascript" src="../../bootstrap-datetimepicker-0.0.11/js/bootstrap-datetimepicker.min.js"></script> -->
  
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.38.0/js/tempusdominus-bootstrap-4.min.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.38.0/css/tempusdominus-bootstrap-4.min.css" crossorigin="anonymous" />

  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap4.min.css">
<!-- bootstrap-toggle -->
  <link rel="stylesheet" href="../../plugins/bootstrap/css/bootstrap-toggle.min.css">
  
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar & Main Sidebar Container -->
  <?php include_once('../includes/sidebar.php') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="../articles">Articles Management</a></li>
              <li class="breadcrumb-item active">Create Data</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content px-3">
    <div class="col-md-12">
    <div class="card card-dark-light">
        <div class="card-header">
        <h3 class="card-title">บันทึกแบบฟอร์ม 3</h3>
        </div>
        <!-- /.card-header -->
        
        
        <!-- form start -->
        <form role="form" action="create.php" method="post">
          <div class="card-body">
            <div class="form-row">
              <div class="col-md-2">
                <div class="form-group">
              <label>คำนำหน้าชื่อ <span style="color:red">*</span> </label>
              <select class="form-control" name="prefix" required>
              <option value="" disabled selected>กรุณาเลือก</option>
                <option value="miss">นางสาว</option>
                <option value="mrs">นาง</option>
                <option value="mister">นาย</option>
              </select>
            </div>
            <!-- <div class="form-group">
                  <label>คำนำหน้า <span style="color:red">*</span></label>
                  <select class="form-control">
                    <option selected="selected">-- กรุณาเลือก --</option>
                    <option>นาย</option>
                    <option>นาง</option>
                    <option>นางสาว</option>
                  </select>
                </div> -->
            </div>

            

          
          <div class="col-md-5">
            <div class="form-group">
              <label for="fname">ชื่อ <span style="color:red">*</span></label>
              <input type="text" name="fname" class="form-control" id="fname" placeholder="ชื่อ">
            </div>
          </div>

          <div class="col-md-5">
            <div class="form-group">
              <label for="fname">นามสกุล <span style="color:red">*</span></label>
              <input type="text" name="lname" class="form-control" id="lname" placeholder="นามสกุล">
            </div>
          </div>
        </div>
          <!-- /from-row -->
        <div class="form-row">
          <div class="col-md-6">
          <div class="form-group">
              <label>สังกัด <span style="color:red">*</span> </label>
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
              <input type="text" name="phonenum" class="form-control" id="phonenum" placeholder="">
            </div>
          </div>   
          </div>

          <div class="form-row">
          <div class="col-md-12">
          <div class="form-group">
              <label for="place">ขออนุญาตใช้รถ (สถานที่) <span style="color:red">*</span></label>
              <input type="text" name="place" class="form-control" id="place" placeholder="">
            </div>
          </div>
          </div>

          <div class="form-row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>วัตถุประสงค์การเดินทาง <span style="color:red">*</span></label>
                      <textarea class="form-control" name="purpose" rows="2" placeholder="..." ></textarea>
                  </div>
              </div>
        </div>

<!-- DateTime-Picker -->

    <div class="form-row">
        <div class="col-md-4">
            <div class="form-group">
            <label>ตั้งแต่วันที่ <span style="color:red">*</span></label>
                <div class="input-group date" id="start_date" data-target-input="nearest">
                    <input type="text" name="date_start" class="form-control datetimepicker-input" data-target="#start_date"/>
                    <div class="input-group-append" data-target="#start_date" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
            <label>เวลา <span style="color:red">*</span></label>
                <div class="input-group date" id="start_time" data-target-input="nearest">
                    <input type="text" name="time_start" class="form-control datetimepicker-input" data-target="#start_time"/>
                    <div class="input-group-append" data-target="#start_time" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fas fa-clock"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
            <label>ถึงวันที่ <span style="color:red">*</span></label>
                <div class="input-group date" id="end_date" data-target-input="nearest">
                    <input type="text" name="date_end" class="form-control datetimepicker-input" data-target="#end_date"/>
                    <div class="input-group-append" data-target="#end_date" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
            <label>เวลา <span style="color:red">*</span></label>
                <div class="input-group date" id="end_time" data-target-input="nearest">
                    <input type="text" name="time_end" class="form-control datetimepicker-input" data-target="#end_time"/>
                    <div class="input-group-append" data-target="#end_time" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fas fa-clock"></i></div>
                    </div>
                </div>
            </div>
        </div>

</div>
  <!-- /.form-row-->
      </div>
      <!-- /card body -->
    </div>

    <input type="checkbox" checked data-toggle="toggle">

    </div>
          <div class="card-footer text-center">
              <button type="submit" name="submit" class="btn btn-primary">บันทึก</button>
          </div>
        </form>
      </div>    
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>

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
<!-- CK Editor -->
<script src="../../plugins/ckeditor/ckeditor.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/select2.full.min.js"></script>
<!-- bootstrap-toggle -->
<script src="../../plugins/bootstrap/js/bootstrap-toggle.min.js"></script>

<!-- Date-Time -->
<script type="text/javascript">
            $(function () {
                $('#start_date').datetimepicker({
                    // format: 'L'
                    format: 'D-M-yy'
                });
            });

            $(function () {
                $('#end_date').datetimepicker({
                    // format: 'L'
                    format: 'D-M-yy'
                });
            });

            $(function () {
                $('#start_time').datetimepicker({
                    format: 'LT'
                });
            });

            $(function () {
                $('#end_time').datetimepicker({
                    format: 'LT'
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

    //Date picker
    // $('#datepicker').datepicker({
    //   autoclose: true,
    //   format: "dd/mm/Y",
    //   locale: 'th'
    // })

    // $('#datepicker1').datepicker({
    //   autoclose: true,
    //   format: "dd-mm-yy"
    // })

		// 	$(function() {
		// 	$('#timepicker').datepicker({
		// 		'format': 'dd-mm-yyyy',
		// 		'autoclose': true
		// 	});
		// });
//Timepicker
// $('#timepicker').datetimepicker({
//       format: 'LT'
//     })
//   });
  
</script>
</body>
</html>
