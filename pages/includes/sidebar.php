<?php
//  $uri = $_SERVER['REQUEST_URI'];  //nsocarbooking/admin/pages/admin/
//  $array = explode('/', $uri);
//  $key = array_search("pages", $array);
//  $name = $array[$key + 1];

function isActive($data)
{
  $array = explode('/', $_SERVER['REQUEST_URI']);
  $key = array_search("pages", $array);
  $name = $array[$key + 1];
  return $name === $data ? 'active' : '';
}

include_once('../authen.php');

// จำนวนรายการทั้งหมด
$sqlcount = "SELECT `id` FROM `booking`";
$result_count = $conn->query($sqlcount);
if ($result_count) {
  // it return number of rows in the table. 
  $row_count = mysqli_num_rows($result_count);
}

// จำนวนรายการรออนุมัติ
$sqlcount_assign = "SELECT `id` FROM `booking`";
$result_assign = $conn->query($sqlcount_assign);
if ($result_assign) {
  // it return number of rows in the table. 
  $row_assign = mysqli_num_rows($result_assign);
}

// จำนวนรายการรออนุมัติ
$sqlc_app = "SELECT `id` FROM `booking`
                 WHERE status = 'true' OR status = 'false' ";
$resultc_app = $conn->query($sqlc_app);
if ($resultc_app) {
  // it return number of rows in the table. 
  $rowc_app = mysqli_num_rows($resultc_app);
}

// จำนวนรายการจองของ user
$sqlc_user = "SELECT id, place, created_at, date_start FROM `booking`
                 WHERE `user_id` = '" . $_SESSION['authen_id'] . "'";

$resultc_user = $conn->query($sqlc_user);

if ($resultc_user) {
  // it return number of rows in the table. 
  $rowc_user = mysqli_num_rows($resultc_user);
  // print_r($rowc_user); 
}

?>

