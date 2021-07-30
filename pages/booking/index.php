<?php include_once('../authen.php');

// Query Admin Session
$sql = "SELECT b.*,a.first_name, a.last_name
            FROM booking AS b
            INNER JOIN admin as a ON b.user_id=a.id
            ORDER BY b.id ASC";

$result = $conn->query($sql);
$count = mysqli_num_rows($result);

// Query User Session
$sql_user = "SELECT * FROM `booking`
                 WHERE `user_id` = '" . $_SESSION['authen_id'] . "'";

$result_user = $conn->query($sql_user);
$count = mysqli_num_rows($result_user);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ระบบจองยานพาหนะ</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../assets/js/main.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
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
                            <h5 class="m-0 text-dark">จองยานพาหนะ</h5>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../dashboard">หน้าหลัก</a></li>
                                <li class="breadcrumb-item active">จองยานพาหนะ</li>
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

                            <div class="card card shadow" style="overflow-x:auto;">
                                <div class="card-header">
                                    <span class="float-start fs-5" style="line-height: 3.0rem"> <i class="fas fa-th-list"></i>&nbsp;&nbsp;รายการจองทั้งหมด</span>

                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <div class="btn-group-add float-end" style="line-height: 3.5rem">
                                                <a href="form-create.php">
                                                    <button class="btn"><span class="fw-bolder"><i class="fas fa-plus-circle"></i> กรุงเทพฯ และปริมณฑล</span></button>
                                                </a>
                                                <a href="#">
                                                    <button class="btn"><span class="fw-bolder"><i class="fas fa-plus-circle"></i> ต่างจังหวัด</span></button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->

                                <div class="card-body" style="overflow-x:auto;">

                                    <!-- SESSION Superadmin & Admin -->
                                    <?php if (isset($_SESSION['status']) && $_SESSION['status'] == "superadmin") { ?>
                                        <div class="table-responsive">
                                            <table id="BookingTable" class="display table table-bordered table-hover">
                                                <thead class="text-center">
                                                    <tr class="table-primary">
                                                        <th>หมายเลขการจอง</th>
                                                        <th>ชื่อ-นามสกุล</th>
                                                        <th>สถานที่</th>
                                                        <th>วันที่จอง</th>
                                                        <th>การจัดการ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $num = 0;
                                                    while ($row = $result->fetch_assoc()) {
                                                        $num++;
                                                    ?>

                                                        <tr>
                                                            <td align="center"><?php echo $num; ?></td>
                                                            <td><?php echo  $row['first_name'] . "&nbsp;&nbsp;&nbsp;&nbsp;" . $row['last_name']; ?></td>
                                                            <td><?php echo  $row['place']; ?></td>
                                                            <td><?php echo thai_date_fullmonth(strtotime($row['date_start'])) . ' ' . '-' . ' ' . thai_date_fullmonth(strtotime($row['date_end'])); ?></td>
                                                            <td align="center">

                                                                <a href="form-edit.php?id=<?php echo $row['id']; ?>" class="btn-action btn btn-sm btn-warning">
                                                                    <i class="fas fa-edit"></i> จัดการ
                                                                </a>
                                                                <a href="../form3/index.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success btn-action">
                                                                    <i class="fas fa-print"></i> พิมพ์
                                                                </a>
                                                                <a href="form-edit.php?id=<?php echo $id; ?>" class="btn-action btn btn-sm btn-secondary text-white">
                                                                    <i class="fas fa-edit"></i> ยกเลิก
                                                                </a>
                                                                <a href="#" onclick="deleteItem(<?php echo $id; ?>);" class="btn-action btn btn-sm btn-danger">
                                                                    <i class="fas fa-trash-alt"></i> ลบ
                                                                </a>

                                                            </td>
                                                        </tr>

                                                    <?php } ?>

                                                </tbody>
                                                <tfoot>
                                                    <tr class="table table-sm table-light text-center">
                                                        <th><small class="fw-light text-muted">หมายเลขการจอง</small></th>
                                                        <th><small class="fw-light text-muted">ชื่อ-นามสกุล</small></th>
                                                        <th><small class="fw-light text-muted">สถานที่</small></th>
                                                        <th><small class="fw-light text-muted">วันที่จอง</small></th>
                                                        <th><small class="fw-light text-muted">การจัดการ</small></th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>

                                        <!-- SESSION User -->
                                    <?php } else { ?>
                                        <!-- <div class="table-responsive"> -->
                                        <table id="BookingTable" class="display table table-bordered table-hover">
                                            <thead>
                                                <tr class="table-primary">
                                                    <th>ลำดับที่</th>
                                                    <th>หมายเลขการจอง</th>
                                                    <th>สถานที่</th>
                                                    <th>สถานะ</th>
                                                    <th>วันที่ทำรายการ</th>
                                                    <th>วันที่จอง</th>
                                                    <th>การจัดการ</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $num_user = 0;
                                                while ($row_user = $result_user->fetch_assoc()) {
                                                    $num_user++;
                                                ?>

                                                    <tr>
                                                        <td><?php echo $num_user; ?></td>
                                                        <td><?php echo $row_user['id']; ?></td>
                                                        <td><?php echo $row_user['place']; ?></td>
                                                        <td>

                                                            <?php if ($row_user['status'] == 'true') { ?>
                                                                <a data-toggle="modal" data-target="#modalstatus<?php echo $num_user ?>" href="">
                                                                    <p style="font-size:1.1rem;"><span class="badge rounded-pill bg-info"><i class="fa fa-spinner"></i> <?php echo 'กำลังดำเนินการ' ?></span></p>
                                                                </a>
                                                            <?php } elseif ($row_user['status'] == 'false') { ?>
                                                                <a data-toggle="modal" data-target="#modalstatus<?php echo $num_user ?>" href="">
                                                                    <p style="font-size:1.1rem;"><span class="badge rounded-pill bg-danger"><i class="fa fa-times-circle"></i> <?php echo 'ไม่อนุมัติ' ?></span></p>
                                                                </a>
                                                            <?php } elseif ($row_user['status'] == 'success') { ?>
                                                                <a data-toggle="modal" data-target="#modalstatus<?php echo $num_user ?>" href="">
                                                                    <p style="font-size:1.1rem;"><span class="badge rounded-pill bg-success"><i class="fa fa-hourglass-start"></i> <?php echo 'อนุมัติแล้ว' ?></span></p>
                                                                </a>
                                                            <?php } else { ?>
                                                                <a a data-toggle="modal" data-target="#modalstatus<?php echo $num_user ?>" href="">
                                                                    <p style="font-size:1.1rem;"><span class="badge rounded-pill bg-warning"><i class="fa fa-hourglass-start"></i> <?php echo 'รออนุมัติ' ?></span></p>
                                                                </a>
                                                            <?php } ?>

                                                        </td>

                                                        <td><?php
                                                            $date_created = $row_user['created_at'];
                                                            echo thai_date_and_time(strtotime($date_created)) . " " . 'น.'; ?></td>

                                                        <td><?php echo thai_date_fullmonth(strtotime($row_user['date_start'])); ?></td>
                                                        <td align="center">

                                                            <a href="form-edit.php?id=<?php echo $row_user['id']; ?>" class="btn btn-sm btn-warning btn-action">
                                                                <i class="fas fa-edit"></i> จัดการ
                                                            </a>

                                                            <a href="../form3/index.php?id=<?php echo $row_user['id']; ?>" class="btn btn-sm btn-success btn-action">
                                                                <i class="fas fa-print"></i> พิมพ์
                                                            </a>

                                                            <?php if ($row_user['status'] == 'wait') { ?>

                                                                <a href="#" onclick="deleteItem(<?php echo $id; ?>);" class="btn btn-sm btn-danger btn-action">
                                                                    <i class="fas fa-trash-alt"></i> ลบ
                                                                </a>

                                                            <?php } ?>

                                                        </td>
                                                    </tr>


                                                    <!-- Section Modal -->
                                                    <section class="modal fade" id="modalstatus<?php echo $num_user ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                                            <div class="modal-content">
                                                                <!-- Modal Body -->
                                                                <div class="modal-body">
                                                                    <div class="container mt-3">
                                                                        <div class="row">
                                                                            <div class="col-sm">
                                                                                เริ่มต้นการจอง
                                                                            </div>
                                                                            <div class="col-sm text-center">
                                                                                กลุ่มช่วยอำนวยการ
                                                                            </div>
                                                                            <div class="col-sm text-right">
                                                                                หมวดยานพาหนะ
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="mt-2 py-3">
                                                                        <?php if ($row_user['status'] == 'wait') { ?>
                                                                            <div class="progress">
                                                                                <div class="progress-bar bg-warning progress-bar-animated progress-bar-striped" role="progressbar" style="width: 25%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">25%</div>
                                                                            </div>
                                                                            <p><code>รออนุมัติจากกลุ่มช่วยฯ</code></p>
                                                                        <?php } elseif ($row_user['status'] == 'true') { ?>
                                                                            <div class="progress">
                                                                                <div class="progress-bar bg-info progress-bar-animated progress-bar-striped" role="progressbar" style="width: 75%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">75%</div>
                                                                            </div>
                                                                            <p><code>กลุ่มช่วยฯ อนุมัติคำขอแล้ว</code></p>
                                                                        <?php } elseif ($row_user['status'] == 'success') { ?>
                                                                            <div class="progress">
                                                                                <div class="progress-bar bg-success progress-bar-animated progress-bar-striped" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">100%</div>
                                                                            </div>
                                                                            <p><code>อนุมัติแล้ว</code></p>
                                                                        <?php } ?>
                                                                    </div>

                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                    </section>
                                                    <!-- End Modal -->

                                                <?php
                                                } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr class="table table-sm table-light text-center">
                                                    <th><small class="fw-light text-muted">ลำดับที่</small></th>
                                                    <th><small class="fw-light text-muted">หมายเลขการจอง</small></th>
                                                    <th><small class="fw-light text-muted">สถานที่</small></th>
                                                    <th><small class="fw-light text-muted">สถานะ</small></th>
                                                    <th><small class="fw-light text-muted">วัน-ที่ทำรายการ</small></th>
                                                    <th><small class="fw-light text-muted">วันที่จอง</small></th>
                                                    <th><small class="fw-light text-muted">การจัดการ</small></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <!-- </div>  -->
                                    <?php } ?>

                                </div> <!-- /.card-body -->

                            </div> <!-- /.card -->

                        </div>
                    </div>
                </div>
            </section> <!-- /.content -->
        </div> <!-- /.content-wrapper -->

        <div class="to-top">
            <i class="fa fa-angle-up" aria-hidden="true"></i>
        </div>

        <!-- footer -->
        <?php include_once('../includes/footer.php') ?>
    </div> <!-- ./wrapper -->

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
    <!-- Main js-files -->
    <script src="../../assets/js/main.js"></script>
    <!-- Datatable -->
    <script src="../../plugins/datatables_new/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables_new/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables_new/dataTables.select.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>

    <script>
        $(document).ready(function() {
            $('#BookingTable').DataTable({
                language: {
                    "decimal": "",
                    "emptyTable": "ไม่มีข้อมูล",
                    "info": "แสดง _START_ - _END_ จากทั้งหมด _TOTAL_ รายการ",
                    "infoEmpty": "Showing 0 to 0 of 0 entries",
                    "infoFiltered": "(filtered from _MAX_ total entries)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "แสดง _MENU_ รายการ",
                    "loadingRecords": "Loading...",
                    "processing": "Processing...",
                    "search": "ค้นหา:",
                    "zeroRecords": "No matching records found",
                    "paginate": {
                        "first": "First",
                        "last": "Last",
                        "next": "ถัดไป",
                        "previous": "ก่อนหน้า"
                    },
                    "aria": {
                        "sortAscending": ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
                }
            });
        });
    </script>


</body>

</html>