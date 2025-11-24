<?php
      include '../partials/_dbconnection.php';
      include '../php/content/contentOperationFunction.php';
      include '../php/meeting/meetingOperationFunction.php';
      include '../php/liveClasses/liveClassesOperationFunction.php';
      
    if (isset($_GET['action'])) {
        if ($_GET['action'] == "viewSubCategory") {
            $center_id = $_GET['cid'];
            $course_id = $_GET['course'];
            $category_id = $_GET['category'];
            $type = $_GET['type']; // control Function Execution type 
            $viewSubCategory = viewCourseAndCategoryWiseSubCategory($conn, $center_id, $course_id, $category_id, $type);
        }
    }

    if (isset($_GET['action'])) {
        if ($_GET['action'] == "viewContent") {
            $center_id = $_GET['cid'];
            $course_id = $_GET['course'];
            $category_id = $_GET['category'];
            $sub_category_id = $_GET['sub_category'];
            $type = $_GET['type']; // control Function Execution type 
            $viewContent = viewCourse_Category_AND_SubCategoryWiseContent($conn, $center_id, $course_id, $category_id, $sub_category_id, $type);
        }
      
    }


    if (isset($_GET['action'])) {
        if ($_GET['action'] == "viewMeetingById") {
            $center_id = $_GET['cid'];
            $meeting_id = $_GET['meeting_id'];
            $type = $_GET['type'];
            $viewAllMeeting = viewMeetingById($conn, $center_id, $meeting_id ,$type);
        }
      
    }

    
    if (isset($_GET['action'])) {
        if ($_GET['action'] == "viewLiveClassesById") {
            $center_id = $_GET['cid'];
            $live_classes_id = $_GET['live_classes_id'];
            $type = $_GET['type'];
            $viewAllMeeting = viewLiveClassesById($conn, $center_id, $live_classes_id ,$type);
        }
      
    }


?>