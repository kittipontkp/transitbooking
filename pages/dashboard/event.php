<?php
include_once("db_connect.php");
// $sqlEvents = "SELECT id, title, start_date, end_date FROM events LIMIT 20";
$sqlEvents = "SELECT id, place, department, date_start, date_end FROM booking";
$resultset = mysqli_query($conn, $sqlEvents) or die("database error:". mysqli_error($conn));
$calendar = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {	
	// convert  date to milliseconds
	$start = strtotime($rows['date_start']) * 1000;
	$end = strtotime($rows['date_end']) * 1000;	
	$calendar[] = array(
        'id' =>$rows['id'],
        'title' => $rows['department']. " " .$rows['place'],
        'url' => "#",
		"class" => 'event-important',
        'start' => "$start",
        'end' => "$end"
    );
}
$calendarData = array(
	"success" => 1,	
    "result"=>$calendar);
echo json_encode($calendarData);
exit;
?>