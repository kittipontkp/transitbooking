<?php include_once('../authen.php'); ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>รายงาน</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../assets/css/style.css">
  <!-- Bootstrap 5 -->
  <link rel="stylesheet" href="../../plugins/bootstrap5/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.bootstrap5.min.css">
  <!-- Datetimepicker -->
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap.css">
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
              <h1>Reports</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Report</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <div class="container">
          <div class="card mb-3">
            <div class="card-header">ค้นหาตามช่วงวันที่</div>
            <div class="card-body text-dark">
              <form id="form1" name="form1" method="post" action="index.php">

                <div class="row row justify-content-center">
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="input-group date" id="datetimestart" data-target-input="nearest">
                        <label class="h6 mt-2">วันที่ : </label>
                        &nbsp;&nbsp;<input type="text" data-format="yyyy/MM/dd" name="d_s" class="form-control datetimepicker-input" data-target="#datetimestart" value="<?php echo (isset($_POST['d_s']) ? $_POST['d_s'] : '')  ?>" placeholder="เลือกวันที่" required>
                        <div class="input-group-prepend" data-target="#datetimestart" data-toggle="datetimepicker">
                          <span class="input-group-text"><span class="far fa-calendar-alt"></span></span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="input-group date" id="datetimeend" data-target-input="nearest">
                        <label class="h6 mt-2">ถึงวันที่ : </label>
                        &nbsp;&nbsp;<input type="text" data-format="yyyy/MM/dd" name="d_e" class="form-control datetimepicker-input" data-target="#datetimeend" value="<?php echo (isset($_POST['d_e']) ? $_POST['d_e'] : '')  ?>" placeholder="เลือกวันที่" required>
                        <div class="input-group-prepend" data-target="#datetimeend" data-toggle="datetimepicker">
                          <span class="input-group-text"><span class="far fa-calendar-alt"></span></span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> ค้นหา</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>


        <?php

        // เช็คค่า d_s และ d_e
        if (isset($_POST['d_s']) && $_POST['d_e']) {
          $d_s = $_POST['d_s']; //ตัวแปรวันที่เริ่มต้น
          $d_e = $_POST['d_e']; //ตัวแปรวันที่สิ้นสุด

          $d_s = $d_s . " " . '00.00.00'; //กำหนดเวลาเริ่มต้น
          $d_e = $d_e . " " . '23.59.59'; //กำหนดเวลาสิ้นสุด

          echo $d_s;
          echo "<br>";
          echo $d_e;
          echo "<br>";

          // ดึงข้อมูลจากตาราง booking
          $sql = "SELECT * FROM booking  where date_start BETWEEN '$d_s' AND '$d_e' ORDER BY id ASC ";

          echo $sql;
          $result = $conn->query($sql);
          $num2 = mysqli_num_rows($result);
          echo "<br>";
          echo $num2;

        ?>

          <div class="container mt-5 ">


            <table id="example" class="display table table-bordered table-hover" cellspacing="0" width="100%">
              <thead>
                <tr align="center" class="table-primary">
                  <th>ลำดับ</th>
                  <th>หน่วยงาน</th>
                  <th>สถานที่</th>
                  <th>วัตถุประสงค์</th>
                  <th>วันที่เริ่มต้น</th>
                  <th>วันที่สิ้นสุด</th>
                </tr>
              </thead>

              <?php

              $num = 0;
              while ($row = $result->fetch_assoc()) {
                $num++;
              ?>

                <tr>
                  <td align="center"><?php echo $num ?></td>
                  <td><?php echo $row['department'] ?></td>
                  <td><?php echo $row['place'] ?></td>
                  <td><?php echo $row['purpose'] ?></td>
                  <td><?php echo $row['date_start'] ?></td>
                  <td><?php echo $row['date_end'] ?></td>
                </tr>
              <?php } ?>
            </table>
          <?php } ?>
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
  <!-- Main js-files -->
  <script src="../../assets/js/main.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>
  <!-- Datetime picker -->
  <script type="text/javascript" src="../../plugins/moment/moment.min.js"></script>
  <script src="../../plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap.js"></script>
  <script src="../../plugins/moment/locale/th.js"></script>

  <!-- DataTables -->
  <script src="https://adminlte.io/themes/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.bootstrap5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="../../plugins/pdfmake/build/pdfmake.js"></script>
  <script src="../../plugins/pdfmake/build/vfs_fonts.js"></script>

  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>


  <script type="text/javascript">
    $(function() {
      $('#datetimestart').datetimepicker({
        format: 'L',
        allowInputToggle: true,
        showTodayButton: true,
        toolbarPlacement: 'bottom',
        sideBySide: true,
        format: "yyyy-MM-DD",
        // stepping: 30,
        locale: 'th',
        autclose: 'true',


      });
    });

    $(function() {
      $('#datetimeend').datetimepicker({
        format: 'L',
        allowInputToggle: true,
        showTodayButton: true,
        toolbarPlacement: 'bottom',
        sideBySide: true,
        format: "yyyy-MM-DD",
        // stepping: 30,
        locale: 'th',
        autclose: 'true',
      });
    });
  </script>


  <script>
    pdfMake.fonts = {
      THSarabunNew: {
        normal: 'THSarabunNew.ttf',
        bold: 'THSarabunNew-Bold.ttf',
        italics: 'THSarabunNew-Italic.ttf',
        bolditalics: 'THSarabunNew-BoldItalic.ttf'
      },
      Roboto: {
        normal: 'Roboto-Regular.ttf',
        bold: 'Roboto-Medium.ttf',
        italics: 'Roboto-Italic.ttf',
        bolditalics: 'Roboto-MediumItalic.ttf'
      },
    };
  </script>
  <script>
    $(document).ready(function() {
      $("#example")
        .DataTable({
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
          },

          responsive: true,


          buttons: [{
              extend: 'copy',
              text: 'Copy',
            },
            {
              extend: 'print',
              text: 'Print',
            },
            {
              extend: 'excel',
              text: 'Excel',
            },
            {
              extend: 'pdf',
              text: 'PDF',

              "customize": function(doc) { // ส่วนกำหนดเพิ่มเติม ส่วนนี้จะใช้จัดการกับ pdfmake
                // กำหนด style หลัก
                doc.defaultStyle = {
                  font: 'THSarabunNew',
                  fontSize: 16
                };
              },

            },
          ],
          lengthMenu: [
            [5, 10, 25, 50, 100, -1],
            [5, 10, 25, 50, 100, "All"],
          ],
          defaultStyle: {
            font: "THSarabunNew",
          },
          dom: "<'row'<'col-md'l><'col-md'B><'col-md'f>>" +
            "<'row'<'col-md-12'tr>>" +
            "<'row'<'col-md'i><'col-md'p>>",
          processing: true,
          order: [
            [0, "asc"]
          ],
        })
        .buttons()
        .container()
        .appendTo("#dataTableLine_wrapper .col-md-6:eq(0)");
    });
  </script>

</body>

</html>