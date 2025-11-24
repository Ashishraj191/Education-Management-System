<?php
  include './partials/_dbconnection.php';
  include 'php/testSeries/testSeriesOperationFunction.php';
//   include 'php/course/courseOperationFunction.php';
  $query3 = "SELECT * FROM `ts_question` WHERE `ts_question`.`test_series_id` = '6'";
  $result3 = mysqli_query($conn, $query3);
  $no_of_questions_added = mysqli_num_rows($result3);
  echo $no_of_questions_added;
?>
