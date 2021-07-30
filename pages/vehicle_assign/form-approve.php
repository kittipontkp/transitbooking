<?php include_once('../authen.php');



function cars($i)
{

    echo
    '<tr>
        <td>
        <select class="form-control carselect2 " name="cars' . $i . '" id="cars" style="width:100%;">                         
            <option  value="">--เลือกยานพาหนะ--</option>
        </select>
        </td>
        <td>
        <select class="form-control driverselect2" name="drivers' . $i . '" id="drivers" style="width:100%;">                      
              <option  value="">--คนขับยานพาหนะ--</option>
        </select>
        </td>
      </tr>';
}


$id = $_GET['id'];
$sql = "SELECT department	, phonenum, place, purpose, date_start, date_end, status FROM `booking` 
        WHERE `id` = '" . $id . "'";

$result = $conn->query($sql);
$row = $result->fetch_assoc();


// ดึงข้อมูลรถจากฐานข้อมูล
$sqlcar = "SELECT * FROM cars_list
                WHERE `car_status` = 'online'";
$car_result = $conn->query($sqlcar);

$sqldriver = "SELECT * FROM drivers_list
                  WHERE `driver_status` = 'online'";
$driver_result = $conn->query($sqldriver);


// count passenger
$sql_pass = "SELECT * FROM passenger WHERE b_id = '" . $_GET['id'] . "' ";
$result_pass = $conn->query($sql_pass);
$row_countpassenger = mysqli_num_rows($result_pass);




