<?php
  include './partials/_dbconnection.php';
  include 'php/meeting/meetingOperationFunction.php';
//   include 'php/course/courseOperationFunction.php';
  $current_date = date('Y-m-d');
  $batch_id = 4;
  $center_id =1;
  $type = 'table';
  viewBatchWiseCurrentMeeting($conn, $center_id, $batch_id, $current_date ,$type);
?>