<!--Thai Date-Time Formate Function  -->
<?php
$dayTH = ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'];
$monthTH = [null, 'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];
$monthTH_brev = [null, 'ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];
function thai_date_and_time($time)
{   // 19 ธันวาคม 2556 เวลา 10:10:43
  global $dayTH, $monthTH;
  $thai_date_return = date("j", $time);
  $thai_date_return .= " " . $monthTH[date("n", $time)];
  $thai_date_return .= " " . (date("Y", $time) + 543);
  $thai_date_return .= " เวลา " . date("H:i", $time);
  return $thai_date_return;
}
function thai_date_and_time_short($time)
{   // 19  ธ.ค. 2556 10:10:4
  global $dayTH, $monthTH_brev;
  $thai_date_return = date("j", $time);
  $thai_date_return .= " " . $monthTH_brev[date("n", $time)];
  $thai_date_return .= " " . (date("Y", $time) + 543);
  $thai_date_return .= " " . date("H:i:s", $time);
  return $thai_date_return;
}
function thai_date_short($time)
{   // 19  ธ.ค. 2556a
  global $dayTH, $monthTH_brev;
  $thai_date_return = date("j", $time);
  $thai_date_return .= " " . $monthTH_brev[date("n", $time)];
  $thai_date_return .= " " . (date("Y", $time) + 543);
  return $thai_date_return;
}
function thai_date_fullmonth($time)
{   // 19 ธันวาคม 2556
  global $dayTH, $monthTH;
  $thai_date_return = date("j", $time);
  $thai_date_return .= " " . $monthTH[date("n", $time)];
  $thai_date_return .= " " . (date("Y", $time) + 543);
  return $thai_date_return;
}
function thai_date_short_number($time)
{   // 19-12-56
  global $dayTH, $monthTH;
  $thai_date_return = date("d", $time);
  $thai_date_return .= "-" . date("m", $time);
  $thai_date_return .= "-" . substr((date("Y", $time) + 543), -2);
  return $thai_date_return;
}
?>

<!-- Disabled Link Underline -->
<style>
  a:link {
    text-decoration: none;
  }

  a:visited {
    text-decoration: none;
  }

  a:hover {
    text-decoration: none;
  }

  a:active {
    text-decoration: none;
  }
</style>




<nav class="main-header navbar navbar-expand navbar-light" style="background-color: #153D77;">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link text-white" data-widget="pushmenu" href="#"><i class="fas fa-align-justify"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
        <i class="fa fa-th-large text-white"></i>
      </a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->
<aside class="main-sidebar sidebar-light-dark elevation-4">
  <!-- Brand Logo -->
  <a href="" class="brand-link" style="background-color: #153D77;">
    <img src="../../dist/img/nso_logo.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
    <span class="brand-text font-weight-light text-white">ระบบจองยานพาหนะ</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <!-- <img src="../../dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image"> -->
      </div>
      <div class="info">
        <!-- ดึงชื่อผู้ใช้งานออกมาแสดงที่ Sidebar -->

        <a href="#" class="d-block"><?php echo $_SESSION['prefix'] . ' ' . $_SESSION['first_name'] . ' ' . $_SESSION['last_name']; ?></a>
        <?php // print_r($_SESSION['prefix']); 
        ?>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="../dashboard" class="nav-link <?php echo $name == 'dashboard' ? 'active' : '' ?>">
            <i class="fas fa-home nav-icon"></i>
            <p>หน้าหลัก</p>
          </a>
        </li>

        <!-- <li class="nav-header">เมนูหลัก</li> -->
        <li class="nav-item">
          <a href="../booking" class="nav-link <?php echo isActive('booking') ?>">
            <i class="fas fa-edit nav-icon"></i>
            <p>จองยานพาหนะ</p>
            <?php if ($_SESSION['status'] == 'admin' || $_SESSION['status'] == 'superadmin') { ?>
              <small class="badge rounded-pill bg-danger"><?php echo $row_count . " " . "รายการ" ?></small>
            <?php } else { ?>
              <small class="badge rounded-pill bg-danger"><?php echo $rowc_user . " " . "รายการ" ?></small>
            <?php } ?>
          </a>
        </li>

        <?php if ((isset($_SESSION['status'])) && $_SESSION['status'] == 'admin' || $_SESSION['status'] == 'superadmin') { ?>
          <li class="nav-item">
            <a href="../addcars" class="nav-link <?php echo isActive('addcars') ?>">
              <i class="fas fa-plus-circle nav-icon"></i>
              <p>เพิ่มข้อมูลยานพาหนะ</p>
            </a>
          </li>
        <?php } ?>


        <?php if ($_SESSION['status'] == 'admin' || $_SESSION['status'] == 'superadmin') { ?>
          <li class="nav-item">
            <a href="../vehicle_assign" class="nav-link <?php echo isActive('vehicle_assign') ?>">
              <i class="fas fa-list-alt nav-icon"></i>
              <p>รายการรออนุมัติ (Addcars)</p>
              <small class="badge rounded-pill bg-danger"><?php echo $row_assign . " " . "รายการ" ?></small>
            </a>
          </li>
        <?php } ?>


        <?php if ($_SESSION['status'] == 'admin' || $_SESSION['status'] == 'superadmin') { ?>
          <li class="nav-item">
            <a href="../approve" class="nav-link <?php echo isActive('approve') ?>">
              <i class="fas fa-clipboard-check nav-icon"></i>
              <p>รายการรออนุมัติ
                <small class="badge rounded-pill bg-danger"><?php echo $rowc_app . " " . "รายการ" ?></small>
              </p>
            </a>
          </li>
        <?php } ?>

        <li class="nav-item">
          <a href="../reports" class="nav-link <?php echo isActive('reports') ?>">
            <i class="fas fa-file-download nav-icon"></i>
            <p>รายงาน
              <!-- <small class="badge rounded-pill bg-danger"><?php echo $rowc_app . " " . "รายการ" ?></small> -->
            </p>
          </a>
        </li>


        <li class="nav-header">บัญชีผู้ใช้งาน</li>
        <li class="nav-item">
          <a href="../account" class="nav-link <?php echo isActive('account') ?>">
            <i class="fas fa-users-cog nav-icon"></i>
            <?php if ($_SESSION['status'] == 'admin' || $_SESSION['status'] == 'superadmin') { ?>
              <p>การจัดการผู้ใช้งาน</p>
            <?php } else { ?>
              <p>แก้ไขรหัสผู้ใช้งาน</p>
            <?php } ?>
          </a>
        </li>

        <!-- <li class="nav-header">Account Settings</li> -->
        <li class="nav-item">
          <a href="../../logout.php" class="nav-link text-danger">
            <i class="fas fa-sign-out-alt"></i>
            <p>ออกจากระบบ</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>