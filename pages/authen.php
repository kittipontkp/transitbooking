<?php 
   session_start();
   require_once('../../php/connect.php');

   $uri = $_SERVER['REQUEST_URI'];  //nsocarbooking/admin/pages/admin/
   $array = explode('/', $uri);
   // print_r($array);
   $key = array_search("pages", $array);
   // echo $name = $array[$key + 1];
   $name = $array[$key + 1];

   if(!isset($_SESSION['authen_id'] ) ){
      header('Location: ../../login.php');  
   }else if( $name == 'admin' && $_SESSION['status'] == 'admin' ) {
      header('Location: ../dashboard/');
   }

   
?>