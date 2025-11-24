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
    function createLiveClasses($conn, $center_id, $batch_id, $live_topic, $host_name, $live_date, $live_start_time, $live_end_time, $live_url, $live_desc, $created_by, $teacher_id){
        $query = "INSERT INTO `live_classes` (`live_topic`, `host_name`, `batch_id`, `live_date`,`live_start_time`, `live_end_time`, `live_url`, `center_id`, `live_desc`,`created_by`,`teacher_id`, `date_time`) VALUES ('$live_topic', '$host_name', '$batch_id','$live_date','$live_start_time','$live_end_time','$live_url','$center_id','$live_desc','$created_by','$teacher_id',CURRENT_TIMESTAMP)";
        $result = mysqli_query($conn , $query);
        if ($result) {
            return "true";
        }else{
            return mysqli_error($conn);
            // return "false";
        }
    }


    function viewAllLiveClasses($conn, $center_id, $type){
        $query = "SELECT * FROM `live_classes` WHERE `live_classes`.`center_id` = '$center_id'";
        $result = mysqli_query($conn, $query);
        $i = 0;
        if (mysqli_num_rows($result)>0) {
            while ($row = mysqli_fetch_array($result)){
                $i++;
                $batch_id = $row['batch_id'];
                $query2 = "SELECT * FROM `batch` WHERE `batch`.`center_id` = '$center_id' AND `batch`.`batch_id` = '$batch_id'";
                $result2 = mysqli_query($conn, $query2);
                $row2 = mysqli_fetch_array($result2);
                if ($type == 'table') {
                    echo '<tr>
                        <td>
                            <p class="text-sm font-weight-bold mb-0">'.$i.'</p>
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">'.$row['live_topic'].'</h6>
                                    <p class="text-xs text-secondary mb-0">'.$row['host_name'].'</p>
                                </div>
                                <div>
                                    <img src="../assets/img/small-logos/live.png" class="mx-2" width="57px" alt="user1">
                                </div>
                            </div>
                        </td>';
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
                            <p class="text-sm font-weight-bold mb-0">'.$row['live_date'].'</p>
                        </td>
                        <td>
                            <p class="text-sm font-weight-bold mb-0">Start-'.$row['live_start_time'].'</p>
                            <p class="text-sm font-weight-bold mb-0">End-'.$row['live_end_time'].'</p>
                        </td>
                        <td class="py-0">
                            <button class="btn btn-icon btn-3 p-2 m-0 bg-gradient-primary my-0 view_editLiveClasses_btn" data-bs-toggle="modal" data-bs-target="#exampleModal" value="'.$row['live_classes_id'].'">
                                <span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
                                <span class="btn-inner--text">View/Edit</span>
                            </button>
                            <button class="btn btn-icon btn-3 p-2 m-0 bg-gradient-danger my-0" name="hideBatch" value="'.$row['live_classes_id'].'" type="submit">
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
   

    function viewLiveClassesById($conn, $center_id, $live_classes_id ,$type){
        $query = "SELECT * FROM `live_classes` WHERE `live_classes`.`center_id` = '$center_id' AND `live_classes`.`live_classes_id` = '$live_classes_id'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result)==1) {
            $liveClasses_detail = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($type == "JSON") {
                echo json_encode($liveClasses_detail);
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

    function editLiveClasses($conn,$live_classes_id, $batch_id, $live_topic, $host_name, $live_date, $live_start_time, $live_end_time, $live_url, $live_desc){      
        $query = "UPDATE `live_classes` SET `live_topic`='$live_topic',`host_name`='$host_name',`batch_id`='$batch_id',`live_date`='$live_date',`live_start_time`='$live_start_time',`live_end_time`='$live_end_time',`live_url`='$live_url',`live_desc`='$live_desc' WHERE `live_classes`.`live_classes_id` = '$live_classes_id'";
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