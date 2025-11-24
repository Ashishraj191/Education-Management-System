<?php
//  ==============================================================
// *Author = Sudhanshu Shekhar
// *Date = 03/06/2022
// Purpose = saperate all of teacher table operations
// ==============================================================

// Description = This file contains all of teacher table realated operational functions
// It means here we define all of teacher table manupulation function
// ================================================================= 
?>
<?php
    // include '../../partials/_dbconnection.php';
    // ================================================
    // addStudent Funcation add student in db
    // ===============================================
    function addTeacher($conn,$center_id, $first_name, $last_name, $email, $number,$dob, $subject, $payment_type, $payment_amount, $country, $state, $area_code, $password, $c_password){
        $query = "INSERT INTO `teacher` (`center_id`, `first_name`, `last_name`, `email`, `mob_num`,`dob`, `subject`, `payment_type`, `payment_amount`, `country`, `state`, `area_code`, `password`, `c_password`, `date_time`) VALUES  ('$center_id', '$first_name', '$last_name', '$email', '$number','$dob', '$subject', '$payment_type', '$payment_amount', '$country', '$state', '$area_code', '$password', '$c_password', CURRENT_TIMESTAMP)";
        $result = mysqli_query($conn , $query);
        if ($result) {
            return "data success";
        }else{
            return "failed".mysqli_error($conn);
        }  
    }


    function viewAllTeacher($conn,$center_id){
        $query = "SELECT * FROM `teacher` WHERE `center_id` = '$center_id'";
        $result = mysqli_query($conn,$query);
        if (mysqli_num_rows($result)>0) {
            while ($row = mysqli_fetch_array($result)) {
                echo '<tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div>
                      <img src="../assets/img/team-3.jpg" class="avatar avatar-sm me-3" alt="user1">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">'.$row['first_name'].' '.$row['last_name'].'</h6>
                      <p class="text-xs text-secondary mb-0">'.$row['email'].'</p>
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