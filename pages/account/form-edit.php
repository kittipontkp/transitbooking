<?php include_once('../authen.php');

$id = $_GET['id'];
$sql = "SELECT prefix, first_name, last_name, username, email, phone_number, status FROM `admin` WHERE `id` = '".$id."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

print_r($row);
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
          <h5 class="m-0 text-dark">การแก้ไขข้อมูลผู้ใช้งาน</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../dashboard">หน้าหลัก</a></li>
              <li class="breadcrumb-item"><a href="../admin">จัดการผู้ใช้งาน</a></li>
              <li class="breadcrumb-item active">แก้ไขข้อมูลผู้ใช้งาน</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card card">
        <div class="card-header">
        <h3 class="card-title text-secondary float-right" style="line-height: 2.1rem">แก้ไขข้อมูลผู้ใช้งาน</h3>
        <a href="index.php" class="btn btn-warning float-left"><i class="fas fa-angle-double-left"></i>
                        ย้อนกลับ</a>
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <form role="form" action="update.php" method="post">
          <div class="card-body">
          <div class="form-row">

          <div class="col-md-2">
                <div class="form-group">
              <label>คำนำหน้าชื่อ <span style="color:red">*</span> </label>
                  <select class="form-control" name="prefix" required>
                      <option value="" disabled selected>กรุณาเลือก</option>
                      <option value="females" <?php echo $row['prefix'] == 'females'? 'selected': '' ?> >นางสาว</option>
                      <option value="female" <?php echo $row['prefix'] == 'female'? 'selected': '' ?> >นาง</option>
                      <option value="male" <?php echo $row['prefix'] == 'male'? 'selected': '' ?> >นาย</option>
                  </select>
            </div>
            </div>

          <div class="col-md-5">
          <div class="form-group">
              <label for="firstName">ชื่อจริง <span style="color:red">*</span></label>
              <input type="text" class="form-control" name="first_name" id="firstName" placeholder="ชื่อจริง" required value="<?php echo $row['first_name'] ?> ">
            </div>
          </div>
          <div class="col-md-5">
          <div class="form-group">
              <label for="lastName">นามสกุล <span style="color:red">*</span></label>
              <input type="text" class="form-control" name="last_name" id="lastName" placeholder="นามสกุล" required value="<?php echo $row['last_name'] ?> ">
            </div>
          </div>
          </div>
            
            <div class="form-row">
            <div class="col-md-6">
            <div class="form-group">
              <label for="username">ชื่อผู้ใช้งาน <span style="color:red">*</span></label>
              <input type="text" disabled class="form-control" name="username" id="username" placeholder="ชื่อผู้ใช้งาน" required value="<?php echo $row['username'] ?> ">
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                <label for="password">รหัสผ่าน <span style="color:red">*</span></label>
                <input type="password" disabled class="form-control" name="password" id="password" placeholder="รหัสผ่าน" required > 
            </div>
            </div>
            </div>
            
            <div class="form-row">
            <div class="col-md-4">
            <div class="form-group">
                <label for="email">E-Mail Address <span style="color:red">*</span></label>
                <input type="text" class="form-control" name="email" id="email" placeholder="example@mail" required value="<?php echo $row['email'] ?> "> 
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
                <label for="phonenumber">หมายเลยโทรศัพท์ภายใน <span style="color:red">*</span></label>
                <input type="text" class="form-control" name="phone_number" id="phonenumber" placeholder="หมายเลยโทรศัพท์ภายใน" required value="<?php echo $row['phone_number'] ?>" > 
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
                <label  abel>สิทธิ์การใช้งาน <span style="color:red">*</span></label>
                    <select class="form-control" name="status" required>
                        <option value="" disabled selected>กำหนดสิทธิ์</option>
                        <option value="superadmin" <?php echo $row['status'] == 'superadmin'? 'selected': '' ?> >Super Admin</option>
                        <option value="admin" <?php echo $row['status'] == 'admin'? 'selected': '' ?> >Admin</option>
                        <option value="user" <?php echo $row['status'] == 'user'? 'selected': '' ?> >User</option>
                    </select>
            </div>
            </div>
            </div>
          </div>

<!-- เรียก id ซ่อนไว้ -->
<input type="hidden" name="id" value="<?php echo $id; ?>">

            
</div>
<div class="card-footer">
    <button type="submit" name="submit" class="btn btn-block btn-primary">บันทึกการแก้ไข</button>
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
      "autoWidth": true
    });
  });
</script>

</body>
</html>
