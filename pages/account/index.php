<?php include_once('../authen.php'); 
  $sql = "SELECT * FROM `admin`";
  $result = $conn->query($sql);

  // print_r($result);
  $sql_user = "SELECT * FROM `admin`
              WHERE `id` = '".$_SESSION['authen_id']."'";

  $result_user = $conn->query($sql_user);

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
            <h5 class="m-0 text-dark">การจัดการผู้ใช้งาน</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../dashboard">หน้าหลัก</a></li>
              <li class="breadcrumb-item active">การจัดการผู้ใช้งาน</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="container-fluid">
      <div class="row">
          <div class="col-12">

          
      <!-- Default box -->
      <div class="card card shadow">
        <div class="card-header">
        <span class="float-start fs-5" style="line-height: 3.0rem"> <i class="fas fa-th-list"></i>&nbsp;&nbsp; รายการผู้ใช้งาน</span>

            <div class="row">
                <div class="col-12 text-center">
                    <div class="btn-group-add float-end" style="line-height: 3.5rem">
                        <a href="form-create.php">
                          <button class="btn"><span class="fw-bolder"><i class="fas fa-plus-circle"></i> เพิ่มผู้ใช้งาน</span></button>
                        </a>
                    </div>
                </div>
            </div>


        </div>
        <!-- /.card-header -->
        <div class="card-body" style="overflow-x:auto;">
        <?php if(isset($_SESSION['status']) && $_SESSION['status'] == "superadmin") { ?>
        <div class="table-responsive">
          <table id="AccountTable" class="display table table-bordered table-hover table table-sm">
            <thead>
              <tr class="text-center table-primary">
              <th>ลำดับที่</th>
              <th>ชื่อผู้ใช้งาน</th>
              <th>ชื่อ - นามสกุล</th>
              <th>สถานะ</th>
              <th>การจัดการ</th>
              </tr>
            </thead>
              <tfoot>
                    <tr class="table table-sm table-light text-center">
                        <th><small class="fw-light text-muted">ลำดับที่</small></th>
                        <th><small class="fw-light text-muted">ชื่อผู้ใช้งาน</small></th>
                        <th><small class="fw-light text-muted">ชื่อ - นามสกุล</small></th>
                        <th><small class="fw-light text-muted">สถานะ</small></th>
                        <th><small class="fw-light text-muted">การจัดการ</small></th>
                    </tr>
              </tfoot>
            <tbody>
            <?php 
            $num = 0;
            while ($row = $result->fetch_assoc() ) {
              $num++;
              ?>
              <tr>
                <td class="text-center"><?php echo $num; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['first_name'] . '&nbsp;&nbsp;&nbsp;&nbsp;' . $row['last_name']; ?></td>
                <td class="text-center">

                <p style="font-size:1.1rem;"><span class="badge rounded-pill bg-warning"><i class="fa fa-user-check"></i> <?php echo $row['status']; ?></span></p>
                
                </td>

                <td align="center">
                <!-- <div class="btn-group" role="group" aria-label="Basic example"> -->
                  <a href="form-edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-info btn-action">
                    <i class="fas fa-eye"></i> เรียกดู
                  </a> 
                  <a href="form-edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning btn-action">
                    <i class="fas fa-edit"></i> แก้ไข
                  </a> 
                  <a href="#" onclick="deleteItem(<?php echo $row['id']; ?>);" class="btn btn-sm btn-danger btn-action">
                    <i class="fas fa-trash-alt"></i> ลบ
                  </a>
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
          <?php } else  { ?>
            <div class="table-responsive">
            <table id="AccountTable" class="display table table-bordered table-hover table table-sm">
            <thead>
            <tr class="text-center table-primary">
              <th>ลำดับที่</th>
              <th>ชื่อผู้ใช้งาน</th>
              <th>ชื่อ - นามสกุล</th>
              <th>สถานะ</th>
              <th>การจัดการ</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            $num_user = 0;
            while ($row_user = $result_user->fetch_assoc() ) {
              $num_user++;
              ?>
              <tr>
                <td><?php echo $num_user; ?></td>
                <td><?php echo $row_user['username']; ?></td>
                <td><?php echo $row_user['first_name'] . '&nbsp;&nbsp;&nbsp;&nbsp;' . $row_user['last_name']; ?></td>

                <td>

                <p style="font-size:1.1rem;"><span class="badge badge-pill badge-warning"><i class="fa fa-user-check"></i> <?php echo $row_user['status']; ?></span></p>
                
                </td>

                <td align="center">
                <!-- <div class="btn-group" role="group" aria-label="Basic example"> -->
                  <a href="form-edit.php?id=<?php echo $row_user['id']; ?>" class="btn btn-sm btn-info">
                    <i class="fas fa-eye"></i> เรียกดู
                  </a> 
                  <a href="form-edit.php?id=<?php echo $row_user['id']; ?>" class="btn btn-sm btn-warning">
                    <i class="fas fa-edit"></i> แก้ไข
                  </a> 
                  <a href="#" onclick="deleteItem(<?php echo $row_user['id']; ?>);" class="btn btn-sm btn-danger">
                    <i class="fas fa-trash-alt"></i> ลบ
                  </a>
                </td>
              </tr>
            <?php } ?>
            </tbody>
              <tfoot>
                  <tr class="table table-sm table-light text-center">
                      <th><small class="fw-light text-muted">ลำดับที่</small></th>
                      <th><small class="fw-light text-muted">ชื่อผู้ใช้งาน</small></th>
                      <th><small class="fw-light text-muted">ชื่อ - นามสกุล</small></th>
                      <th><small class="fw-light text-muted">สถานะ</small></th>
                      <th><small class="fw-light text-muted">การจัดการ</small></th>
                  </tr>
              </tfoot>
          </table>
            </div>
          <?php } ?>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      </div>
      </div>
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
<script src="../../plugins/datatables_new/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables_new/dataTables.select.min.js"></script>

<!-- fullCalendar 2.2.5 -->
<!-- <script src="../../plugins/moment/moment.min.js"></script> -->

<!-- <script src="../../plugins/fullcalendar5/lib/main.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>

<script>
    $(document).ready( function () {
        $('#AccountTable').DataTable({
          language : {
    "decimal":        "",
    "emptyTable":     "ไม่มีข้อมูล",
    "info":           "แสดง _START_ - _END_ จากทั้งหมด _TOTAL_ รายการ",
    "infoEmpty":      "Showing 0 to 0 of 0 entries",
    "infoFiltered":   "(filtered from _MAX_ total entries)",
    "infoPostFix":    "",
    "thousands":      ",",
    "lengthMenu":     "แสดง _MENU_ รายการ",
    "loadingRecords": "Loading...",
    "processing":     "Processing...",
    "search":         "ค้นหา:",
    "zeroRecords":    "No matching records found",
    "paginate": {
        "first":      "First",
        "last":       "Last",
        "next":       "ถัดไป",
        "previous":   "ก่อนหน้า"
    },
    "aria": {
        "sortAscending":  ": activate to sort column ascending",
        "sortDescending": ": activate to sort column descending"
    }
}
        });
    } );
</script>

</body>
</html>
