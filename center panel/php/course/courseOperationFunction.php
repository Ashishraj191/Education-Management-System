<?php
//  ==============================================================
// *Author = Sudhanshu Shekhar
// *Date = 04/06/2022
// Purpose = saperate all of center_course_list table operations and course_tbl table operations
// ==============================================================

// Description = This file contains all of center_course_list table realted operational functions
// and also contains all of course_list table operational funcations.
// It means here we define all of student table manupulation function
// ================================================================= ?>

<?php
    // ===================================================
    // ***************************************************
    // ************** course_tbl Table ******************
    // ***************************************************

    // *All of course add by admin in this table*
    // *This table contains total courses help of this table
    //  center can choose own usefull course that center want
    //  to use in his center panel*

    // ===================================================
    
    function viewAllPreDefineCourses($conn){
        $query = "SELECT * FROM `course_tbl`";
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
                  <div class="d-flex px-2 m-0 p-0">
                    <div class="m-0 p-0">
                      <img src="../assets/img/small-logos/logo-spotify.svg"
                        class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                    </div>
                    <div class="m-0 p-0">
                      <h6 class="mt-2 text-sm">'.$row['course_name'].'</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-sm font-weight-bold mb-0">$2,500</p>
                </td>
                <td class="py-0">
                  <button class="btn btn-icon btn-3 p-2 m-0 bg-gradient-success my-0" name="addCourse" value="'.$row['course_id'].'" type="submit">
                    <span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
                    <span class="btn-inner--text">Add</span>
                  </button>
                </td>
              </tr>';
            }
        }else{
            echo "Error to featching course list";
        }
    }

    // ===================================================
    // ***************************************************
    // ************** center_course_tbl Table ******************
    // ***************************************************
    
    // This function add course into center_course_tbl by using course_tbl id(course_id) as forigin key 
    function addCourse_into_center_course_tbl($conn, $center_id, $course_id) {
      $query = "INSERT INTO `center_course_tbl` (`center_id`, `course_id`, `date_time`) VALUES ('$center_id', '$course_id', CURRENT_TIMESTAMP)";
      $result = mysqli_query($conn,$query);
      if ($result) {
        return "true";
      }else{
        return "false";
      }
    }

    function checkCourseAddedOrNot_into_center_course_tbl($conn, $center_id, $course_id) {
      $query = "SELECT * FROM `center_course_tbl` WHERE `center_id`='$center_id' AND `course_id`='$course_id'";
      $result = mysqli_query($conn,$query);
      echo mysqli_num_rows($result);
      if (mysqli_num_rows($result) == 0) {
        return "true";
      }else{
        return "false";
      }
    }

    function viewAllCourse_center_course_tbl($conn,$center_id, $type){
      // this function show all course activated by center panel

      // ***************************************
      // $type variable is responsible for what type of execution performed this function
      // ***************************************
      $query = "SELECT * FROM `center_course_tbl` WHERE `center_id`='$center_id'";
      $result = mysqli_query($conn,$query);
      $i = 0;
      if (mysqli_num_rows($result)>0) {
          while ($row = mysqli_fetch_array($result)) {
            $i++;
            $center_course_id = $row['center_course_id'];
            $course_id = $row['course_id'];
            $query2 = "SELECT * FROM `course_tbl` WHERE `course_id`='$course_id'";
            $result2 = mysqli_query($conn,$query2);
            $row2 = mysqli_fetch_array($result2);

              if ($result2 && $type == 'table') {
                echo '<tr>
                <td>
                  <p class="text-sm font-weight-bold mb-0">'.$i.'</p>
                </td>
                <td>
                  <div class="d-flex px-2">
                    <div>
                      <img src="../assets/img/small-logos/logo-spotify.svg"
                        class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                    </div>
                    <div class="my-auto">
                      <h6 class="mb-0 text-sm">'.$row2['course_name'].'</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-sm font-weight-bold mb-0">$2,500</p>
                </td>
                <td class="py-0">
                  <button class="btn btn-icon btn-3 p-2 m-0 bg-gradient-danger my-0" name="removeCourse" value="'.$center_course_id.'" type="submit">
                    <span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
                    <span class="btn-inner--text">Remove</span>
                  </button>
                </td>
              </tr>';
              }elseif (($result2 && $type == 'selectOption')) {
                echo '<option value="'.$course_id.'">'.$row2['course_name'].'</option>';
              }
          }
      }else{
          echo '<tr>
          <td>
            <p class="text-sm font-weight-bold mb-0">Course Not Found</p>
          </td>
          <tr>';
      }
  }

  function removeCourse_into_center_course_tbl($conn, $center_course_id){
    $query = "DELETE FROM `center_course_tbl` WHERE `center_course_tbl`.`center_course_id` = '$center_course_id' ";
      $result = mysqli_query($conn,$query);
      if ($result) {
        return "true";
      }else{
        return "false";
      }
  }
    
?>