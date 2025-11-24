function toggle(value) {
  if (value == "btn1") {
    console.log("button 1 click");
    document.getElementById("btn1").classList.remove("bg-gradient-primary");
    document.getElementById("btn1").style.backgroundColor = "#fff";
    document.getElementById("btn2").classList.add("bg-gradient-primary");
    document.getElementById("table").style.display = "block";
    document.getElementById("addStudentForm").style.display = "none";
  } else if (value == "btn2") {
    console.log("button 2 click");
    document.getElementById("btn1").classList.add("bg-gradient-primary");
    document.getElementById("btn2").classList.remove("bg-gradient-primary");
    document.getElementById("btn2").style.backgroundColor = "#fff";
    document.getElementById("table").style.display = "none";
    document.getElementById("addStudentForm").style.display = "block";
  }
}

function toggleQuestionBtn(value) {
  if (value == "btn1") {
    console.log("button 1 click");
    document
      .getElementById("question_btn1")
      .classList.remove("bg-gradient-primary");
    document.getElementById("question_btn1").style.backgroundColor = "#fff";
    document
      .getElementById("question_btn2")
      .classList.add("bg-gradient-primary");
    document.getElementById("question_table").style.display = "block";
    document.getElementById("addQuestionDiv").style.display = "none";
  } else if (value == "btn2") {
    console.log("button 2 click");
    document
      .getElementById("question_btn1")
      .classList.add("bg-gradient-primary");
    document
      .getElementById("question_btn2")
      .classList.remove("bg-gradient-primary");
    document.getElementById("question_btn2").style.backgroundColor = "#fff";
    document.getElementById("question_table").style.display = "none";
    document.getElementById("addQuestionDiv").style.display = "block";
  }
}

