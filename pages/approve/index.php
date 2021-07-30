<?php include_once('../authen.php');


$sqlapp =   "SELECT a.first_name, a.last_name, b.* FROM admin a
            INNER JOIN booking b ON a.id = b.user_id
            WHERE b.status = 'true' OR b.status = 'success'     
            ORDER BY b.id ASC";

$resultapp = $conn->query($sqlapp);


$sqlpass = "SELECT booking.*, admin.*, passenger.* FROM booking, admin, passenger
            WHERE 1 
            AND booking.user_id = admin.id  
            AND passenger.b_id = booking.id
            ORDER BY booking.id ASC";

$resultpass = $conn->query($sqlpass);
$rowpass = $resultpass->fetch_assoc();


// // ข้อมูลคน + คนขับรถ
// $sqlcheck = "SELECT * FROM booking
//             LEFT JOIN addcars ON booking.id = addcars.booking_id
//             LEFT JOIN cars_list ON addcars.car_id = cars_list.car_id
//             LEFT JOIN drivers_list ON addcars.driver_id = drivers_list.driver_id 
//             ";


// $resultcheck = $conn->query($sqlcheck) or die($conn->error);

//             while($rowcheck = $resultcheck->fetch_assoc()) {
//                 $car_regis[] = $rowcheck['car_regis'];
//                 $driver_name[] = $rowcheck['name'];
//             }


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
            <!-- Top Header && Breadcrumb -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h5 class="m-0 text-dark">รายการจองในระบบ</h5>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../dashboard">หน้าหลัก</a></li>
                                <li class="breadcrumb-item active">รายการรออนุมัติ</li>
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
                                <div class="card-header border-0">
                                    <span class="float-start fs-5" style="line-height: 3.0rem"> <i class="fas fa-th-list"></i>&nbsp;&nbsp; รายการรออนุมัติ</span>
                                </div>

                                <div class="card-body" style="overflow-x:auto;">
                                    <div class="table-responsive">
                                        <table id="vehicleTable" class="display table table-bordered table-hover">
                                            <thead>
                                                <tr class="table-primary text-center">
                                                    <th>ลำดับที่</th>
                                                    <th>เลขที่รายการจอง</th>
                                                    <th>ชื่อ - นามสกุล</th>
                                                    <th>หมายเลขโทรศัพท์ภายใน</th>
                                                    <th>สถานะ</th>
                                                    <th>การจัดการ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $num = 0;
                                                while ($row = $resultapp->fetch_assoc()) {
                                                    $num++;
                                                ?>
                                                    <tr>
                                                        <td class="align-middle text-center"><?php echo $num; ?></td>
                                                        <td class="align-middle text-center"><?php echo $row['id']; ?></td>
                                                        <td class="align-middle"><?php echo $row['first_name'] . '&nbsp;&nbsp;&nbsp;&nbsp;' . $row['last_name']; ?></td>
                                                        <td class="align-middle text-center"><?php echo $row['phonenum']; ?></td>
                                                        <td class="align-middle text-center">

                                                            <?php if ($row['status'] == 'true') { ?>
                                                                <p style="font-size:1.1rem;"><span class="badge rounded-pill bg-warning"><i class="fa fa-hourglass-start"></i> <?php echo 'รออนุมัติ' ?></span></p>
                                                            <?php } elseif ($row['status'] == 'false') { ?>
                                                                <p style="font-size:1.1rem;"><span class="badge rounded-pill bg-success"><i class="fa fa-times-circle"></i> <?php echo 'อนุมัติแล้ว' ?></span></p>
                                                            <?php } else { ?>
                                                                <p style="font-size:1.1rem;"><span class="badge rounded-pill bg-danger"><i class="fa fa-hourglass-start"></i> <?php echo 'ไม่อนุมัติ' ?></span></p>
                                                            <?php } ?>

                                                        </td>

                                                        <td class="align-middle text-center">
                                                            <button type="button" class="btn btn-sm btn-info btn-action" data-bs-toggle="modal" data-bs-target="#modalapp<?php echo $row['id'] ?>">
                                                                <i class="fas fa-search"></i> เรียกดู
                                                            </button>

                                                            <a href="form-edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success btn-action">
                                                                <i class="fas fa-edit"></i> จัดการ
                                                            </a>

                                                            <!-- <a href="form-approve_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning btn-action">
                                                            <i class="fas fa-edit"></i> แก้ไข
                                                          </a>  -->

                                                            <a href="#" onclick="deleteItem(<?php echo $row['id']; ?>);" class="btn btn-sm btn-danger btn-action">
                                                                <i class="fas fa-trash-alt"></i> ลบ
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    <!-- Section Modal -->
                                                    <?php
                                                    $sql_pass = "SELECT * FROM passenger WHERE b_id = '" . $row['id'] . "' ";
                                                    $result_pass = $conn->query($sql_pass);
                                                    $row_countpassenger = mysqli_num_rows($result_pass);

                                                    // ข้อมูลคน + คนขับรถ
                                                    $sql_check = "SELECT * FROM addcars WHERE booking_id = '" . $row['id'] . "' ";
                                                    $result_check = $conn->query($sql_check) or die($conn->error);
                                                    $row_count = mysqli_num_rows($result_check);


                                                    ?>
                                                    <section class="modal fade text-left" id="modalapp<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <span class="modal-title fs-6 fw-normal" id="exampleModalLabel"><i class="fas fa-th-list"></i>&nbsp;&nbsp;รายละเอียดข้อมูลการจอง</span>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card-body px-5">
                                                                        <div class="row mb-2">
                                                                            <p class="col-xl-4 text-muted">หมายเลขการจอง <br> (bookingID) :</p>
                                                                            <div class="col-xl-8">
                                                                                <span class="btn btn-outline-success fs-6"><i class="fas fa-address-card"></i> <?php echo $row['id'] ?> </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-2">
                                                                            <p class="col-xl-4 text-muted">สถานะ :</p>
                                                                            <div class="col-xl-8">
                                                                                <?php if ($row['status'] == 'true') { ?>
                                                                                    <p style="font-size:1.1rem;"><span class="badge rounded-pill bg-warning fs-6"><i class="fa fa-hourglass-start"></i> <?php echo 'รออนุมัติ' ?></span></p>
                                                                                <?php } elseif ($row['status'] == 'false') { ?>
                                                                                    <p style="font-size:1.1rem;"><span class="badge rounded-pill bg-success fs-6"><i class="fa fa-times-circle"></i> <?php echo 'อนุมัติแล้ว' ?></span></p>
                                                                                <?php } else { ?>
                                                                                    <p style="font-size:1.1rem;"><span class="badge rounded-pill bg-danger fs-6"><i class="fa fa-hourglass-start"></i> <?php echo 'ไม่อนุมัติ' ?></span></p>
                                                                                <?php } ?>
                                                                                <!-- <span class="badge rounded-pill bg-success"> รออนุมัติ</span> -->
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-2">
                                                                            <p class="col-xl-4 text-muted">ยานพาหนะ | ผู้ขับขี่ยานพาหนะ :</p> <?php //echo $row_count  
                                                                                                                                                ?>
                                                                            <div class="col-xl-8">
                                                                                <!-- <span class="">  -->
                                                                                <?php
                                                                                $numshow = 0;
                                                                                while ($rowshowcar = $result_check->fetch_assoc()) {
                                                                                    $numshow++;
                                                                                ?>

                                                                                    <span class="badge rounded-pill bg-light fs-6 fw-normal mb-2"><i class="fas fa-bus-alt"></i> <?php echo $rowshowcar['regis_car'] . " " . " | " . " " . '<i class="fas fa-user-alt"></i>' . " " . $rowshowcar['name_driver'] ?></span> </br>
                                                                                    <!-- <span class="badge rounded-pill bg-light fs-6 fw-normal"><i class="fas fa-bus-alt"></i> <?php //echo $rowshowcar['name_driver'] 
                                                                                                                                                                                    ?></span> -->

                                                                                    <!-- </span> -->
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-2 mt-4">
                                                                            <p class="col-xl-4 text-muted">ชื่อ-นามสกุล ผู้ทำรายการ :</p>
                                                                            <div class="col-xl-8">
                                                                                <span class="fs-6"> <?php echo $_SESSION['prefix'] . ' ' . $row['first_name'] . ' ' . $row['last_name']; ?></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-2">
                                                                            <p class="col-xl-4 text-muted">หน่วยงานที่สังกัด :</p>
                                                                            <div class="col-xl-8">
                                                                                <span class="fs-6"> <?php echo $row['department'] ?> </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-2">
                                                                            <p class="col-xl-4 text-muted">หมายเลขโทรศัพท์ภายใน :</p>
                                                                            <div class="col-xl-8">
                                                                                <span class="fs-6"> <?php echo $row['phonenum'] ?> </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-2">
                                                                            <p class="col-xl-4 text-muted">วัตถุประสงค์ที่ขอใช้รถ :</p>
                                                                            <div class="col-xl-8">
                                                                                <span class="fs-6"> <?php echo strip_tags($row['purpose']) ?> </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-2">
                                                                            <p class="col-xl-4 text-muted">สถานที่ :</p>
                                                                            <div class="col-xl-8">
                                                                                <span class="fs-6"> <?php echo $row['place'] ?> </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-2">
                                                                            <p class="col-xl-4 text-muted">วันที่เริ่มต้น :</p>
                                                                            <div class="col-xl-8">
                                                                                <span class="fs-6"> <?php $datestart = $row['date_start'];
                                                                                                    echo thai_date_and_time(strtotime($datestart)) . " " . 'น.'; ?> </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-2">
                                                                            <p class="col-xl-4 text-muted">วันที่สิ้นสุด :</p>
                                                                            <div class="col-xl-8">
                                                                                <span class="fs-6"> <?php $dateend = $row['date_end'];
                                                                                                    echo thai_date_and_time(strtotime($dateend)) . " " . 'น.'; ?> </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-2">
                                                                            <p class="col-xl-4 text-muted">จำนวนผู้ร่วมเดินทาง :</p>
                                                                            <div class="col-xl-8">
                                                                                <span class="fs-6"> <?php echo $row_countpassenger; ?> คน </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-2">
                                                                            <p class="col-xl-4 text-muted">ผู้ร่วมเดินทาง :</p>
                                                                            <div class="col-xl-8">

                                                                                <?php
                                                                                $num_pass = 0;
                                                                                while ($row_pass = $result_pass->fetch_assoc()) {
                                                                                    $num_pass++;
                                                                                ?>
                                                                                    <ul>
                                                                                        <li class=""><span class="fs-6 fw-light"> <?php echo $row_pass['name']; ?></span>
                                                                                    </ul>

                                                                                <?php } ?>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer text-center">

                                                                    <!-- <button type="button" class="btn btn-primary text-start">Save changes</button> -->
                                                                    <button type="button" class="btn btn-danger btn-sm btn-action" data-bs-dismiss="modal">ปิด</button>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section> <!-- /End Modal -->

                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr class="table table-sm table-light text-center">
                                                    <th><small class="fw-light text-muted">ลำดับที่</small></th>
                                                    <th><small class="fw-light text-muted">เลขที่รายการจอง</small></th>
                                                    <th><small class="fw-light text-muted">ชื่อ - นามสกุล</small></th>
                                                    <th><small class="fw-light text-muted">หมายเลขโทรศัพท์ภายใน</small></th>
                                                    <th><small class="fw-light text-muted">สถานะ</small></th>
                                                    <th><small class="fw-light text-muted">การจัดการ</small></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div> <!-- /.card-body -->
                            </div> <!-- /.card -->

                        </div>
                    </div>
                </div>
            </section> <!-- /.content -->
        </div> <!-- /.content-wrapper -->
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
    <script src="../../plugins/datatables_new/dataTables.select.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>


    <script>
        // datatable cars
        $(document).ready(function() {
            $('#vehicleTable').DataTable({
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


    <script>
        function deleteItem(id) {
            if (confirm('Are you sure, you want to delete this item?') == true) {
                window.location = `delete.php?id=${id}`;
                // window.location='delete.php?id='+id;
            }
        };
    </script>

</body>

</html>