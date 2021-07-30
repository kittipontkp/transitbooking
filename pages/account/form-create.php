<?php include_once('../authen.php') ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Admin Management</title>
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
            <h1>การจัดการผู้ใช้งาน</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../dashboard">หน้าหลัก</a></li>
              <li class="breadcrumb-item"><a href="../admin">การจัดการผู้ใช้งาน</a></li>
              <li class="breadcrumb-item active">เพิ่มผู้ใช้งาน</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card card">
        <div class="card-header">
            <h3 class="card-title float-end">
                <i class="fas fa-edit"></i>
                เพิ่มข้อมูลผู้ใช้งาน
            </h3>

            <a href="index.php" class="btn btn-sm float-start btn-backward">
              <i class="fas fa-angle-double-left"></i> 
              ย้อนกลับ
            </a>


        <div class="card-tools">
            <form role="form">
			        <table width="100%" border="0px">
				        <tbody>
                  <tr>
					<!-- <td><input type="text" class="form-control" name="word" value="" placeholder="คำค้นหา" style="width:180px;font-size:14px"></td>
					<td>
						<button type="submit" id="btSubmit" class="btn btn-primary">ค้นหา</button>
					</td> -->
				          </tr>
			          </tbody>
              </table>
		        </form>
          </div>

        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="create.php" method="post">
          <div class="card-body">
          <div class="row">

          <div class="col-md-4">
                <div class="form-group">
              <label>คำนำหน้าชื่อ <span style="color:red">*</span> </label>
              <select class="form-select" name="prefix" required>
              <option value="" disabled selected>กรุณาเลือก</option>
                <option value="นางสาว">นางสาว</option>
                <option value="นาง">นาง</option>
                <option value="นาย">นาย</option>
              </select>
            </div>
            </div>

          <div class="col-md-4">
          <div class="form-group">
              <label for="firstName">ชื่อจริง <span style="color:red">*</span></label>
              <input type="text" class="form-control" name="first_name" id="firstName" placeholder="ชื่อจริง" required>
            </div>
          </div>
          <div class="col-md-4">
          <div class="form-group">
              <label for="lastName">นามสกุล <span style="color:red">*</span></label>
              <input type="text" class="form-control" name="last_name" id="lastName" placeholder="นามสกุล" required>
            </div>
          </div>
          </div>
            
            <div class="row">
            <div class="col-md-4">
            <div class="form-group">
              <label for="username">ชื่อผู้ใช้งาน <span style="color:red">*</span></label>
              <input type="text" class="form-control" name="username" id="username" placeholder="ชื่อผู้ใช้งาน" required>
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
                <label for="password">รหัสผ่าน <span style="color:red">*</span></label>
                <input type="password" class="form-control" name="password" id="password" placeholder="รหัสผ่าน" required> 
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
                <label for="email">E-Mail Address <span style="color:red">*</span></label>
                <input type="text" class="form-control" name="email" id="email" placeholder="example@mail" required> 
            </div>
            </div>
            </div>
            
            <div class="row">
            <div class="col-md-4">
            <div class="form-group">
                <label for="phonenumber">หมายเลยโทรศัพท์ภายใน <span style="color:red">*</span></label>
                <input type="text" class="form-control" name="phone_number" id="phonenumber" placeholder="หมายเลยโทรศัพท์ภายใน" required> 
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
                <label for="phone">หมายเลยโทรศัพท์มือถือ <span style="color:red">*</span></label>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="หมายเลยโทรศัพท์มือถือ" required> 
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
                <label  abel>สิทธิ์การใช้งาน <span style="color:red">*</span></label>
                    <select class="form-select" name="status" required>
                      <option value="" disabled selected>กำหนดสิทธิ์</option>
                      <option value="superadmin">Super Admin</option>
                      <option value="admin">Admin</option>
                      <option value="user">User</option>
                    </select>
            </div>
            </div>
            </div>
          </div>
          <div class="card-footer">
          <div class="d-grid gap-2">
              <button class="btn btn-primary" type="submit" name="submit">
              <i class="fas fa-save"></i>
              บันทึกข้อมูลการจอง</button>
            </div>
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

</body>
</html>
