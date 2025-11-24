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
    function createMeeting($conn, $center_id, $batch_id, $meeting_topic, $host_name, $meeting_date, $meeting_start_time, $meeting_end_time, $meeting_platform, $meeting_url, $meet_join_id, $meet_join_password, $meeting_desc){
        $query = "INSERT INTO `meeting` (`meeting_topic`, `host_name`, `batch_id`, `meeting_date`,`meeting_start_time`, `meeting_end_time`, `meeting_platform`, `meeting_url`, `meet_join_id`,`meet_join_password`, `center_id`, `meeting_desc`, `date_time`) VALUES ('$meeting_topic', '$host_name', '$batch_id','$meeting_date','$meeting_start_time','$meeting_end_time','$meeting_platform','$meeting_url','$meet_join_id','$meet_join_password','$center_id','$meeting_desc', CURRENT_TIMESTAMP)";
        $result = mysqli_query($conn , $query);
        if ($result) {
            return "true";
        }else{
            return mysqli_error($conn);
            // return "false";
        }
    }


    function viewAllMeeting($conn, $center_id, $type){
        $query = "SELECT * FROM `meeting` WHERE `meeting`.`center_id` = '$center_id'";
        $result = mysqli_query($conn, $query);
        $i = 0;
        if (mysqli_num_rows($result)>0) {
            while ($row = mysqli_fetch_array($result)){
                $i++;
                $batch_id = $row['batch_id'];
                $meeting_platform = $row['meeting_platform'];
                $query2 = "SELECT * FROM `batch` WHERE `batch`.`center_id` = '$center_id' AND `batch`.`batch_id` = '$batch_id'";
                $result2 = mysqli_query($conn, $query2);
                $row2 = mysqli_fetch_array($result2);
                if ($type == 'table') {
                    echo '<tr>
                        <td>
                            <p class="text-sm font-weight-bold mb-0">'.$i.'</p>
                        </td>';
                    if ($meeting_platform == 'GM') {
                        echo '<td>
                            <div class="d-flex px-2 py-1">
                                <div>
                                    <img src="../assets/img/small-logos/googlemeet.png" class="avatar avatar-sm me-3" alt="user1">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">'.$row['meeting_topic'].'</h6>
                                    <p class="text-xs text-secondary mb-0">'.$row['host_name'].'</p>
                                </div>
                            </div>
                        </td>';
                    }else if($meeting_platform == 'ZM'){
                        echo '<td>
                            <div class="d-flex px-2 py-1">
                                <div>
                                    <img src="../assets/img/small-logos/zoom.png" class="avatar avatar-sm me-3" alt="user1">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">'.$row['meeting_topic'].'</h6>
                                    <p class="text-xs text-secondary mb-0">'.$row['host_name'].'</p>
                                </div>
                            </div>
                        </td>';
                    };
                    if ($batch_id == 0) {
                        echo '<td>
                            <p class="text-sm font-weight-bold mb-0">All Batch</p>
                        </td>';
                    }else{
                        echo '<td>
                            <p class="text-sm font-weight-bold mb-0">'.$row2['batch_name'].'</p>
                        </td>';
                    };
                    echo '<td>
                            <p class="text-sm font-weight-bold mb-0">'.$row['meeting_date'].'</p>
                        </td>
                        <td>
                            <p class="text-sm font-weight-bold mb-0">Start-'.$row['meeting_start_time'].'</p>
                            <p class="text-sm font-weight-bold mb-0">End-'.$row['meeting_end_time'].'</p>
                        </td>
                        <td class="py-0">
                            <button class="btn btn-icon btn-3 p-2 m-0 bg-gradient-primary my-0 view_editMeeting" data-bs-toggle="modal" data-bs-target="#exampleModal" value="'.$row['meeting_id'].'">
                                <span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
                                <span class="btn-inner--text">View/Edit</span>
                            </button>
                            <button class="btn btn-icon btn-3 p-2 m-0 bg-gradient-danger my-0" name="hideBatch" value="'.$row['meeting_id'].'" type="submit">
                                <span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
                                <span class="btn-inner--text">Remove</span>
                            </button>
                        </td>
                    </tr>';     
                }
            }
        }else{
            echo '<tr>
            <td>
                <p class="text-sm font-weight-bold mb-0">No Meeting Found !</p>
            </td>';
        }
    }
   

    function viewMeetingById($conn, $center_id, $meeting_id ,$type){
        $query = "SELECT * FROM `meeting` WHERE `meeting`.`center_id` = '$center_id' AND `meeting`.`meeting_id` = '$meeting_id'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result)==1) {
            $meeting_detail = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($type == "JSON") {
                echo json_encode($meeting_detail);
            }
            // $batch_id = $meeting_detail['batch_id'];
            // $query2 = "SELECT * FROM `batch` WHERE `batch`.`center_id` = '$center_id' AND `batch`.`batch_id` = '$batch_id'";
            // $result2 = mysqli_query($conn, $query2);
            // $batch_detail = mysqli_fetch_array($result2);
           
        }else{
            echo '<tr>
            <td>
                <p class="text-sm font-weight-bold mb-0">No Meeting Found !</p>
            </td>';
        }
    }

    function editMeeting($conn,$meeting_id, $batch_id, $meeting_topic, $host_name, $meeting_date, $meeting_start_time, $meeting_end_time, $meeting_platform, $meeting_url, $meet_join_id, $meet_join_password, $meeting_desc){      
        $query = "UPDATE `meeting` SET `meeting_topic`='$meeting_topic',`host_name`='$host_name',`batch_id`='$batch_id',`meeting_date`='$meeting_date',`meeting_start_time`='$meeting_start_time',`meeting_end_time`='$meeting_end_time',`meeting_platform`='$meeting_platform',`meeting_url`='$meeting_url',`meet_join_id`='$meet_join_id',`meet_join_password`='$meet_join_password' ,`meeting_desc`='$meeting_desc' WHERE `meeting`.`meeting_id` = '$meeting_id'";
        $result = mysqli_query($conn , $query);
        if ($result) {
            return "true";
        }else{
            return mysqli_error($conn);
            // return "false";
        }
    }
    // UPDATE `meeting` SET `meeting_topic` = 'testing11', `host_name` = 'sss', `meeting_date` = '2022-06-16' WHERE `meeting`.`meeting_id` = 28
?>