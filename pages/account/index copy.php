<?php include_once('../authen.php'); 
  $sql = "SELECT * FROM `admin`";
  $result = $conn->query($sql);

  // print_r($result);

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

      <!-- Default box -->
      <div class="card">
        <div class="card-header bg-dark">
          <h3 class="card-title" style="line-height: 2.1rem">รายการผู้ใช้งาน</h3>

          <div class="card-tools">
          <div class="row">
          <div class="col-12 text-center">
            <div class="btn-group-custom">

              <a href="form-create.php">
                <button class="btn btn-secondary"><i class="fas fa-user-plus nav-icon"></i> เพิ่มผู้ใช้งาน</button>
              </a>
            </div>
            </div>
          </div>
          </div>


        </div>
        <!-- /.card-header -->
        <div class="card-body" style="overflow-x:auto;">
          <table id="dataTable" class="table table-hover table-bordered table-striped">
            <thead>
            <tr>
              <th>ลำดับที่</th>
              <th>ชื่อผู้ใช้งาน</th>
              <th>ชื่อจริง</th>
              <th>นามสกุล</th>
              <th>สถานะ</th>
              <th>การจัดการ</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            $num = 0;
            while ($row = $result->fetch_assoc() ) {
              $num++;
              ?>
              <tr>
                <td><?php echo $num; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['last_name']; ?></td>

                <td>

                <p style="font-size:1.1rem;"><span class="badge badge-pill badge-warning"><i class="fa fa-user-check"></i> <?php echo $row['status']; ?></span></p>
                
                </td>

                <td align="center">
                <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="form-edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-info">
                    <i class="fas fa-eye"></i> เรียกดู
                  </a> 
                  <a href="form-edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">
                    <i class="fas fa-edit"></i> แก้ไข
                  </a> 
                  <a href="#" onclick="deleteItem(<?php echo $row['id']; ?>);" class="btn btn-sm btn-danger">
                    <i class="fas fa-trash-alt"></i> ลบ
                  </a>
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

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
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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

<script>
  $(function () {
    $('#dataTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,

      language: {
            url: 'dataTables.thai.json',

                  "emptyTable": "ไม่มีข้อมูลในตาราง",
                  "info": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
                  "infoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
                  "infoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
                  "infoThousands": ",",
                  "lengthMenu": "แสดง _MENU_ แถว",
                  "loadingRecords": "กำลังโหลดข้อมูล...",
                  "processing": "กำลังดำเนินการ...",
                  "search": "ค้นหา: ",
                  "zeroRecords": "ไม่พบข้อมูล",
                  "paginate": {
                      "first": "หน้าแรก",
                      "previous": "ก่อนหน้า",
                      "next": "ถัดไป",
                      "last": "หน้าสุดท้าย"
                  },
                  "aria": {
                      "sortAscending": ": เปิดใช้งานการเรียงข้อมูลจากน้อยไปมาก",
                      "sortDescending": ": เปิดใช้งานการเรียงข้อมูลจากมากไปน้อย"
                  },
                  "autoFill": {
                      "cancel": "ยกเลิก",
                      "fill": "กรอกทุกช่องด้วย",
                      "fillHorizontal": "กรอกตามแนวนอน",
                      "fillVertical": "กรอกตามแนวตั้ง",
                      "info": "ข้อมูลเพิ่มเติม"
                  },
                  "buttons": {
                      "collection": "ชุดข้อมูล",
                      "colvis": "การมองเห็นคอลัมน์",
                      "colvisRestore": "เรียกคืนการมองเห็น",
                      "copy": "คัดลอก",
                      "copyKeys": "กดปุ่ม Ctrl หรือ Command + C เพื่อคัดลอกข้อมูลบนตารางไปยัง Clipboard ที่เครื่องของคุณ"
                  }
                } 
    });
  });

  function deleteItem (id) { 
    if( confirm('Are you sure, you want to delete this item?') == true){
      window.location=`delete.php?id=${id}`;
      // window.location='delete.php?id='+id;
    }
  };

</script>

</body>
</html>
