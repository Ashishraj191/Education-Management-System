<?php
// ==============================================================
// *Author = Sudhanshu Shekhar
// *Date = 09/06/2022
// Purpose = saperate all of content_category table operatiop
// ==============================================================

// Description = This file contains all of content_category table realted operational functions
// It means here we define all of content_category table manupulation function
?>

<?php
    function addContent($conn, $center_id, $course_id, $category_id, $sub_category_id, $content_title, $content_source){
        $i = 0;
        if (count($content_title) == count($content_source)) {
            foreach ($content_title as $value) {
                $query = "INSERT INTO `content` (`content_title`,`content_source`,`center_id`,`course_id`,`category_id`,`sub_category_id`,`date_time`) VALUE ('$value','$content_source[$i]','$center_id','$course_id','$category_id','$sub_category_id',CURRENT_TIMESTAMP)";
                $result = mysqli_query($conn,$query);
                $i++;
            }
            if ($result) {
                return true;
            }else{
                return false;
            }
        }
    }

    function viewCourse_Category_AND_SubCategoryWiseContent($conn, $center_id, $course_id, $category_id, $sub_category_id, $type){
        $query = "SELECT * FROM `content` WHERE `center_id` = '$center_id' AND `course_id` = '$course_id' AND `category_id` = '$category_id' AND `sub_category_id` = '$sub_category_id'";
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
                                <h6 class="mt-2 text-sm">'.$row['content_title'].'</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-sm font-weight-bold mb-0">'.$row['content_source'].'</p>
                            </td>
                            <td>
                            <p class="text-sm font-weight-bold mb-0">why</p>
                        </td>
                        <td class="py-0">
                            <button class="btn btn-icon btn-3 p-2 m-0 bg-gradient-danger my-0" name="hideBatch" value="'.$row['content_id'].'" type="submit">
                                <span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
                                <span class="btn-inner--text">Remove</span>
                            </button>
                        </td>
                    </tr>';
                }
                else if ($type == 'selectOption') {
                    echo '<option value="'.$row['content_id'].'">'.$row['content_title'].'</option>';
                }
            }
        }else{
            echo '<tr>
            <td>
                <p class="text-sm font-weight-bold mb-0">No Sub Category Found !</p>
            </td>';
        }
    }
?>