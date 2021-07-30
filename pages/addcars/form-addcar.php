<?php include_once('../authen.php'); 

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- <title>Admin Management</title> -->
  <title>ระบบจองยานพาหนะ</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- <link rel="stylesheet" href="../../assets/css/colors_bt5.css"> -->
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="../../plugins/bootstrap5/dist/css/bootstrap.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">

    <!-- fullCalendar -->
    <!-- <link rel="stylesheet" href="../../plugins/fullcalendar5/lib/main.css"> -->

    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables_new/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../../plugins/datatables_new/select.bootstrap5.min.css">

<!-- <style>
  #myTab li.active  {border-bottom-color: transparent;background-color:Yellow; }
</style> -->

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar & Main Sidebar Container -->
  <?php include_once('../includes/sidebar.php') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

<!-- Section content -->
        <section class="content-header">
              <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                          <h5 class="m-0 text-dark">เพิ่มข้อมูลยานพาหนะ/คนขับ</h5>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../dashboard">หน้าหลัก</a></li>
                                <li class="breadcrumb-item active">เพิ่มยานพาหนะ</li>
                            </ol>
                        </div>
                    </div>
              </div><!-- /.container-fluid -->
        </section>

<!-- Section content -->
        <section class="content">

        <div class="container-fluid">
          <div class="row">
            <div class="col-12">

            


        <div class="card card shadow">

        <div class="card-header">
                    <span class="float-start fs-5 float-end" style="line-height: 3.0rem"> <i class="fas fa-edit"></i>&nbsp;&nbsp;บันทึกข้อมูลยานพาหนะ</span>
                        <a href="index.php" class="btn btn-sm float-start btn-backward mt-2">
                            <i class="fas fa-backward"></i> 
                                ย้อนกลับ
                        </a>
                </div>

                <!-- Datatable #1_CarsTable -->
                <div class="card-body table-responsive style="overflow-x:auto;">

                <form role="form" action="addcars.php" method="post">
          <div class="card-body">
          <div class="form-row">
          <div class="col-md-6">
          <div class="form-group">
              <label for="carregis">เลขทะเบียนยานพาหนะ <span style="color:red">*</span></label>
              <input type="text" class="form-control" name="car_regis" id="carregis" placeholder="เลขทะเบียนยานพาหนะ" required>
            </div>
          </div>
          <div class="col-md-6">
          <div class="form-group">
              <label for="carbrand">ยี่ห้อยานพาหนะ <span style="color:red">*</span></label>
              <input type="text" class="form-control" name="car_brand" id="carbrand" placeholder="ยี่ห้อยานพาหนะ" required>
            </div>
          </div>
          </div>
            
          <div class="form-row">
          <div class="col-md-6">
          <div class="form-group">
              <label for="cartype">ประเภทยานพาหนะ <span style="color:red">*</span></label>
              <input type="text" class="form-control" name="car_type" id="cartype" placeholder="ประเภทยานพาหนะ" required>
            </div>
          </div>
          <div class="col-md-6">
          <div class="form-group">
              <label>สถานะยานพาหนะ <span style="color:red">*</span></label>
              <select class="form-control" name="car_status" required>
              <option value="" disabled selected>กำหนดสถานะยานพาหนะ</option>
                <option value="online">พร้อมใช้งาน</option>
                <option value="offline">ไม่พร้อมใช้งาน</option>
              </select>
            </div>
          </div>
          </div>
          </div>

          <div class="d-grid gap-2">
  <button class="btn btn-primary" type="submit" name="submit">บันทึกข้อมูล</button>
</div>

        </form>

                </div>  <!-- /.card-body table-responsive -->

                                    <div class="card-footer text-muted">
///
                                    </div>
            </div>  <!-- /.card -->

            </div>
          </div>
        </div>


        </section>



</div>
<!-- /.content-wrapper -->
</div>
<!-- /.wrapper-->

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
<script src="../../plugins/datatables_new/dataTables.select.min.js"></script>

<!-- fullCalendar 2.2.5 -->
<!-- <script src="../../plugins/moment/moment.min.js"></script> -->

<!-- <script src="../../plugins/fullcalendar5/lib/main.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>


  <script>
  function deleteItem (id) { 
    if( confirm('Are you sure, you want to delete this item?') == true){
      window.location=`delete.php?id=${id}`;
      // window.location='delete.php?id='+id;
    }
  };

</script>


</body>
</html>