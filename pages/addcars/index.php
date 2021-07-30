<?php include_once('../authen.php');
$sql = "SELECT * FROM `cars_list`";
$result = $conn->query($sql);
// print_r($result);

$sql1 = "SELECT * FROM `drivers_list`";
$result1 = $conn->query($sql1);
// print_r($result1);
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

            <!-- Section content -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h5 class="m-0 text-dark">เพิ่มข้อมูลยานพาหนะ | ผู้ขับขี่ยานพาหนะ</h5>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../dashboard">หน้าหลัก</a></li>
                                <li class="breadcrumb-item active">เพิ่มข้อมูลยานพาหนะ | ผู้ขับขี่ยานพาหนะ</li>
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




                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><span class="fw-normal"> รายการข้อมูลยานพาหนะ</span></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"><span class="fw-normal"> รายการข้อมูลผู้ขับขี่ยานพาหนะ</span></button>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">

                                <!-- Cars-List -->
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="card mt-4">
                                        <div class="card-header">
                                            <div class="btn-group-add float-end" style="line-height: 3.5rem">
                                                <a href="form-addcar.php">
                                                    <button class="btn"><span class="fw-bolder"><i class="fas fa-plus-circle"></i> เพิ่มข้อมูลยานพาหนะ</span></button>
                                                </a>

                                            </div>

                                            <span class="float-start fs-5" style="line-height: 3.0rem"> <i class="fas fa-th-list"></i>&nbsp;&nbsp; รายการข้อมูลยานพาหนะ</span>
                                        </div>

                                        <!-- Datatable #1_CarsTable -->
                                        <div class="card-body table-responsive style=" overflow-x:auto;">
                                            <div class="table-responsive">
                                                <table id="CarsTable" class="display table table-bordered table-hover">
                                                    <thead>
                                                        <tr class="table-primary text-center">
                                                            <th>ลำดับที่</th>
                                                            <th>หมายเลขทะเบียน</th>
                                                            <th>ยี่ห้อ</th>
                                                            <th>สถานะ</th>
                                                            <th>การจัดการ</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php
                                                        $num = 0;
                                                        while ($row = $result->fetch_assoc()) {
                                                            $num++;
                                                        ?>

                                                            <tr class="text-center">
                                                                <td class="align-middle"><?php echo $num; ?></td>
                                                                <td class="align-middle"><?php echo $row['car_regis']; ?></td>
                                                                <td class="align-middle"><?php echo $row['car_brand']; ?></td>
                                                                <td class="align-middle">

                                                                    <?php if ($row['car_status'] == 'online') { ?>
                                                                        <p style="font-size:1.1rem;"><span class="badge rounded-pill bg-success"><i class="fa fa-check-circle"></i> <?php echo 'พร้อมใช้งาน' ?></span></p>
                                                                    <?php } else { ?>
                                                                        <p style="font-size:1.1rem;"><span class="badge rounded-pill bg-danger"><i class="fa fa-times-circle"></i> <?php echo 'ไม่พร้อมใช้งาน' ?></span></p>
                                                                    <?php } ?>

                                                                </td>

                                                                <td class="align-middle">
                                                                    <a href="" class="btn-action btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modalcar<?php echo $num ?>">
                                                                        <i class="fas fa-search"></i> ดูข้อมูล
                                                                    </a>

                                                                    <a href="form-edit.php?id=<?php echo $row['car_id'] ?>" class="btn-action btn btn-sm btn-warning">
                                                                        <i class="fas fa-edit"></i> แก้ไข
                                                                    </a>


                                                                    <a href="#" onclick="deleteItem(<?php echo $id; ?>);" class="btn-action btn btn-sm btn-danger">
                                                                        <i class="fas fa-trash-alt"></i> ลบ
                                                                    </a>

                                                                </td>
                                                            </tr>

                                                            <!-- Section Modal Cars-->
                                                            <section class="modal fade" id="modalcar<?php echo $num ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header" style="background-color: #BBD7FC;">
                                                                            <h6 class="modal-title fw-bolder" id="exampleModalLabel"><i class="fas fa-list"></i>&nbsp;&nbsp;ข้อมูลยานพาหนะ</h6>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <ul class="list-group list-group-flush">
                                                                                        <li class="list-group-item"><span class="badge bg-light text-wrap fs-6 fw-bolder" style="width: 10rem; height: 1.8rem;">หมายเลขทะเบียน :</span> </li>
                                                                                        <li class="list-group-item"><span class="badge bg-light text-wrap fs-6 fw-boldel" style="width: 10rem; height: 1.8rem;">ยี่ห้อยานพาหนะ :</span> </li>
                                                                                        <li class="list-group-item"><span class="badge bg-light text-wrap fs-6 fw-bolder" style="width: 10rem; height: 1.8rem;">สถานะ :</span> </li>
                                                                                    </ul>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <ul class="list-group list-group-flush">
                                                                                        <li class="list-group-item"><span class="badge text-wrap text-dark fs-6 fw-light" style="width: 10rem; height: 1.8rem;"><?php echo $row['car_regis']; ?></span></li>
                                                                                        <li class="list-group-item"><span class="badge text-wrap text-dark fs-6 fw-light" style="width: 10rem; height: 1.8rem;"><?php echo $row['car_brand']; ?></span></li>
                                                                                        <li class="list-group-item">
                                                                                            <span class="badge text-wrap text-dark fs-6 fw-light" style="width: 10rem; height: 1.8rem;">

                                                                                                <?php if ($row['car_status'] == 'online') { ?>
                                                                                                    <p style="font-size:1.1rem;"><span class="badge rounded-pill bg-success"><i class="fa fa-check-circle"></i> <?php echo 'พร้อมใช้งาน' ?></span></p>
                                                                                                <?php } else { ?>
                                                                                                    <p style="font-size:1.1rem;"><span class="badge rounded-pill bg-danger"><i class="fa fa-times-circle"></i> <?php echo 'ไม่พร้อมใช้งาน' ?></span></p>
                                                                                                <?php } ?>

                                                                                            </span>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="modal-footer bg-light">
                                                                            <button type="button" class="btn btn-danger btn-sm btn-action" data-bs-dismiss="modal">ปิด</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section> <!-- /End Modal Cars-->

                                                        <?php } ?>

                                                    </tbody>

                                                    <tfoot>
                                                        <tr class="table table-sm table-light text-center">
                                                            <th><small class="fw-light text-muted">ลำดับที่</small></th>
                                                            <th><small class="fw-light text-muted">หมายเลขทะเบียน</small></th>
                                                            <th><small class="fw-light text-muted">ยี่ห้อ</small></th>
                                                            <th><small class="fw-light text-muted">สถานะ</small></th>
                                                            <th><small class="fw-light text-muted">การจัดการ</small></th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div> <!-- /.card-body table-responsive -->
                                    </div> <!-- /.card mt-4 -->
                                </div> <!-- /.tab-pane fade -->



                                <!-- Driver-List -->
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="card card shadow mt-4">
                                        <div class="card-header">
                                            <div class="btn-group-add float-right" style="line-height: 3.5rem">
                                                <a href="form-adddriver.php">
                                                    <button class="btn"><span class="fw-bolder"><i class="fas fa-plus-circle"></i> เพิ่มข้อมูลผู้ขับขี่ยานพาหนะ</span></button>
                                                </a>
                                            </div>
                                            <span class="float-start fs-5" style="line-height: 3.0rem"><i class="fas fa-th-list"></i>&nbsp;&nbsp; รายการข้อมูลผู้ขับขี่ยานพาหนะ</span>
                                        </div>

                                        <!-- Datatable #2_DriversTable-->
                                        <div class="card-body table-responsive style=" overflow-x:auto;">
                                            <div class="table-responsive">
                                                <table id="DriversTable" class="display table table-bordered table-hover">
                                                    <thead>
                                                        <tr class="table-primary text-center">
                                                            <th>ลำดับที่</th>
                                                            <th>ชื่อ - นามสกุล</th>
                                                            <th>หมายเลขโทรศัพท์</th>
                                                            <th>สถานะ</th>
                                                            <th>การจัดการ</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php
                                                        $num1 = 0;
                                                        while ($rowdriver = $result1->fetch_assoc()) {
                                                            $num1++;
                                                        ?>

                                                            <tr>
                                                                <td class="align-middle text-center"><?php echo $num1; ?></td>
                                                                <td class="align-middle"><?php echo $rowdriver['name']; ?></td>
                                                                <td class="align-middle text-center"><?php echo $rowdriver['phone']; ?></td>
                                                                <td class="align-middle text-center">

                                                                    <?php if ($rowdriver['driver_status'] == 'online') { ?>
                                                                        <p style="font-size:1.1rem;"><span class="badge rounded-pill bg-success"><i class="fa fa-check-circle"></i> <?php echo 'พร้อมใช้งาน' ?></span></p>
                                                                    <?php } else { ?>
                                                                        <p style="font-size:1.1rem;"><span class="badge rounded-pill bg-danger"><i class="fa fa-times-circle"></i> <?php echo 'ไม่พร้อมใช้งาน' ?></span></p>
                                                                    <?php } ?>

                                                                </td>

                                                                <td class="align-middle text-center">
                                                                    <a href="" class="btn-action btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modaldrivers<?php echo $num1 ?>">
                                                                        <i class="fas fa-search"></i> ดูข้อมูล
                                                                    </a>
                                                                    <a href="form-edit.php?id=<?php echo $rowdriver['driver_id']; ?>" class="btn-action btn btn-sm btn-warning">
                                                                        <i class="fas fa-edit"></i> แก้ไข
                                                                    </a>
                                                                    <a href="#" onclick="deleteItem(<?php echo $rowdriver['driver_id']; ?>);" class="btn-action btn btn-sm btn-danger">
                                                                        <i class="fas fa-trash-alt"></i> ลบ
                                                                    </a>
                                                                </td>
                                                            </tr>

                                                            <!-- Section Modal Drivers-->
                                                            <section class="modal fade" id="modaldrivers<?php echo $num1 ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header" style="background-color: #BBD7FC;">
                                                                            <h6 class="modal-title" id="exampleModalLabel">ข้อมูลผู้ควบคุมยานพาหนะ</h6>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>

                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <ul class="list-group list-group-flush">
                                                                                        <li class="list-group-item"><span class="badge bg-light text-wrap fs-6 fw-bolder" style="width: 10rem; height: 1.8rem;">ชื่อ - นามสกุล :</span> </li>
                                                                                        <li class="list-group-item"><span class="badge bg-light text-wrap fs-6 fw-boldel" style="width: 10rem; height: 1.8rem;">หมายเลขโทรศัพท์ :</span> </li>
                                                                                        <li class="list-group-item"><span class="badge bg-light text-wrap fs-6 fw-bolder" style="width: 10rem; height: 1.8rem;">สถานะ :</span> </li>
                                                                                    </ul>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <ul class="list-group list-group-flush">
                                                                                        <li class="list-group-item"><span class="badge text-wrap text-dark fs-6 fw-light" style="width: 10rem; height: 1.8rem;"><?php echo $rowdriver['name']; ?></span></li>
                                                                                        <li class="list-group-item"><span class="badge text-wrap text-dark fs-6 fw-light" style="width: 10rem; height: 1.8rem;"><?php echo $rowdriver['phone']; ?></span></li>
                                                                                        <li class="list-group-item">
                                                                                            <span class="badge text-wrap text-dark fs-6 fw-light" style="width: 10rem; height: 1.8rem;">

                                                                                                <?php if ($rowdriver['driver_status'] == 'online') { ?>
                                                                                                    <p style="font-size:1.1rem;"><span class="badge rounded-pill bg-success"><i class="fa fa-check-circle"></i> <?php echo 'พร้อมใช้งาน' ?></span></p>
                                                                                                <?php } else { ?>
                                                                                                    <p style="font-size:1.1rem;"><span class="badge rounded-pill bg-danger"><i class="fa fa-times-circle"></i> <?php echo 'ไม่พร้อมใช้งาน' ?></span></p>
                                                                                                <?php } ?>

                                                                                            </span>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer bg-light">
                                                                            <button type="button" class="btn btn-danger btn-sm btn-action" data-bs-dismiss="modal">ปิด</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section> <!-- /End Modal Drivers-->

                                                        <?php } ?>

                                                    </tbody>
                                                    <tfoot>
                                                        <tr class="table table-sm table-light text-center">
                                                            <th><small class="fw-light text-muted">ลำดับที่</small></th>
                                                            <th><small class="fw-light text-muted">ชื่อ - นามสกุล</small></th>
                                                            <th><small class="fw-light text-muted">หมายเลขโทรศัพท์</small></th>
                                                            <th><small class="fw-light text-muted">สถานะ</small></th>
                                                            <th><small class="fw-light text-muted">การจัดการ</small></th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div> <!-- /.card-body table-responsive -->
                                    </div> <!-- /.card mt-4 -->
                                </div> <!-- /.tab-pane fade -->

                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                            </div> <!-- /.tab-content -->
                        </div>
                    </div>
                </div>

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
            $('#CarsTable').DataTable({
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

        // datatable drivers
        $(document).ready(function() {
            $('#DriversTable').DataTable({
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