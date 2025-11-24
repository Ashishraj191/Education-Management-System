<?php
//  ==============================================================
// *Author = Sudhanshu Shekhar
// *Date = 03/06/2022
// Purpose = saperate all of student table operatio
// ==============================================================

// Description = This file contains all of student table realted operational functions
// It means here we define all of student table manupulation function
// ================================================================= 
?>
<?php
    // include '../../partials/_dbconnection.php';
    // ================================================
    // addStudent Funcation add student in db
    // ===============================================
    function addStudent($conn,$center_id, $first_name, $last_name, $email, $number, $course_id, $batch_id, $fee_type, $fee_amount, $country, $state, $dob, $area_code, $password, $c_password){
        $query = "INSERT INTO `student` (`center_id`, `student_first_name`, `student_last_name`, `student_email`, `student_password`, `student_c_password`, `student_mob_num`, `student_dob`, `course_id`, `batch_id`, `fee_type`, `fee_amount`, `country`, `state`, `area_code`, `date_time`) VALUES ('$center_id','$first_name', '$last_name', '$email', '$password', '$c_password', '$number', '$dob', '$course_id', '$batch_id', '$fee_type', '$fee_amount', '$country','$state', '$area_code', CURRENT_TIMESTAMP)";
        $result = mysqli_query($conn , $query);
        if ($result) {
            return "data success";
        }else{
            return "failed";
        }  
    }


    function viewAllStudent($conn,$center_id){
        $query = "SELECT * FROM `student` WHERE `center_id` = '$center_id'";
        $result = mysqli_query($conn,$query);
        if (mysqli_num_rows($result)>0) {
            while ($row = mysqli_fetch_array($result)) {
                echo '<tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div>
                      <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">'.$row['student_first_name'].' '.$row['student_last_name'].'</h6>
                      <p class="text-xs text-secondary mb-0">'.$row['student_email'].'</p>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0">Manager</p>
                  <p class="text-xs text-secondary mb-0">Organization</p>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="badge badge-sm bg-gradient-success">Online</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                </td>
                <td class="align-middle">
                  <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                    data-original-title="Edit user">
                    Edit
                  </a>
                </td>
              </tr>';
            }
        }else{
            echo "Error To featching student data";
        }
    }
?>