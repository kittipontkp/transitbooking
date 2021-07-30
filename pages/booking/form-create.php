<?php include_once('../authen.php');


$sql_pass = "SELECT * FROM passengers_list";
$result_pass = $conn->query($sql_pass);
$pass_row = $result_pass->fetch_assoc();

$sql_dept = "SELECT * FROM departments_list";
$result_dept = $conn->query($sql_dept);
$rowdept = $result_pass->fetch_assoc();

$sql_province = "SELECT * FROM province ORDER BY province_name ASC";
$result_province = $conn->query($sql_province);
$rowprovince = $result_province->fetch_assoc();

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

<!-- datetimepicker -->
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
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h5 class="m-0 text-dark">บันทึกข้อมูลการจองยานพาหนะ</h5>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../dashboard">หน้าหลัก</a></li>
                <li class="breadcrumb-item"><a href="../articles">จองยานพาหนะ</a></li>
                <li class="breadcrumb-item active">บันทึกข้อมูลการจองยานพาหนะ</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </div>

      <!-- Main content -->
      <section class="content px-3">
        <div class="col-md-12">
          <div class="card card shadow">
            <div class="card-header">
              <span class="float-start fs-5 float-end" style="line-height: 3.0rem"> <i class="fas fa-edit"></i>&nbsp;&nbsp;บันทึกข้อมูลการจองแบบฟอร์ม 3</span>
              <a href="index.php" class="btn btn-sm float-start btn-backward mt-2">
                <i class="fas fa-arrow-circle-left"></i>
                ย้อนกลับ
              </a>
            </div>


            <!-- start card body -->
            <div class="card-body">
              <!-- form start -->
              <form action="create.php" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-12">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="far fa-clock"></i>&nbsp;&nbsp;วันที่ทำรายการ
                        </div>
                      </div>
                      <input style="background-color: #fff" type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username" value="<?php echo thai_date_fullmonth(time()) ?>" disabled>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="department">หน่วยงาน <span style="color:red">*</span> </label>
                      <select class="form-select select2" id="department" name="department" required>
                        <option value="">กรุณาเลือก...</option>
                        <?php foreach ($result_dept as $rowdept) { ?>
                          <option value="<?php echo $rowdept['d_name'] ?>">
                            <?php echo $rowdept['d_name'] ?>
                          </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="phonenum">หมายเลขโทรศัพท์ภายใน <span style="color:red">*</span></label>
                      <input type="text" name="phonenum" class="form-control" id="phonenum" placeholder="หมายเลขโทรศัพท์ภายใน" required>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="place">ขออนุญาตใช้รถ (สถานที่) <span style="color:red">*</span></label>
                      <input type="text" name="place" class="form-control" id="place" placeholder="สถานที่" required>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="province">จังหวัด <span style="color:red">*</span> </label>
                      <select class="form-select select2" id="province" name="province" required>
                        <option value="">กรุณาเลือก...</option>
                        <?php foreach ($result_province as $rowprovince) { ?>
                          <option value="<?php echo $rowprovince['province_name'] ?>">
                            <?php echo $rowprovince['province_name'] ?>
                          </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>วัตถุประสงค์การเดินทาง <span style="color:red">*</span></label>
                      <textarea class="d-none" name="purpose" id="purpose" rows="5" cols="80" required>
                      กรอกข้อมูลที่นี่
                  </textarea>
                    </div>
                  </div>
                </div>

                <!-- DateTime-Picker-->

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="h6">ระหว่างวันที่ <span style="color:red">*</span></label>
                      <div class="input-group date" id="datetimestart" data-target-input="nearest">
                        <div class="input-group-prepend" data-target="#datetimestart" data-toggle="datetimepicker">
                          <span class="input-group-text"><span class="far fa-calendar-alt"></span></span>
                        </div>
                        <input type="text" data-format="dd/MM/yyyy hh:mm:ss" name="date_start" class="form-control datetimepicker-input" data-target="#datetimestart" placeholder="เลือกวันที่เริ่มต้น" required>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="h6">ถึง <span style="color:red">*</span></label>
                      <div class="input-group date" id="datetimeend" data-target-input="nearest">
                        <div class="input-group-prepend" data-target="#datetimeend" data-toggle="datetimepicker">
                          <span class="input-group-text"><span class="far fa-calendar-alt"></span></span>
                        </div>
                        <input type="text" name="date_end" class="form-control datetimepicker-input" data-target="#datetimeend" placeholder="เลือกวันที่สิ้นสุด" required>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="table-responsive">
                      <label for="">ผู้ร่วมเดินทาง</label>
                      <table class="table" id="dynamic_field">
                        <thead>
                          <tr class="text-center table-light">
                            <!-- <th width="15%">ลำดับ</th> -->
                            <th width="70%">ชื่อ-นามสกุล</th>
                            <th width="15%"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <!-- <td>
                              <select class="form-select" name="sequence[]" aria-label="Default select example">
                                <option value="" selected disabled>-- กรุณาเลือก --</option>
                                <?php for ($i = 1; $i <= 50; $i++) { ?>

                                  <option value="<?php echo $i; ?>">
                                    <?php echo $i; ?>
                                  </option>
                                <?php } ?>
                              </select>
                            </td> -->

                            <td>
                              <select class="passenger_name" name="p_name[]" style="width: 100%;">
                                <option value="">กรุณาเลือก...</option>
                                <?php foreach ($result_pass as $rs) { ?>
                                  <option value="<?php echo $rs['p_name']; ?>">
                                    <?php echo $rs['p_name']; ?>
                                  </option>
                                <?php } ?>
                              </select>
                            </td>
                            <td align="center">
                              <button type="button" name="add" id="add" class="btn btn-sm btn-success" style="width: 100%;"> เพิ่ม
                              </button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

            </div>

            <div class="card-footer border-0 text-center">
              <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn btn-primary" type="submit" name="submit">
                  <i class="fas fa-save"></i>
                  บันทึกข้อมูลการจอง</button>
              </div>
            </div>

          </div>
        </div>

        </form>

    </div>
    </section>
    <!-- /.content -->

    <!-- footer -->
    <?php include_once('../includes/footer.php') ?>

  </div> <!-- /.wrapper -->

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
  <!-- Datetime picker -->
  <script type="text/javascript" src="../../plugins/moment/moment.min.js"></script>
  <script src="../../plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>
  <script src="../../plugins/moment/locale/th.js"></script>
  <!-- CKEditor -->
  <script src="../../plugins/ckeditor/ckeditor.js"></script>
  <!-- Select2 -->
  <script src="../../plugins/select2/js/select2.full.min.js"></script>


  <script>
    $("#department").select2({
      theme: "bootstrap-5",
      placeholder: "-- กรุณาเลือกหน่วยงาน --",
      allowClear: true,
      selectionCssClass: "select2--medium"
    });

    $("#province").select2({
      theme: "bootstrap-5",
      placeholder: "-- กรุณาเลือกจังหวัด --",
      allowClear: true,
      selectionCssClass: "select2--medium"
    });

    $(document).ready(function() {
            $('.passenger_name').select2({
              theme: "bootstrap-5",
              placeholder: "-- กรุณาเลือกหน่วยงาน --",
              allowClear: true,
              selectionCssClass: "select2--medium"
            });
        });
  </script>

  <script type="text/javascript">
    $(function() {
      $('#datetimestart').datetimepicker({

        allowInputToggle: true,
        showTodayButton: true,
        toolbarPlacement: 'bottom',
        sideBySide: true,
        format: 'yyyy/MM/DD HH:mm',
        stepping: 30,
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
      $('#datetimeend').datetimepicker({

        allowInputToggle: true,
        showTodayButton: true,
        toolbarPlacement: 'bottom',
        sideBySide: true,
        format: 'yyyy/MM/DD HH:mm',
        stepping: 30,
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

      
      // ckeditor
      CKEDITOR.replace('purpose', {
        language: 'th',
        filebrowserBrowseUrl: '../../plugins/responsive_filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl: '../../plugins/responsive_filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl: '../../plugins/responsive_filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
      });

    });
  </script>

  <!-- เพิ่ม-ลบ จำนวนผู้ร่วมเดินทาง -->
  <script>
    $(document).ready(function() {
      let i = 1;
      $('#add').click(function() {
        i++;


        $('#dynamic_field').append('<tr id="row' + i + '"><td><select class="passenger_name" name="p_name[]" style="width: 100%;"><option  value="">--Select--</option><?php foreach ($result_pass as $rs) { ?><option  value="<?php echo $rs['p_name']; ?>"><?php echo $rs['p_name']; ?></option><?php } ?></select></td><td align="center"><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>')


        $(document).ready(function() {
            $('.passenger_name').select2({
              theme: "bootstrap-5",
              placeholder: "-- กรุณาเลือกหน่วยงาน --",
              allowClear: true,
              selectionCssClass: "select2--medium"
            });
        });


        $(".select2 > option").removeAttr("selected");

      })

      $(document).on('click', '.btn_remove', function() {
        let button_id = $(this).attr('id');
        $('#row' + button_id + '').remove();
      })
    })

  </script>

</body>

</html>