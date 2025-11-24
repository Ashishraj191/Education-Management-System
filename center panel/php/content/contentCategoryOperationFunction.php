<?php
// ==============================================================
// *Author = Sudhanshu Shekhar
// *Date = 03/06/2022
// Purpose = saperate all of content_category table operatiop
// ==============================================================

// Description = This file contains all of content_category table realted operational functions
// It means here we define all of content_category table manupulation function
?>

<?php
    function createCategory($conn,$center_id, $course_id, $category_name){
        foreach ($category_name as $value) {
            $query = "INSERT INTO `content_category` (`category_name`,`center_id`,`course_id`,`date_time`) VALUE ('$value','$center_id','$course_id',CURRENT_TIMESTAMP)";
            $result = mysqli_query($conn,$query);
        }
        if ($result) {
            return true;
        }else{
            return false;
        }
    }

    function viewCourseWiseCategory($conn, $center_id, $course_id, $type){
        $query = "SELECT * FROM `content_category` WHERE `center_id` = '$center_id' AND `course_id` = '$course_id'";
        $result = mysqli_query($conn,$query);
        $i = 0;
        echo var_dump($result);
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
                                <h6 class="mt-2 text-sm">'.$row['category_name'].'</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-sm font-weight-bold mb-0">why</p>
                            </td>
                            <td>
                            <p class="text-sm font-weight-bold mb-0">why</p>
                        </td>
                        <td class="py-0">
                            <button class="btn btn-icon btn-3 p-2 m-0 bg-gradient-danger my-0" name="hideBatch" value="'.$row['category_id'].'" type="submit">
                                <span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
                                <span class="btn-inner--text">Remove</span>
                            </button>
                        </td>
                    </tr>';
                }
                else if ($type == 'selectOption') {
                    echo '<option value="'.$row['category_id'].'">'.$row['category_name'].'</option>';
                }
            }
        }else{
            echo '<tr>
            <td>
                <p class="text-sm font-weight-bold mb-0">No Category Found !</p>
            </td>';
        }
    }
?>