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
    function viewBatchWiseCurrentMeeting($conn, $center_id, $batch_id, $type){
        $query = "SELECT * FROM `meeting` WHERE `meeting`.`center_id` = '$center_id' AND (`meeting`.`batch_id` = '$batch_id' OR `meeting`.`batch_id` = '0') AND `meeting`.`meeting_date`= current_date()";
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
                            <button class="btn btn-icon btn-3 p-2 m-0 bg-gradient-warning my-0 viewMeetingDetail" data-bs-toggle="modal" data-bs-target="#exampleModal" value="'.$row['meeting_id'].'">
                                <span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
                                <span class="btn-inner--text">View Detail</span>
                            </button>
                            <a class="btn btn-icon btn-3 p-2 m-0 bg-gradient-danger my-0" href="'.$row['meeting_url'].'">
                                <span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
                                <span class="btn-inner--text">Join Now</span>
                            </a>
                        </td>
                    </tr>';     
                }
            }
        }else{
            echo '<tr>
            <td>
                <p class="text-sm font-weight-bold mb-0">No Meeting Found !</p>
            </td>';
            echo mysqli_error($conn);
        }
    }

    function viewBatchWiseUpComeingMeeting($conn, $center_id, $batch_id, $type){
        $query = "SELECT * FROM `meeting` WHERE `meeting`.`center_id` = '$center_id' AND (`meeting`.`batch_id` = '$batch_id' OR `meeting`.`batch_id` = '0') AND `meeting`.`meeting_date` > now()";
         // "SELECT * FROM `tblhelp` WHERE `email`= '$email' AND MONTH(help_request_date) = $month AND YEAR(help_request_date) = $year"
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
                            <div class="d-flex px-2 py-0 my-0">
                                <div class="p-0 m-0">
                                    <img src="../assets/img/small-logos/googlemeet.png" class="avatar avatar-sm me-3" alt="user1">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center my-0 py-0 mx-0 px-0">
                                    <h6 class="mb-0 text-sm">'.$row['meeting_topic'].'</h6>
                                    <p class="text-xs text-secondary mb-0">'.$row['host_name'].'</p>
                                </div>
                            </div>
                        </td>';
                    }else if($meeting_platform == 'ZM'){
                        echo '<td>
                            <div class="d-flex px-2 py-0 my-0">
                                <div class="p-0 m-0">
                                    <img src="../assets/img/small-logos/zoom.png" class="avatar avatar-sm me-3" alt="user1">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center my-0 py-0 mx-0 px-0">
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
                            <button class="btn btn-icon btn-3 p-2 m-0 bg-gradient-warning my-0 viewMeetingDetail" data-bs-toggle="modal" data-bs-target="#exampleModal" value="'.$row['meeting_id'].'">
                                <span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
                                <span class="btn-inner--text">View Detail</span>
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
            echo mysqli_error($conn);
        }
    }
    // function viewBatchWiseMeeting($conn, $center_id, $batch_id, $type){
    //     $query = "SELECT * FROM `meeting` WHERE `meeting`.`center_id` = '$center_id' AND `meeting`.`batch_id` = '$batch_id'";
    //     $result = mysqli_query($conn, $query);
    //     $i = 0;
    //     if (mysqli_num_rows($result)>0) {
    //         while ($row = mysqli_fetch_array($result)){
    //             $i++;
    //             $batch_id = $row['batch_id'];
    //             $meeting_platform = $row['meeting_platform'];
    //             $query2 = "SELECT * FROM `batch` WHERE `batch`.`center_id` = '$center_id' AND `batch`.`batch_id` = '$batch_id'";
    //             $result2 = mysqli_query($conn, $query2);
    //             $row2 = mysqli_fetch_array($result2);
    //             if ($type == 'table') {
    //                 echo '<tr>
    //                     <td>
    //                         <p class="text-sm font-weight-bold mb-0">'.$i.'</p>
    //                     </td>';
    //                 if ($meeting_platform == 'GM') {
    //                     echo '<td>
    //                         <div class="d-flex px-2 py-1">
    //                             <div>
    //                                 <img src="../assets/img/small-logos/googlemeet.png" class="avatar avatar-sm me-3" alt="user1">
    //                                 </div>
    //                                 <div class="d-flex flex-column justify-content-center">
    //                                 <h6 class="mb-0 text-sm">'.$row['meeting_topic'].'</h6>
    //                                 <p class="text-xs text-secondary mb-0">'.$row['host_name'].'</p>
    //                             </div>
    //                         </div>
    //                     </td>';
    //                 }else if($meeting_platform == 'ZM'){
    //                     echo '<td>
    //                         <div class="d-flex px-2 py-1">
    //                             <div>
    //                                 <img src="../assets/img/small-logos/zoom.png" class="avatar avatar-sm me-3" alt="user1">
    //                                 </div>
    //                                 <div class="d-flex flex-column justify-content-center">
    //                                 <h6 class="mb-0 text-sm">'.$row['meeting_topic'].'</h6>
    //                                 <p class="text-xs text-secondary mb-0">'.$row['host_name'].'</p>
    //                             </div>
    //                         </div>
    //                     </td>';
    //                 };
    //                 if ($batch_id == 0) {
    //                     echo '<td>
    //                         <p class="text-sm font-weight-bold mb-0">All Batch</p>
    //                     </td>';
    //                 }else{
    //                     echo '<td>
    //                         <p class="text-sm font-weight-bold mb-0">'.$row2['batch_name'].'</p>
    //                     </td>';
    //                 };
    //                 echo '<td class="meetingDate">
    //                         <p class="text-sm font-weight-bold mb-0">'.$row['meeting_date'].'</p>
    //                     </td>
    //                     <td>
    //                         <p class="text-sm font-weight-bold mb-0">Start-'.$row['meeting_start_time'].'</p>
    //                         <p class="text-sm font-weight-bold mb-0">End-'.$row['meeting_end_time'].'</p>
    //                     </td>
    //                     <td class="py-0">
    //                         <button class="btn btn-icon btn-3 p-2 m-0 bg-gradient-primary my-0 viewMeetingDetail" data-bs-toggle="modal" data-bs-target="#exampleModal" value="'.$row['meeting_id'].'">
    //                             <span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
    //                             <span class="btn-inner--text">View Detail</span>
    //                         </button>
    //                         <a class="btn btn-icon btn-3 p-2 m-0 bg-gradient-info my-0" href="'.$row['meeting_url'].'">
    //                             <span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
    //                             <span class="btn-inner--text">Join Now</span>
    //                         </a>
    //                     </td>
    //                 </tr>';     
    //             }
    //         }
    //     }else{
    //         echo '<tr>
    //         <td>
    //             <p class="text-sm font-weight-bold mb-0">No Meeting Found !</p>
    //         </td>';
    //     }
    // }
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
            echo "No Data Found";
        }
    }
?>