?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ระบบจองยานพาหนะ</title>
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

    <!-- bootstrap-toggle -->
    <link rel="stylesheet" href="../../plugins/ToggleSwitches/css/bootstrap-toggle.min.css">
    <link rel="stylesheet" href="../../plugins/ToggleSwitches/css/switcher.css">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar & Main Sidebar Container -->
        <?php include_once('../includes/sidebar.php') ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h5 class="m-0 text-dark">จัดการข้อมูลยานพาหนะ | ผู้ขับขี่ยานพาหนะ</h5>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../dashboard">หน้าหลัก</a></li>
                                <li class="breadcrumb-item"><a href="../vehicle_assign">การจัดการข้อมูลยานพาหนะ</a></li>
                                <li class="breadcrumb-item active">จัดการข้อมูลยานพาหนะ | ผู้ขับขี่ยานพาหนะ</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>


            <!-- Main content -->
            <section class="content px-3">


                <div class="col-12">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" style="background-color: #B9DCFF;" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    <i class="fas fa-search"></i>&nbsp;&nbsp;
                                    ตรวจสอบข้อมูลรายละเอียดการจองยานพาหนะ
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card border-0">

                                                    <div class="table-responsive p-4" style="overflow-x:auto;">
                                                        <table class="table table-hover">
                                                            <thead>
                                                                <tr class="table-primary">
                                                                    <th width="10%" scope="col">ลำดับ</th>
                                                                    <th width="30%" scope="col">รายการ</th>
                                                                    <th width="60%" scope="col">รายละเอียด</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td scope="row">1</td>
                                                                    <td scope="row" class="fst-italic">วันที่ทำรายการ</td>
                                                                    <td><?php echo thai_date_fullmonth(time()) ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row">2</td>
                                                                    <td scope="row" class="fst-italic">หน่วยงาน</td>
                                                                    <td><?php echo $row['department'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row">3</td>
                                                                    <td scope="row" class="fst-italic">หมายเลขโทรศัพท์ภายใน</td>
                                                                    <td colspan="2"><?php echo $row['phonenum'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row">4</td>
                                                                    <td scope="row" class="fst-italic">ขออนุญาตใช้รถ (สถานที่)</td>
                                                                    <td colspan="2"><?php echo $row['place'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row">5</td>
                                                                    <td scope="row" class="fst-italic">วัตถุประสงค์การเดินทาง</td>
                                                                    <td colspan="2"><?php echo strip_tags($row['purpose']) ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row">6</td>
                                                                    <td scope="row" class="fst-italic">วัน | เวลา เริ่มต้น</td>
                                                                    <td colspan="2"><?php $datestart = $row['date_start'];
                                                                                    echo thai_date_and_time(strtotime($datestart)) . " " . 'น.'; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row">7</td>
                                                                    <td scope="row" class="fst-italic">วัน | เวลา สิ้นสุด</td>
                                                                    <td colspan="2"><?php $dateend = $row['date_end'];
                                                                                    echo thai_date_and_time(strtotime($dateend)) . " " . 'น.'; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row">8</td>
                                                                    <td scope="row" class="fst-italic">จำนวนผู้ร่วมเดินทาง</td>
                                                                    <td colspan="2"><?php echo $row_countpassenger ?> คน</td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row">9</td>
                                                                    <td scope="row" class="fst-italic">รายชื่อผู้ร่วมเดินทาง</td>
                                                                    <td colspan="2">

                                                                        <?php
                                                                        $num_pass = 0;
                                                                        while ($row_pass = $result_pass->fetch_assoc()) {
                                                                            $num_pass++;
                                                                        ?>
                                                                            <ul>
                                                                                <li><?php echo $row_pass['name']; ?></li>
                                                                            </ul>

                                                                        <?php } ?>
                                                                    </td>

                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <?php
                // ทดสอบการเช็ครถที่ถูกเลือกไป

                $d_s = $row['date_start'];
                $d_e = $row['date_end'];
                echo $d_s;
                echo "<br>";
                echo $d_e;

                $sqlcheck = "SELECT * FROM booking 
INNER JOIN addcars
ON booking.id = addcars.booking_id
WHERE (date_start BETWEEN '$d_s' and '$d_s') OR (date_end BETWEEN '$d_e' and '$d_e')";

                $resultcheck = $conn->query($sqlcheck);
                $c_count = mysqli_num_rows($resultcheck);

                echo "<br>";
                echo $c_count;

                ?>









                <div class="col-12">
                    <div class="card card shadow mt-3">
                        <div class="card-header">
                            <span class="float-start fs-5 float-end" style="line-height: 3.0rem"> <i class="fas fa-edit"></i>&nbsp;&nbsp;จัดการข้อมูลยานพาหนะ | ผู้ขับขี่ยานพาหนะ</span>
                            <a href="index.php" class="btn btn-sm float-start btn-backward mt-2">
                                <i class="fas fa-arrow-circle-left"></i>
                                ย้อนกลับ
                            </a>
                        </div>
                        <div class="card-body">

                            <!-- form start -->
                            <form action="updatecartest.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="card border-0">
                                            <div class="card-body">
                                                <p class="mt-2"><i class="fas fa-stamp"></i> การอนุมัติ | ไม่อนุมัติ</p>
                                                <div class="form-group py-3">
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" name="status" value="wait" onclick="hiddenn('0')" <?php if ($row['status'] == 'wait') echo "checked"; ?>>
                                                        <label class="form-check-label" for="inlineRadio1">รออนุมัติ</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" name="status" value="true" onclick="hiddenn('0')" <?php if ($row['status'] == 'true') echo "checked"; ?>>
                                                        <label class="form-check-label" for="inlineRadio1">อนุมัติ</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" name="status" value="false" onclick="hiddenn('1')" <?php if ($row['status'] == 'false') echo "checked"; ?>>
                                                        <label class="form-check-label" for="inlineRadio2">ไม่อนุมัติ</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <select class="custom-select" id="txt1" name="txt1">
                                                        <option disabled selected>กรุณาเลือก...</option>
                                                        <option value="1">ไม่มีรถ ส่งเรื่องเบิกค่าแท็กซี่</option>
                                                        <option value="2">#</option>
                                                        <option value="3">#</option>
                                                    </select>
                                                </div>
                                                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                            </div>
                                        </div>
                                    </div>



                                    <!-- ทดสอบการเลือกรถ -->
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="card">
                                                    <div class="card-body">

                                                        <p>ยานพาหนะที่ถูกใช้งานแล้ว</p>
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>ลำดับ</th>
                                                                    <th>หมายเลขทะเบียน</th>
                                                                    <th>ผู้ขับขี่ยานพาหนะ</th>
                                                                    <th>สถานะ</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                <?php
                                                                $num = 0;
                                                                while ($rowcheck = $resultcheck->fetch_assoc()) {
                                                                    $num++;
                                                                ?>

                                                                    <tr>
                                                                        <td><?php echo $num ?></td>
                                                                        <td><?php echo $rowcheck['regis_car'] ?></td>
                                                                        <td><?php echo $rowcheck['name_driver'] ?></td>
                                                                        <td><?php echo "ถูกใช้งานแล้ว" ?></td>
                                                                    </tr>
                                                             <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php

                                            // $sql_checknone = "SELECT * FROM cars_list 
                                            // WHERE 'car_id' != '".$rowcheck['car_id']."' ";
                                            // $resultchecknone = $conn->query($sql_checknone);
                                            // $count_none = mysqli_num_rows($resultchecknone);

                                            // echo $count_none;


                                            ?>






                                            <div class="col-sm-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Special title treatment</h5>
                                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>





                                    <div class="col-md-12">

                                        <div class="card border-0">
                                            <div class="card-body">
                                                <p class="mt-2"><i class="fas fa-bus-alt"></i> จัดการข้อมูลยานพาหนะ | ผู้ขับขี่ยานพาหนะ:</p>

                                                <!-- TEST CHECK CARS -->
                                                <!-- <a href="cars.php" class="btn btn-primary">
                                                    ดูข้อมูลยานพาหนะ
                                                </a> -->


                                                <div class="table-responsive">
                                                    <table class="table table-borderless" id="dynamic_field">
                                                        <thead>
                                                            <tr>
                                                                <th width="50%">ยานพาหนะ</th>
                                                                <th width="50%">คนขับยานพาหนะ</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php
                                                            for ($i = 1; $i <= 5; $i++) {
                                                                // echo $i;
                                                                // exit();

                                                                if ($i == 1) {

                                                            ?>
                                                                    <tr>
                                                                        <td>

                                                                            <select class="form-control carselect2 " name="<?php echo 'cars' . $i ?>" required style="width:100%;">
                                                                                <option value="">--เลือกยานพาหนะ--</option>

                                                                                <?php foreach ($car_result as $rowcar) { ?>

                                                                                    <option value="<?php echo $rowcar['car_regis']; ?>"> <?php echo $rowcar['car_regis']; ?></option>

                                                                                <?php } ?>

                                                                            </select>

                                                                        </td>
                                                                        <td>
                                                                            <select class="form-control driverselect2" name="<?php echo 'drivers' . $i ?>" required style="width:100%;">
                                                                                <option value="">--คนขับยานพาหนะ--</option>

                                                                                <?php foreach ($driver_result as $rowdriver) { ?>

                                                                                    <option value="<?php echo $rowdriver['name']; ?>"> <?php echo $rowdriver['name']; ?></option>

                                                                                <?php } ?>
                                                                            </select>
                                                                        </td>
                                                                    </tr>

                                                                <?php  } else { ?>

                                                                    <tr>
                                                                        <td>
                                                                            <select class="form-control carselect2 " name="<?php echo 'cars' . $i ?>" style="width:100%;">
                                                                                <option value="">--เลือกยานพาหนะ--</option>

                                                                                <?php foreach ($car_result as $rowcar) { ?>

                                                                                    <option value="<?php echo $rowcar['car_regis']; ?>"> <?php echo $rowcar['car_regis']; ?></option>

                                                                                <?php } ?>
                                                                            </select>

                                                                        </td>
                                                                        <td>
                                                                            <select class="form-control driverselect2" name="<?php echo 'drivers' . $i ?>" style="width:100%;">
                                                                                <option value="">--คนขับยานพาหนะ--</option>
                                                                                <?php foreach ($driver_result as $rowdriver) { ?>

                                                                                    <option value="<?php echo $rowdriver['name']; ?>"> <?php echo $rowdriver['name']; ?></option>

                                                                                <?php } ?>
                                                                            </select>
                                                                        </td>
                                                                    </tr>

                                                                <?php  } ?>

                                                            <?php  } ?>


                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div> <!-- /card body -->

                        <div class="card-footer border-0 text-center">

                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button class="btn btn-primary" type="submit" name="submit">บันทึกข้อมูล</button>
                            </div>
                        </div>
                    </div> <!-- /card -->
                </div>

                <!-- เรียก id ซ่อนไว้ -->
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                </form>

            </section> <!-- Main Content -->

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

    <!-- bootstrap-toggle -->
    <script src="../../plugins/ToggleSwitches/js/bootstrap-toggle.min.js"></script>
    <script src="../../plugins/ToggleSwitches/js/jquery.switcher.js"></script>

    <script>
        //Initialize Select2 Elements
        $('.carselect2').select2({
            placeholder: " -- กรุณาเลือกยานพาหนะ -- "
        });

        $('.driverselect2').select2({
            placeholder: " -- กรุณาเลือกคนขับยานพาหนะ -- "
        });

        $('.multiselect2').select2()
        $('.car_multiselect2').select2({
            placeholder: " -- กรุณาเลือกยานพาหนะ -- ",
            // theme: 'classic',
            allowClear: true
        });
        $('.driver_multiselect2').select2({
            placeholder: " -- กรุณาเลือกคนขับยานพาหนะ -- ",
            allowClear: true
        });
    </script>

    <script>
        $.switcher();
    </script>

    <script>
        function hiddenn(pvar) {
            if (pvar == 0) {
                document.getElementById("txt1").style.display = 'none';
            } else {
                document.getElementById("txt1").style.display = '';
            }

        }
    </script>

    <body onload="hiddenn('0')">

        <script>
            $(".carselect2").select2({
                theme: "bootstrap-5",
                placeholder: "-- กรุณาเลือกยานพาหนะ --",
                allowClear: true,
                selectionCssClass: "select2--medium"
            });

            $(".carselect2 > option").removeAttr("selected");
            // $("#test").trigger("change");

            $(".driverselect2").select2({
                theme: "bootstrap-5",
                placeholder: "-- กรุณาเลือกผู้ขับขี่ยานพาหนะ --",
                allowClear: true,
                selectionCssClass: "select2--medium"
            });

            $(".driverselect2 > option").removeAttr("selected");
            // $("#test").trigger("change");
        </script>


        <!-- Date-Time -->
        <script type="text/javascript">
            $(function() {
                $('#datetimepickertest').datetimepicker({

                    allowInputToggle: true,
                    showTodayButton: true,
                    toolbarPlacement: 'bottom',
                    sideBySide: true,
                    format: 'yyyy/MM/DD HH:mm',
                    locale: 'th',
                    autclose: 'true',
                    icons: {
                        // time: "fas fa-clock",
                        date: "fas fa-calendar-alt",
                        up: "fa fa-arrow-up",
                        down: "fa fa-arrow-down",
                        previous: "fas fa-chevron-circle-left",
                        next: "fas fa-chevron-circle-right",
                        today: "far fa-calendar-check",
                    }
                });
            });

            $(function() {
                $('#datetimepickertest1').datetimepicker({

                    allowInputToggle: true,
                    showTodayButton: true,
                    toolbarPlacement: 'bottom',
                    sideBySide: true,
                    format: 'yyyy/MM/DD HH:mm',
                    locale: 'th',
                    autclose: 'true',
                    icons: {
                        // time: "fas fa-clock",
                        date: "fas fa-calendar-alt",
                        up: "fa fa-arrow-up",
                        down: "fa fa-arrow-down",
                        previous: "fas fa-chevron-circle-left",
                        next: "fas fa-chevron-circle-right",
                        today: "far fa-calendar-check",
                    }
                });
            });
        </script>

        <script>
            $(function() {
                $('#dataTable').DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true
                });

                $('.custom-file-input').on('change', function() {
                    var fileName = $(this).val().split('\\').pop()
                    $(this).siblings('.custom-file-label').html(fileName)
                    if (this.files[0]) {
                        var reader = new FileReader()
                        $('.figure').addClass('d-block')
                        reader.onload = function(e) {
                            $('#imgUpload').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(this.files[0])
                    }
                })

                ClassicEditor
                    .create(document.querySelector('#detail'))
                    .then(function(editor) {
                        // The editor instance
                    })
                    .catch(function(error) {
                        console.error(error)
                    })

                // CKEDITOR
                CKEDITOR.replace('purpose', {
                    language: 'th',
                    filebrowserBrowseUrl: '../../plugins/responsive_filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
                    filebrowserUploadUrl: '../../plugins/responsive_filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
                    filebrowserImageBrowseUrl: '../../plugins/responsive_filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
                });

            });
        </script>
    </body>

</html>