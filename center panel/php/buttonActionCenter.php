<?php
// ==============================================================
// *Author = Sudhanshu Shekhar
// *Date = 03/06/2022
// =================================================================

// *Description = This file is handle all of the post request in center panel
// It means inside the center panel any button is click for post request is action
// is performend here.

// =================================================================
?>


<?php
    include '../partials/_dbconnection.php';
    include './student/studentOperationFunction.php';
    include './teacher/teacherOperationFunction.php';
    include './course/courseOperationFunction.php';
    include './batch/batchOperationFunction.php';
    include './content/contentCategoryOperationFunction.php';
    include './content/contentSubCategoryOperationFunction.php';
    include './content/contentOperationFunction.php';
    include './meeting/meetingOperationFunction.php';
    include './liveClasses/liveClassesOperationFunction.php';
    include './testSeries/testSeriesOperationFunction.php';


    if (isset($_POST['addStudent'])) {
        $center_id = $_POST['cid'];
        $first_name = $_POST['f_name'];
        $last_name = $_POST['l_name'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $course_id = $_POST['course'];
        $batch_id = $_POST['batch'];
        $fee_type = $_POST['fee_type'];
        $fee_amount = $_POST['fee_amount'];
        $country = $_POST['country'];
        $state = $_POST['state'];
        $dob = $_POST['dob'];
        $area_code = $_POST['area_code'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];
        
        $addStudent= addStudent($conn,$center_id, $first_name, $last_name, $email, $number, $course_id, $batch_id, $fee_type, $fee_amount, $country, $state, $dob, $area_code, $password, $c_password);
        echo $addStudent;
    }

    if (isset($_POST['addTeacher'])) {
        $center_id = $_POST['cid'];
        $first_name = strip_tags($_POST['f_name']);
        $last_name = strip_tags($_POST['l_name']);
        $email = strip_tags($_POST['email']);
        $number = strip_tags($_POST['number']);
        $subject = strip_tags($_POST['subject']);
        $payment_type = strip_tags($_POST['payment_type']);
        $payment_amount = strip_tags($_POST['payment_amount']);
        $country = strip_tags($_POST['country']);
        $state = strip_tags($_POST['state']);
        $dob = strip_tags($_POST['dob']);
        $area_code = strip_tags($_POST['area_code']);
        $password = strip_tags($_POST['password']);
        $c_password = strip_tags($_POST['c_password']);
        
        $addStudent= addTeacher($conn,$center_id, $first_name, $last_name, $email, $number,$dob, $subject, $payment_type, $payment_amount, $country, $state, $area_code, $password, $c_password);
        echo $addStudent;
    }

    
    if (isset($_POST['addCourse'])) {
        $center_id = $_POST['cid'];
        $course_id = $_POST['addCourse'];
        $checkCourseAddOrNot = checkCourseAddedOrNot_into_center_course_tbl($conn, $center_id, $course_id);
        echo $checkCourseAddOrNot;
        if ($checkCourseAddOrNot == 'true') {
            $addCourse = addCourse_into_center_course_tbl($conn, $center_id, $course_id);
            if ($addCourse) {
                header("Location: ../course.php?res=true&mes=Course Added Sucessfull");
            }else{
                header("Location: ../course.php?res=false&mes=Course Added failed");
            }
        }elseif ($checkCourseAddOrNot == 'false') {
            header("Location: ../course.php?res=false&mes=This course is already added");
        }
    }

    if (isset($_POST['removeCourse'])) {
        $center_course_id = $_POST['removeCourse'];
        $removeCourse = removeCourse_into_center_course_tbl($conn, $center_course_id);
        if ($removeCourse == "true") {
            header("Location: ../course.php?res=true&mes=Course Removed Sucessfull");
        }else if($removeCourse == "false"){
             header("Location: ../course.php?res=false&mes=Course Removed failed");
        }

    }


    if (isset($_POST['createBatch'])) {
        $center_id = $_POST['cid'];
        $batch_name = $_POST['batch_name'];
        $batch_start_time = $_POST['batch_start_time'];
        $batch_end_time = $_POST['batch_end_time'];
        $createBatch = createBatch($conn, $center_id, $batch_name, $batch_start_time, $batch_end_time);
        if ($createBatch == "true") {
            header("Location: ../batch.php?res=true&mes=Batch Sucessfully created");
        }else if ($createBatch == "false") {
            header("Location: ../batch.php?res=false&mes=Batch Crreation failed");
        }
    }

    if (isset($_POST['hideBatch'])) {
        $batch_id = $_POST['hideBatch'];
        $hideBatch = hideBatch($conn, $batch_id);
        if ($hideBatch == "true") {
            header("Location: ../batch.php?res=true&mes=Batch Sucessfully Deleted");
        }else if ($hideBatch == "false") {
            header("Location: ../batch.php?res=false&mes=Batch Deletion failed");
        }
    }

    //************************************************************ */
    // =========== START  Category Actions Code ====================
    //*************************************************************** */

    if (isset($_POST['createCategory'])) {
        $center_id = $_POST['cid'];
        $course_id = $_POST['course'];
        $category_name = $_POST['category_name'];
        $createCategory = createCategory($conn,$center_id, $course_id, $category_name);
        if ($createCategory == "true") {
           echo "Multi Data insert successfull";
        }else{
            echo "Multi Data insert failed";
        }
    }

    if (isset($_GET['action'])) {
        if ($_GET['action'] == "viewCategory") {
            $center_id = $_GET['cid'];
            $course_id = $_GET['course'];
            $type = $_GET['type'];
            $createCategory = viewCourseWiseCategory($conn, $center_id, $course_id, $type);
        }
      
    }

    // =========== *** START  Category Actions Code ****=====================




    //************************************************************ */
    // =========== START Sub Category Actions Code ====================
    //*************************************************************** */

    if (isset($_POST['createSubCategory'])) {
        $center_id = $_POST['cid'];
        $course_id = $_POST['course'];
        $category_id = $_POST['category'];
        $sub_category_name = $_POST['sub_category_name'];
        $createSubCategory = createSubCategory($conn,$center_id, $course_id, $category_id, $sub_category_name);
        if ($createSubCategory == "true") {
           echo "Multi Data insert successfull";
        }else{
            echo "Multi Data insert failed";
        }
    }

    if (isset($_GET['action'])) {
        if ($_GET['action'] == "viewSubCategory") {
            $center_id = $_GET['cid'];
            $course_id = $_GET['course'];
            $category_id = $_GET['category'];
            $type = $_GET['type']; // control Function Execution type 
            $viewSubCategory = viewCourseAndCategoryWiseSubCategory($conn, $center_id, $course_id, $category_id, $type);
        }
      
    }
     // =========== *** END Sub Category Actions Code ****=====================
    



    //************************************************************ */
    // =========== START content Actions Code ====================
    //*************************************************************** */

    if (isset($_POST['addContent'])) {
        $center_id = $_POST['cid'];
        $course_id = $_POST['course'];
        $category_id = $_POST['category'];
        $sub_category_id = $_POST['subcategory'];
        $content_title = $_POST['content_title'];
        $content_source = $_POST['content_source'];
        $addContent = addContent($conn, $center_id, $course_id, $category_id, $sub_category_id, $content_title, $content_source);
        if ($addContent == "true") {
           echo "Multi Data insert successfull";
        }else{
            echo "Multi Data insert failed";
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
     // =========== *** END Sub Category Actions Code ****=====================
    


      //************************************************************ */
    // =========== START Meeting Actions Code ====================
    //*************************************************************** */

    if (isset($_POST['createMeeting'])) {
        $center_id = $_POST['cid'];
        $batch_id = $_POST['batch'];
        $meeting_topic = $_POST['meeting_topic'];
        $host_name = $_POST['meeting_host'];
        $meeting_date = $_POST['meeting_date'];
        $meeting_start_time = $_POST['meeting_start_time'];
        $meeting_end_time = $_POST['meeting_end_time'];
        $meeting_platform = $_POST['meeting_platform'];
        $meeting_url = $_POST['meeting_url'];
        $meet_join_id = $_POST['meeting_id'];
        $meet_join_password = $_POST['meeting_password'];
        $meeting_desc= $_POST['meeting_desc'];
        if ($meeting_platform == 'GM') {
            $meet_join_id = "";
            $meet_join_password = "";
        }
        $createMeeting = createMeeting($conn, $center_id, $batch_id, $meeting_topic, $host_name, $meeting_date, $meeting_start_time, $meeting_end_time, $meeting_platform, $meeting_url, $meet_join_id, $meet_join_password, $meeting_desc);
        if ($createMeeting == "true") {
           echo "Data Insert succesfull";
        }else{
            echo "Multi Data insert failed";
        }
    }

    if (isset($_GET['action'])) {
        if ($_GET['action'] == "viewAllMeeting") {
            $center_id = $_GET['cid'];
            $type = $_GET['type'];
            $viewAllMeeting = viewAllMeeting($conn, $center_id, $type);
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


    if (isset($_POST['editMeeting'])) {
        $batch_id = $_POST['batch'];
        $meeting_id = $_POST['meeting_id'];
        $meeting_topic = $_POST['meeting_topic'];
        $host_name = $_POST['meeting_host'];
        $meeting_date = $_POST['meeting_date'];
        $meeting_start_time = $_POST['meeting_start_time'];
        $meeting_end_time = $_POST['meeting_end_time'];
        $meeting_platform = $_POST['meeting_platform'];
        $meeting_url = $_POST['meeting_url'];
        $meet_join_id = $_POST['meeting_id'];
        $meet_join_password = $_POST['meeting_password'];
        $meeting_desc= $_POST['meeting_desc'];
        if ($meeting_platform == 'GM') {
            $meet_join_id = "";
            $meet_join_password = "";
        }
        // echo $meeting_id;
        $editMeeting = editMeeting($conn,$meeting_id, $batch_id, $meeting_topic, $host_name, $meeting_date, $meeting_start_time, $meeting_end_time, $meeting_platform, $meeting_url, $meet_join_id, $meet_join_password, $meeting_desc);
        if ($editMeeting == "true") {
           echo "Meeting Update success";
        }else{
            echo "Meeting Update failed";
        }
    }
     // =========== *** END Meeting Actions Code ****===================== 


    //************************************************************ */
    // =========== START Lives Classes Actions Code ====================
    //*************************************************************** */

    if (isset($_POST['createLiveClasses'])) {
        $center_id = $_POST['cid'];
        $batch_id = $_POST['batch'];
        $live_topic = $_POST['live_topic'];
        $host_name = $_POST['live_host'];
        $live_date = $_POST['live_date'];
        $live_start_time = $_POST['live_start_time'];
        $live_end_time = $_POST['live_end_time'];
        $live_url = $_POST['live_url'];
        $live_desc= $_POST['live_desc'];
        $created_by = $_POST['created_by'];
        if ($created_by == 't') {
            $teacher_id = $_POST['teacher_id'];
        }else{
            $teacher_id = "";
        }
        $createLiveClasses =  createLiveClasses($conn, $center_id, $batch_id, $live_topic, $host_name, $live_date, $live_start_time, $live_end_time, $live_url, $live_desc, $created_by, $teacher_id);
        if ($createLiveClasses == "true") {
           echo "Data Insert succesfull";
        }else{
            echo "Multi Data insert failed";
        }
    }

    if (isset($_GET['action'])) {
        if ($_GET['action'] == "viewAllLiveClasses") {
            $center_id = $_GET['cid'];
            $type = $_GET['type'];
            $viewAllLiveClasses = viewAllLiveClasses($conn, $center_id, $type);
        }
      
    }

    if (isset($_GET['action'])) {
        if ($_GET['action'] == "viewLiveClassesById") {
            $center_id = $_GET['cid'];
            $live_classes_id = $_GET['live_classes_id'];
            $type = $_GET['type'];
            $viewLiveClassesById = viewLiveClassesById($conn, $center_id, $live_classes_id ,$type);
        }
    }

    if (isset($_POST['editLiveClasses'])) {
        $batch_id = $_POST['batch'];
        $live_classes_id = $_POST['live_classes_id'];
        $live_topic = $_POST['live_topic'];
        $host_name = $_POST['live_host'];
        $live_date = $_POST['live_date'];
        $live_start_time = $_POST['live_start_time'];
        $live_end_time = $_POST['live_end_time'];
        $live_url = $_POST['live_url'];
        $live_desc= $_POST['live_desc'];
        $editLiveClasses = editLiveClasses($conn,$live_classes_id, $batch_id, $live_topic, $host_name, $live_date, $live_start_time, $live_end_time, $live_url, $live_desc);
        if ($editLiveClasses == "true") {
           echo "Meeting Update success";
        }else{
            echo "Meeting Update failed";
        }
    }
     // =========== *** END Lives Classes Actions Code ****===================== 


   //************************************************************ */
    // =========== START Test Series Actions Code ====================
    //*************************************************************** */
    if (isset($_POST['createTestSeries'])) {
        $center_id = $_POST['cid'];
        $course_id = $_POST['course'];
        $test_series_name = $_POST['tsn'];
        $no_of_questions = $_POST['noq'];
        $marks_of_every_question = $_POST['moeq'];
        $test_duration = $_POST['test_duration'];
        $time_unit = $_POST['time_unit'];
        $created_by = $_POST['created_by'];
        if ($created_by == 't') {
            $teacher_id = $_POST['teacher_id'];
        }else{
            $teacher_id = "";
        }
        $createTestSeries =  createTestSeries($conn, $course_id, $test_series_name, $no_of_questions, $marks_of_every_question, $test_duration, $time_unit, $center_id, $created_by, $teacher_id);
        if ($createTestSeries == "true") {
           echo "Data Insert succesfull";
        }else{
            echo "Multi Data insert failed";
        }
    }

    if (isset($_POST['addQuestion'])) {
        $center_id = $_POST['cid'];
        $question = $_POST['question'];
        $option_A = $_POST['option_A'];
        $option_B = $_POST['option_B'];
        $option_C = $_POST['option_C'];
        $option_D = $_POST['option_D'];
        $correct_option = $_POST['correct_option'];
        $test_series_id = $_POST['test_id'];
        $addQuestionInTestSeries = addQuestionInTestSeries($conn, $question, $option_A, $option_B, $option_C, $option_D, $correct_option, $test_series_id);
        if ($addQuestionInTestSeries == "true") {
            echo "Sucees";
        }else{
            echo $addQuestionInTestSeries;
        }
    }

    if (isset($_GET['action'])) {
        if ($_GET['action'] == "viewAllQuestionInTestSeries") {
            $test_series_id = $_GET['test_id'];
            viewAllQuestionInTestSeries($conn, $test_series_id);
        }
    }

    if (isset($_GET['action'])) {
        if ($_GET['action'] == "viewQuestionById") {
            $ts_question_id = $_GET['question_id'];
            viewQuestionById($conn, $ts_question_id);
        }
    }

    if (isset($_POST['editQuestion'])) {
        $question = $_POST['question'];
        $option_A = $_POST['option_A'];
        $option_B = $_POST['option_B'];
        $option_C = $_POST['option_C'];
        $option_D = $_POST['option_D'];
        $correct_option = $_POST['correct_option'];
        $ts_question_id = $_POST['question_id'];
        $editQuestionById = editQuestionById($conn, $question, $option_A, $option_B, $option_C, $option_D, $correct_option, $ts_question_id);
        if ($editQuestionById == "true") {
            echo "Sucees";
        }else{
            echo $editQuestionById;
        }
    }
    
?>