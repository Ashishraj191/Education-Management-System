<?php
// ==============================================================
// *Author = Sudhanshu Shekhar
// *Date = 03/06/2022
// Purpose = saperate all of batch table operatio
// ==============================================================

// Description = This file contains all of batch table realted operational functions
// It means here we define all of batch table manupulation function
// ================================================================= 
?>
<?php
    function createTestSeries($conn, $course_id, $test_series_name, $no_of_questions, $marks_of_every_question, $test_duration, $time_unit, $center_id, $created_by, $teacher_id){
        $query = "INSERT INTO `test_series` (`course_id`, `test_series_name`, `no_of_questions`, `marks_of_every_question`,`test_duration`, `time_unit`, `center_id`, `created_by`,`teacher_id`,`status`, `date_time`) VALUES ('$course_id', '$test_series_name', '$no_of_questions','$marks_of_every_question','$test_duration','$time_unit','$center_id','$created_by','$teacher_id','0', CURRENT_TIMESTAMP)";
        $result = mysqli_query($conn , $query);
        if ($result) {
            return "true";
        }else{
            return mysqli_error($conn);
            // return "false";
        }
    }

    function viewAllTestSeries($conn,$center_id){
        $query = "SELECT * FROM `test_series` WHERE `center_id` = '$center_id'";
        $result = mysqli_query($conn,$query);
        $i = 0;
        if (mysqli_num_rows($result)>0) {
            while ($row = mysqli_fetch_array($result)) {
                $total_marks = $row['no_of_questions']*$row['marks_of_every_question'];
                $i++;
                $test_series_id = $row['test_series_id'];
                $course_id = $row['course_id'];
                // query @2
                $query2 = "SELECT * FROM `course_tbl` WHERE `course_tbl`.`course_id` = '$course_id'";
                $result2 = mysqli_query($conn, $query2);
                $row2 = mysqli_fetch_array($result2);
                // query @3
                $query3 = "SELECT * FROM `ts_question` WHERE `ts_question`.`test_series_id` = '$test_series_id'";
                $result3 = mysqli_query($conn, $query3);
                $no_of_questions_added = mysqli_num_rows($result3);
                echo '<tr>
                <td>
                    <p class="text-sm font-weight-bold mb-0">'.$i.'</p>
                </td>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div>
                      <img src="../assets/img/team-3.jpg" class="avatar avatar-sm me-3" alt="user1">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">'.$row['test_series_name'].'</h6>
                      <p class="text-xs text-secondary mb-0">By Center</p>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0">'.$row2['course_name'].'</p>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0">'.$no_of_questions_added.'/'.$row['no_of_questions'].'</p>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">'.$row['marks_of_every_question'].'/'.$total_marks.'</p>
                </td>';
                if ($row['time_unit'] == 'm') {
                    echo' <td>
                    <p class="text-xs font-weight-bold mb-0">'.$row['test_duration'].' Minuts</p>
                  </td>';
                }elseif($row['time_unit'] == 'h'){
                    echo' <td>
                    <p class="text-xs font-weight-bold mb-0">'.$row['test_duration'].' Hours</p>
                  </td>';
                }
                if ($row['status'] == 1) {
                    echo'<td class="align-middle text-center text-sm">
                    <span class="badge badge-sm bg-gradient-success">Live</span>
                  </td>';
                }elseif ($row['status'] == 0) {
                    echo' <td class="align-middle text-center text-sm">
                    <span class="badge badge-sm bg-gradient-danger">Hide</span>
                  </td>';
                }
                echo'
                <td class="py-0">
                  <button class="btn btn-icon btn-3 p-2 m-0 bg-gradient-success my-0 view_editMeeting question_btn" data-bs-toggle="modal" data-bs-target="#questionModal" value="'.$row['test_series_id'].'">
                      <span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
                      <span class="btn-inner--text">Questions</span>
                  </button>
                  <button class="btn btn-icon btn-3 p-2 m-0 bg-gradient-primary my-0" name="hideBatch" value="'.$row['test_series_id'].'" type="submit">
                      <span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
                      <span class="btn-inner--text">Edit Test</span>
                  </button>
                  <button class="btn btn-icon btn-3 p-2 m-0 bg-gradient-danger my-0" name="hideBatch" value="'.$row['test_series_id'].'" type="submit">
                      <span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
                      <span class="btn-inner--text">Remove Test</span>
                  </button>
                </td>
              </tr>';
            }
        }else{
            echo '<tr>
            <td>
                <p class="text-sm font-weight-bold mb-0">No Test Found !</p>
            </td>';
        }
    }

    function addQuestionInTestSeries($conn, $question, $option_A, $option_B, $option_C, $option_D, $correct_option, $test_series_id){
      $i = 0;
      foreach ($question as $value) {
        $query = "INSERT INTO `ts_question` (`question`, `option_A`, `option_B`, `option_C`,`option_D`, `correct_option`, `test_series_id`, `date_time`) VALUES ('$value', '$option_A[$i]', '$option_B[$i]','$option_C[$i]','$option_D[$i]','$correct_option[$i]','$test_series_id', CURRENT_TIMESTAMP)";
        $result = mysqli_query($conn , $query);
        $i++;
      }
      if ($result) {
        return "true";
      }else{
        return mysqli_error($conn);
        // return "false";
      }
  }


  function  viewAllQuestionInTestSeries($conn, $test_series_id){
    $query = "SELECT * FROM `ts_question` WHERE `test_series_id` = '$test_series_id'";
    $result = mysqli_query($conn,$query);
    $i = 0;
    if (mysqli_num_rows($result)>0) {
        while ($row = mysqli_fetch_array($result)) {
          $i++;
            echo '<tr>
            <td>
                <p class="text-sm font-weight-bold mb-0">'.$i.'</p>
            </td>
            <td>
              <div class="d-flex px-2 py-1">
                <div class="justify-content-center">
                  <!-- <h6 class="mb-0 text-sm">'.$row['question'].'</h6> -->
                  <p class="text-xs font-weight-bold mb-0">'.$row['question'].'</p>
                </div>
              </div>
            </td>
            <td>
              <p class="text-xs font-weight-bold mb-0">'.$row['option_A'].'</p>
            </td>
            <td>
              <p class="text-xs font-weight-bold mb-0">'.$row['option_B'].'</p>
            </td>
            <td>
              <p class="text-xs font-weight-bold mb-0">'.$row['option_C'].'</p>
            </td>
            <td>
              <p class="text-xs font-weight-bold mb-0">'.$row['option_D'].'</p>
            </td>
            <td>
              <p class="text-xs font-weight-bold mb-0">'.$row['correct_option'].'</p>
            </td>
            <td class="py-0">
              <button class="btn btn-icon btn-3 p-2 m-0 bg-gradient-success my-0 view_editMeeting edit_question_btn" value="'.$row['ts_question_id'].'">
                  <span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
                  <span class="btn-inner--text">Edit</span>
              </button>
              <button class="btn btn-icon btn-3 p-2 m-0 bg-gradient-primary my-0" name="hideBatch" value="'.$row['ts_question_id'].'" type="submit">
                  <span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
                  <span class="btn-inner--text">Remove</span>
              </button>
            </td>
          </tr>';
        }
    }else{
        echo '<tr>
        <td>
            <p class="text-sm font-weight-bold mb-0">No Test Found !</p>
        </td>';
    }
}

function viewQuestionById($conn, $ts_question_id){
  $query = "SELECT * FROM `ts_question` WHERE `ts_question_id` = '$ts_question_id'";
  $result = mysqli_query($conn,$query);
  if (mysqli_num_rows($result)==1) {
    $question_detals = mysqli_fetch_array($result, MYSQLI_ASSOC);
    echo json_encode($question_detals);
  }
}

function editQuestionById($conn, $question, $option_A, $option_B, $option_C, $option_D, $correct_option, $ts_question_id){
  $query = "UPDATE `ts_question` SET `question` = '$question',`option_A` = '$option_A',`option_B` = '$option_B',`option_C` = '$option_C',`option_D` = '$option_D',`correct_option` = '$correct_option' WHERE `ts_question`.`ts_question_id` = '$ts_question_id'";
  $result = mysqli_query($conn,$query);
  if ($result) {
    return "true";
  }else{
    // return mysqli_error($conn);
    return "false";
  };
}
?>