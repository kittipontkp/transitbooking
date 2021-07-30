<?php
include_once('../authen.php');
include('header.php');

$sql = "SELECT * FROM booking";
$result = $conn->query($sql);
$rowlist_booking = mysqli_num_rows($result);

$sql_numcars = "SELECT * FROM `cars_list` WHERE car_status = 'online'";
$result_numcars = $conn->query($sql_numcars);
$row_numcars = mysqli_num_rows($result_numcars);

$sql_numdrivers = "SELECT * FROM `drivers_list` WHERE driver_status = 'online'";
$result_numdrivers = $conn->query($sql_numdrivers);
$row_numdrivers = mysqli_num_rows($result_numdrivers);


?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ระบบจองยานพาหนะ</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="css/calendar.css">
	<link rel="stylesheet" href="css/style.css">

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

</head>

<body class="hold-transition sidebar-mini">

	<div class="wrapper">
		<!-- Navbar -->
		<?php include_once('../includes/sidebar.php') ?>

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
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-success shadow">
								<div class="inner">
									<h3><?php echo $rowlist_booking ?></h3>

									<p>รายการจองวันนี้</p>
								</div>
								<div class="icon">
									<i class="ion-ios-calendar"></i>
								</div>
								<a href="#" class="small-box-footer py-2">รายละเอียดเพิ่มเติม <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-warning shadow">
								<div class="inner">
									<h3><?php echo $row_numdrivers ?></h3>

									<p>จำนวนคนขับยานพาหนะ</p>
								</div>
								<div class="icon">
									<i class="ion ion-person-add"></i>
								</div>
								<a href="#" class="small-box-footer py-2">รายละเอียดเพิ่มเติม <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-info shadow">
								<div class="inner">
									<h3><?php echo $row_numcars ?></h3>

									<p>จำนวนยานพาหนะ</p>
								</div>
								<div class="icon">
									<i class="ion ion-pie-graph"></i>
								</div>
								<a href="#" class="small-box-footer py-2">รายละเอียดเพิ่มเติม <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-primary shadow">
								<div class="inner">
									<h3>0<sup style="font-size: 20px">%</sup></h3>

									<p>สถิติการจองยานพาหนะ</p>
								</div>
								<div class="icon">
									<i class="ion ion-stats-bars"></i>
								</div>
								<a href="#" class="small-box-footer py-2">รายละเอียดเพิ่มเติม <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
					</div>
					<div class="card card shadow" style="overflow-x:auto;">
						<div class="card-body">

							<div class="row gx-5">
								<div class="col-md-12">
									<div class="page-header">
										<div class="pull-left form-inline float-end">
											<div class="btn-group">
												<button class="btn btn-primary" data-calendar-nav="prev">
													<< Prev</button>
													<button class="btn btn-danger" data-calendar-nav="today">Today</button>
													<button class="btn btn-primary" data-calendar-nav="next">Next >></button>
												</div>
												<div class="btn-group">
													<button class="btn btn-warning" data-calendar-view="year">Year</button>
													<button class="btn btn-warning active" data-calendar-view="month">Month</button>
													<button class="btn btn-warning" data-calendar-view="week">Week</button>
													<button class="btn btn-warning" data-calendar-view="day">Day</button>
												</div>
											</div>
											<br><br>
											<h3 class="float-end p-3"></h3>
											<!-- <small>To see example with events navigate to Februray 2018</small> -->
										</div>
									</div>
							</div>

							<div class="row gx-5">
								<div class="col-md-1">
									<!-- <h4>All Events List</h4> -->
									<!-- <ul id="eventlist" class="nav nav-list"></ul> -->
								</div>
								<div class="col-md-11">
									<div id="showEventCalendar"></div>
								</div>
							</div>
							<!-- <div class="col-md-3">
											<h4>All Events List</h4>
											<ul id="eventlist" class="nav nav-list"></ul>
										</div> -->
						</div>
					</div> <!-- /.card-body -->
				</div> <!-- /.card -->
		</div>
		    <!-- footer -->
			<?php include_once('../includes/footer.php') ?>
	</div>
	</div>
	</section> <!-- /.content -->


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
	<script src="../../plugins/datatables_new/dataTables.responsive.min.js"></script>
	<script src="../../plugins/datatables_new/dataTables.select.min.js"></script>

	<!-- AdminLTE for demo purposes -->
	<script src="../../dist/js/demo.js"></script>



	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
	<script type="text/javascript" src="js/language/th-TH.js"></script>
	<script type="text/javascript" src="js/calendar.js"></script>
	<script type="text/javascript" src="js/events.js"></script>

	<!-- <script type="text/javascript">
		var calendar = $("#showEventCalendar").calendar({
			language:'th-TH'
		});
</script> -->



	<?php //include('footer.php');
	?>
	</div>
	</div>
</body>

</html>