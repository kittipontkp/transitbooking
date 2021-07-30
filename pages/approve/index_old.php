<?php include_once('../authen.php');

$sqlapp = "SELECT a.first_name, a.last_name, b.*
        FROM admin a
        INNER JOIN booking b ON a.id = b.user_id
        WHERE b.status = 'true' OR b.status = 'success'     
        ORDER BY b.id ASC";

$resultapp = $conn->query($sqlapp);


$sqlpass = "SELECT booking.*, admin.*, passenger.*
FROM booking, admin, passenger
WHERE 1
AND booking.user_id = admin.id 
AND passenger.b_id = booking.id
ORDER BY booking.id ASC";
$resultpass = $conn->query($sqlpass);
$rowpass = $resultpass->fetch_assoc();



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
                                <!-- Default box -->
                          <div class="card card shadow" style="overflow-x:auto;">
                              <div class="card-header">
                                  <span class="float-start fs-5" style="line-height: 3.0rem"> <i class="fas fa-th-list"></i>&nbsp;&nbsp; รายการรออนุมัติ</span>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body" style="overflow-x:auto;">
                                  <table id="dataTable" class="display table table-bordered table-striped table-hover">
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
                                          while ($row = $resultapp->fetch_assoc() ) {
                                                $num++;
                                      ?>

                                          <tr>
                                              <td class="text-center"><?php echo $num; ?></td>
                                              <td class="text-center"><?php echo $row['id']; ?></td>
                                              <td><?php echo $row['first_name'] . '&nbsp;&nbsp;&nbsp;&nbsp;' . $row['last_name']; ?></td>
                                              <td class="text-center"><?php echo $row['phonenum']; ?></td>
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
            
                                                  <a href="form-edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success text-white btn-action">
                                                      <i class="fas fa-edit"></i> จัดการ
                                                  </a> 

                                                  <a href="#" onclick="deleteItem(<?php echo $row['id']; ?>);" class="btn btn-sm btn-danger btn-action">
                                                      <i class="fas fa-trash-alt"></i> ลบ
                                                  </a>

                                              </td>
                                          </tr>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>





                        <!-- Section Modal -->
                        <section class="modal fade" id="modalapp<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                                                          <div class="modal-content">
                                                                                              <div class="modal-header" style="background-color: #BBD7FC;">
                                                                                                  <h6 class="modal-title fw-bolder" id="exampleModalLabel"><i class="fas fa-th-list"></i>&nbsp;&nbsp;รายละเอียดข้อมูลการจอง</h6>
                                                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                              </div>
                                                                                              <div class="modal-body">
                                                                                                <div class="card-body px-5">
                                                                                                    <div class="row mb-2">
                                                                                                        <p class="col-xl-4 text-muted">สถานะ :</p>
                                                                                                        <div class="col-xl-8">
                                                                                                            <span class="badge rounded-pill bg-success"> รออนุมัติ</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row mb-2">
                                                                                                        <p class="col-xl-4 text-muted">ชื่อ-นามสกุล ผู้ทำรายการ :</p>
                                                                                                        <div class="col-xl-8">
                                                                                                            <span class=""> <?php echo $_SESSION['prefix']. ' ' .$row['first_name']. ' ' .$row['last_name']; ?></span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row mb-2">
                                                                                                        <p class="col-xl-4 text-muted">หน่วยงานที่สังกัด :</p>
                                                                                                        <div class="col-xl-8">
                                                                                                            <span class=""> <?php echo $row['department'] ?> </span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row mb-2">
                                                                                                        <p class="col-xl-4 text-muted">หมายเลขโทรศัพท์ภายใน :</p>
                                                                                                        <div class="col-xl-8">
                                                                                                            <span class=""> <?php echo $row['phonenum'] ?> </span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row mb-2">
                                                                                                        <p class="col-xl-4 text-muted">วัตถุประสงค์ที่ขอใช้รถ :</p>
                                                                                                        <div class="col-xl-8">
                                                                                                            <span class=""> <?php echo strip_tags($row['purpose']) ?> </span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row mb-2">
                                                                                                        <p class="col-xl-4 text-muted">สถานที่ :</p>
                                                                                                        <div class="col-xl-8">
                                                                                                            <span class=""> <?php echo $row['place'] ?> </span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row mb-2">
                                                                                                        <p class="col-xl-4 text-muted">วันที่เริ่มต้น :</p>
                                                                                                        <div class="col-xl-8">
                                                                                                            <span class=""> <?php $datestart = $row['date_start']; echo thai_date_and_time(strtotime($datestart)). " ". 'น.'; ?> </span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row mb-2">
                                                                                                        <p class="col-xl-4 text-muted">วันที่สิ้นสุด :</p>
                                                                                                        <div class="col-xl-8">
                                                                                                            <span class=""> <?php $dateend = $row['date_end']; echo thai_date_and_time(strtotime($dateend)). " ". 'น.'; ?> </span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row mb-2">
                                                                                                        <p class="col-xl-4 text-muted">จำนวนผู้ร่วมเดินทาง :</p>
                                                                                                        <div class="col-xl-8">
                                                                                                            <span class=""> <?php echo $row_countpassenger; ?> คน </span>
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
                                                                                </section>  <!-- /End Modal -->

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
                              <!-- /.card-body -->
                          </div>
                          <!-- /.card -->
                      </div>
                  </div>
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
<script src="../../plugins/datatables_new/dataTables.select.min.js"></script>

<!-- fullCalendar 2.2.5 -->
<!-- <script src="../../plugins/moment/moment.min.js"></script> -->

<!-- <script src="../../plugins/fullcalendar5/lib/main.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>


<script>
$('.toggle').bootstrapToggle({
    // on: 'Y',
    // off: 'N',
    width: '60%',
    size: 'medium'
});

$('.toggle1').bootstrapToggle({
    // on: 'Y',
    // off: 'N',
    width: '60%',
    size: 'small'
});
</script>

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
