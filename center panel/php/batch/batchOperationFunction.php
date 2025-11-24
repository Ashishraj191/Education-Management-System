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
    function createBatch($conn, $center_id, $batch_name, $batch_start_time, $batch_end_time){
        $query = "INSERT INTO `batch` (`center_id`, `batch_name`, `batch_start_time`, `batch_end_time`,`status`, `date_time`) VALUES ('$center_id', '$batch_name', '$batch_start_time','$batch_end_time','1', CURRENT_TIMESTAMP)";
        $result = mysqli_query($conn , $query);
        if ($result) {
            // echo mysqli_error($conn);
            return "true";
        }else{
            // echo mysqli_error($conn);
            return "false";
        }
    }


    function viewAllBatch($conn, $center_id, $type){
        $query = "SELECT * FROM `batch` WHERE `batch`.`center_id` = '$center_id' AND `batch`.`status` = 1";
        $result = mysqli_query($conn, $query);
        $i = 0;
        if (mysqli_num_rows($result)>0) {
            while ($row = mysqli_fetch_array($result)){
                $i++;
                if ($type == 'table'){
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
                                <h6 class="mt-2 text-sm">'.$row['batch_name'].'</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-sm font-weight-bold mb-0">'.$row['batch_start_time'].'</p>
                            </td>
                            <td>
                            <p class="text-sm font-weight-bold mb-0">'.$row['batch_end_time'].'</p>
                        </td>
                        <td class="py-0">
                            <button class="btn btn-icon btn-3 p-2 m-0 bg-gradient-danger my-0" name="hideBatch" value="'.$row['batch_id'].'" type="submit">
                                <span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
                                <span class="btn-inner--text">Remove</span>
                            </button>
                        </td>
                    </tr>';
                }
                else if ($type == 'selectOption') {
                    echo '<option value="'.$row['batch_id'].'">'.$row['batch_name'].'</option>';
                }
            }
        }else{
            echo '<tr>
            <td>
                <p class="text-sm font-weight-bold mb-0">No Batch Found !</p>
            </td>';
        }
    }

    function hideBatch($conn, $batch_id){
        // this funcation is use for as a delete batch record according to center panel but in reallty this funcation hide batch 
        // in center panel it means update status in 0 . All batch are always exists in center panel.
        // *******************************************
        $query = "UPDATE `batch` SET `status` = '0' WHERE `batch`.`batch_id` = '$batch_id'";
        $result = mysqli_query($conn , $query);
        if ($result) {
            // echo mysqli_error($conn);
            return "true";
        }else{
            // echo mysqli_error($conn);
            return "false";
        }
    }
?>