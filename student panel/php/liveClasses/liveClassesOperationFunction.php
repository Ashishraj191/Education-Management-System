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
    function viewBatchWiseCurrentLiveClasses($conn, $center_id, $batch_id, $type){
        $query = "SELECT * FROM `live_classes` WHERE `live_classes`.`center_id` = '$center_id' AND (`live_classes`.`batch_id` = '$batch_id' OR `live_classes`.`batch_id` = '0') AND `live_classes`.`live_date`= current_date()";
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
                            <button class="btn btn-icon btn-3 p-2 m-0 bg-gradient-danger my-0 viewLiveClasses_btn" data-bs-toggle="modal" data-bs-target="#exampleModal" value="'.$row['live_classes_id'].'">
                                <span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
                                <span class="btn-inner--text">View</span>
                            </button>
                            <button class="btn btn-icon btn-3 p-2 m-0 bg-gradient-warning my-0" name="hideBatch" value="'.$row['live_url'].'" type="submit">
                                <span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
                                <span class="btn-inner--text">Join</span>
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
    function viewBatchWiseUpComeingLiveClasses($conn, $center_id, $batch_id, $type){
        $query = "SELECT * FROM `live_classes` WHERE `live_classes`.`center_id` = '$center_id' AND (`live_classes`.`batch_id` = '$batch_id' OR `live_classes`.`batch_id` = '0') AND `live_classes`.`live_date` > now()";
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
                            <div class="d-flex px-2 py-0 my-0">
                                <div class="d-flex flex-column justify-content-center m-0 p-0">
                                    <h6 class="mb-0 text-sm">'.$row['live_topic'].'</h6>
                                    <p class="text-xs text-secondary mb-0">'.$row['host_name'].'</p>
                                </div>
                                <div class="m-0 p-0">
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
                        <td>
                            <button class="btn btn-icon btn-3 p-2 m-0 bg-gradient-danger my-0 viewLiveClasses_btn" data-bs-toggle="modal" data-bs-target="#exampleModal" value="'.$row['live_classes_id'].'">
                                <span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
                                <span class="btn-inner--text">View</span>
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
            echo 'No Record Found';
        }
    }
?>