// ===================================================================
// ********** START View Sub Category List ***************************
// ===================================================================
$(document).ready(function () {
  $(".question_btn").click(function () {
    test_id = $(this).val();
    viewAllQuestionInTestSeries(test_id);
  })
  $("#question_btn1").click(function (){
    viewAllQuestionInTestSeries(test_id);
  })

  question_number=2;
  $("#addQuestionBox_btn").click(function () {
    i=0;
    loop_time = $("#num_question_box").val();
    for (var i; i < loop_time; i++) {
      $("#addQuestionBoxDiv")
        .append(`<div class="my-2" style="background-color: rgba(240, 228, 207, 0.76); border-radius: 10px;">
        <div class="row p-0">
          <div class="col-sm">
            <div class="form-group mx-2">
              <input class="form-control" name="cid" value="<?php echo $cid?>" hidden>
              <input class="form-control" name="addQuestion" hidden>
              <label for="example-text-input" class="form-control-label">Question ${question_number}</label>
              <textarea class="form-control" name="question[]" id="" cols="30" rows="2"
                required></textarea>
            </div>
          </div>
        </div>
        <div class="row p-0">
          <div class="col-sm">
            <div class="form-group mx-1 d-flex">
              <div class="pt-2"><span class="mx-2">A</span></div>
              <input class="form-control option_A" name="option_A[]" type="text" placeholder="option A"
                id="" required>
            </div>
          </div>
          <div class="col-sm">
            <div class="form-group mx-1 d-flex">
              <div class="pt-2"><span class="mx-2">B</span></div>
              <input class="form-control option_B" name="option_B[]" type="text" placeholder="option B"
                id="" required>
            </div>
          </div>
        </div>
        <div class="row p-0">
          <div class="col-sm">
            <div class="form-group mx-1 d-flex">
              <div class="pt-2"><span class="mx-2">C</span></div>
              <input class="form-control option_C" name="option_C[]" type="text" placeholder="option C"
                id="" required>
            </div>
          </div>
          <div class="col-sm">
            <div class="form-group mx-1 d-flex">
              <div class="pt-2"><span class="mx-2">D</span></div>
              <input class="form-control option_D" name="option_D[]" type="text" placeholder="option D"
                id="" required>
            </div>
          </div>
        </div>
        <div class="row p-0">
          <div class="col-sm">
            <div class="form-group mx-1 d-flex">
              <div class="pt-2"><span class="mx-2">Ans</span></div>
              <select class="form-control selectAnswer" name="correct_option[]" required>
                <option value="">-- Correct Option --</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                </select>
            </div>
          </div>
        </div>
      </div>`);
      question_number++;
    }
    $("#num_question_box").val("");
  });

  $(document).on('change', '.selectAnswer', function () {
    value = $(this).val();
    console.log(value);
    switch (value) {
      case "A":        
        $(".option_A").addClass("bg-success").css("color", "white");
        $(".option_B").removeClass("bg-success").css("color", "");
        $(".option_C").removeClass("bg-success").css("color", "");
        $(".option_D").removeClass("bg-success").css("color", "");
        break;
      case "B":
        $(".option_A").removeClass("bg-success").css("color", "");
        $(".option_B").addClass("bg-success").css("color", "white");
        $(".option_C").removeClass("bg-success").css("color", "");
        $(".option_D").removeClass("bg-success").css("color", "");
        break;
      case "C":
        $(".option_A").removeClass("bg-success").css("color", "");
        $(".option_B").removeClass("bg-success").css("color", "");
        $(".option_C").addClass("bg-success").css("color", "white");
        $(".option_D").removeClass("bg-success").css("color", "");
        break;
      case "D":
        $(".option_A").removeClass("bg-success").css("color", "");
        $(".option_B").removeClass("bg-success").css("color", "");
        $(".option_C").removeClass("bg-success").css("color", "");
        $(".option_D").addClass("bg-success").css("color", "white");
        break;
      default:
        $(".option_A").removeClass("bg-success").css("color", "");
        $(".option_B").removeClass("bg-success").css("color", "");
        $(".option_C").removeClass("bg-success").css("color", "");
        $(".option_D").removeClass("bg-success").css("color", "");
        break;
    }
  });

  $("#addQuestionForm").submit(function (e) {
    e.preventDefault();
    data = $("#addQuestionForm").serializeArray();
    data.push({name:'test_id', value:test_id})
    console.log(data);
    $.ajax({
      type: "POST",
      url: "php/buttonActionCenter.php",
      data: data, // serializes the form's elements.
      success: function (data) {
        alert(data); // show response from the php script.
        // $("#reset").click();
      },
    });
  });

  $("#editQuestionForm").hide();
  $(document).on('click', '.edit_question_btn', function () {
    $("#editQuestionForm").show();
    $("#questionDataDiv").hide();
    question_id = $(this).val();
    $.get("php/buttonActionCenter.php", { question_id: question_id, action: "viewQuestionById"} , function (data) {
      obj = JSON.parse(data);
      $("#question").val(obj['question']);
      $("#option_A").val(obj['option_A']);
      $("#option_B").val(obj['option_B']);
      $("#option_C").val(obj['option_C']);
      $("#option_D").val(obj['option_D']);
      $("#selectAnswer").val(obj['correct_option']);
    })
  })

  $("#editQuestionForm").submit(function (e) {
    e.preventDefault();
    data = $("#editQuestionForm").serializeArray();
    data.push({name:'question_id', value:question_id})
    console.log(data);
    $.ajax({
      type: "POST",
      url: "php/buttonActionCenter.php",
      data: data, // serializes the form's elements.
      success: function (data) {
        alert(data); // show response from the php script.
        $("#editQuestionForm").hide();
        $("#questionDataDiv").show();
        viewAllQuestionInTestSeries(test_id);
      },
    });
  });

  $("#editCancle_btn").click(function () {
    $("#questionDataDiv").show();
    $("#editQuestionForm").hide()
  })



});
// ******************* END View Sub Category List ******************

// ===================================================================
// ********** START Create Sub category ****************************
// ===================================================================
$(document).ready(function () {
  // =========================AJAX AJAX AJAX===========================
  // =========================AJAX AJAX AJAX===========================
  //when Submit button clicke data is send on server using AJAX
  $("#createTestSeriesForm").submit(function (e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    $.ajax({
      type: "POST",
      url: "php/buttonActionCenter.php",
      data: $("#createTestSeriesForm").serializeArray(), // serializes the form's elements.
      success: function (data) {
        alert(data); // show response from the php script.
        $("#reset").click();
      },
    });
  });
});
// **************** END Create Sub category ******************

// ===================================================================
// ********** Add Question ****************************
// ===================================================================




// ============================================================================
// ============================================================================
// *************************************         
// * All Funcation Defined Header
// * Here we can define all funcations
// **************************************     
// ============================================================================
// ============================================================================

function viewAllQuestionInTestSeries(test_id) {
  $.get( "php/buttonActionCenter.php", { test_id: test_id, action: "viewAllQuestionInTestSeries"} ,function( data ) {
    $( "#question_table_body").html(data);
    // alert( data );
      // console.log(data);
  });
}