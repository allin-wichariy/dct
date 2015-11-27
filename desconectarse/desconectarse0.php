<?php
  session_start();
  session_destroy();
//    ob_start();
  header("location: http://www.uatf.edu.bo/");
//    ob_end_flush();
  ob_flush();
  exit;
?>


